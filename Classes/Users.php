<?php
// Connexion a la base de données
define("DB_HOST", 'localhost');
define("DB_NAME", 'todolist');
define('DB_CHARSET', 'utf8');
define("DB_USER", 'root');
define("DB_PASSWORD", '');

//Plesk
/*define("DB_HOST", 'localhost');
define("DB_NAME", ' jules-jean-louis_ tdl');
define('DB_CHARSET', 'utf8');
define("DB_USER", 'todolist');
define("DB_PASSWORD", 'Urqr2#636');*/

class Users
{
    protected $db;

    public function __construct()
    {
        // Connexion a la base de données
        try {
            $this->db = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
                DB_USER,
                DB_PASSWORD
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit;
        }
    }
    public function checkLogin($login)
    {
        $query = $this->db->prepare("SELECT COUNT(*) as total FROM utilisateurs WHERE login = :login");
        $query->execute(['login' => $login]);
        $result = $query->fetch();
        if ($result['total'] > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function verifyPassword($password)
    {
        if (preg_match('/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{5,}$/', $password)) {
            return true;
        } else {
            return false;
        }
    }
    public function checkPassword($password, $passwordConfirm)
    {
        if ($password === $passwordConfirm) {
            return true;
        } else {
            return false;
        }
    }
    public function createUser($login, $nom, $password)
    {
        $query = $this->db->prepare("INSERT INTO utilisateurs (login, nom, password) VALUES (:login, :nom, :password)");
        $result = $query->execute([
            'login' => $login,
            'nom' => $nom,
            'password' => $password
        ]);
        return $result;
    }
    public function loginUser($login, $password)
    {
        $query = $this->db->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $query->execute(['login' => $login]);
        $result = $query->fetch();
        if (password_verify($password, $result['password'])) {
            return $result;
        } else {
            return false;
        }
    }
}