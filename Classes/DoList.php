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
        $query = $this->db->prepare("INSERT INTO tasks (contenu, creer, modifier, id_utilisateur, titre, done) VALUES (:contenu, NOW(), NOW(), :id_utilisateur, :titre, 0)");
        $query->execute([
            'contenu' => $contenu,
            'id_utilisateur' => $id_utilisateur,
            'titre' => $titre
        ]);
    }
    public function getEvents()
    {
        $done = 0;
        $query = $this->db->prepare("SELECT tasks.id, `contenu`,`creer`,`titre`,`login`, `done` FROM utilisateurs INNER JOIN tasks WHERE utilisateurs.id = tasks.id_utilisateur ORDER BY `creer` DESC");
//        $query->execute(['id_utilisateur' => $id_utilisateur]);
        $query->execute();
        header("Content-Type: JSON");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result, JSON_PRETTY_PRINT);
    }
    public function deleteEvent($id)
    {
        $query = $this->db->prepare("DELETE FROM tasks WHERE id = :id");
        $query->execute(['id' => $id]);
    }
    public function updateEvent($id)
    {
        $done = 1;
        $query = $this->db->prepare("UPDATE tasks SET done = :done, modifier = NOW() WHERE id = :id");
        $query->execute([
            'id' => $id,
            'done' => $done
        ]);
    }
    public function doneList()
    {
        $query = $this->db->prepare("SELECT tasks.id, `contenu`,`creer`,`titre`,`login`, `done` FROM utilisateurs INNER JOIN tasks WHERE utilisateurs.id = tasks.id_utilisateur AND done = 1 ORDER BY `creer` DESC");
        $query->execute();
        header("Content-Type: JSON");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result, JSON_PRETTY_PRINT);
    }
}
