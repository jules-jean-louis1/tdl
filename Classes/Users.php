<?php
// Connexion a la base de données
require_once 'config/config.php';
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
}