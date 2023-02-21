<?php
// Connexion a la base de données
define("DB_HOST", 'localhost');
define("DB_NAME", 'todolist');
define('DB_CHARSET', 'utf8');
define("DB_USER", 'root');
define("DB_PASSWORD", '');
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
    public function getInfos()
    {
        $login = $_SESSION['login'];
        $query = $this->db->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $query->execute(['login' => $login]);
        header("Content-Type: JSON");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result, JSON_PRETTY_PRINT);
    }
}
