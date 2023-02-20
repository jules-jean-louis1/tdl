<?php
// Connexion a la base de données
define("DB_HOST", 'localhost');
define("DB_NAME", 'todolist');
define('DB_CHARSET', 'utf8');
define("DB_USER", 'root');
define("DB_PASSWORD", '');

class DoList
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
    public function createEvent($contenu, $id_utilisateur, $titre)
    {
        $query = $this->db->prepare("INSERT INTO laf (contenu, creer, modifier, id_utilisateur, titre) VALUES (:contenu, NOW(), NOW(), :id_utilisateur, :titre)");
        $query->execute([
            'contenu' => $contenu,
            'id_utilisateur' => $id_utilisateur,
            'titre' => $titre
        ]);
    }
    public function getEvents($id_utilisateur)
    {
        $query = $this->db->prepare("SELECT `contenu`,`creer`,`titre`,`login` FROM utilisateurs INNER JOIN laf WHERE utilisateurs.id = laf.id_utilisateur");
//        $query->execute(['id_utilisateur' => $id_utilisateur]);
        $query->execute();
        header("Content-Type: JSON");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result, JSON_PRETTY_PRINT);
    }
}
