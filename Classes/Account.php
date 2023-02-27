<?php
// Connexion a la base de données
define("DB_HOST", 'localhost');
define("DB_NAME", 'todolist');
define('DB_CHARSET', 'utf8');
define("DB_USER", 'root');
define("DB_PASSWORD", '');

//Plesk
/*define("DB_HOST", 'localhost');
define("DB_NAME", ' jules-jean-louis_todolist');
define('DB_CHARSET', 'utf8');
define("DB_USER", 'todolist-jjl');
define("DB_PASSWORD", 'todolist-jjl');*/
class Account
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
    public function deleteAccount($id)
    {
        $query = $this->db->prepare("DELETE FROM utilisateurs WHERE id = :id");
        $query->execute(['id' => $id]);
    }
    public function updateLogin($id, $login)
    {
        $query = $this->db->prepare("UPDATE utilisateurs SET login = :login WHERE id = :id");
        $query->execute([
            'login' => $login,
            'id' => $id
        ]);
    }
    public function updateNom($id, $nom)
    {
        $query = $this->db->prepare("UPDATE utilisateurs SET nom = :nom WHERE id = :id");
        $query->execute([
            'nom' => $nom,
            'id' => $id
        ]);
    }
    public function verifyPassword($password)
    {
        if (preg_match('/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{5,}$/', $password)) {
            return true;
        } else {
            return false;
        }
    }
    public function updatePassword($id, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = $this->db->prepare("UPDATE utilisateurs SET password = :password WHERE id = :id");
        $query->execute([
            'password' => $password,
            'id' => $id
        ]);
    }
}
