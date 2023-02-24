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
        $query = $this->db->prepare("INSERT INTO tasks (contenu, creer, modifier, id_utilisateur, titre, done) VALUES (:contenu, NOW(), NULL, :id_utilisateur, :titre, 0)");
        $query->execute([
            'contenu' => $contenu,
            'id_utilisateur' => $id_utilisateur,
            'titre' => $titre
        ]);
    }
    public function getEvents()
    {
        $login = $_SESSION['login'];
        $query = $this->db->prepare("SELECT tasks.id, contenu, creer, titre, login, done
                                    FROM utilisateurs
                                    INNER JOIN tasks ON utilisateurs.id = tasks.id_utilisateur
                                    WHERE done = 0 AND login = :login
                                    ORDER BY creer DESC
                                ");
        $query->execute(['login' => $login]);
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
        $login = $_SESSION['login'];
        $query = $this->db->prepare("SELECT tasks.id, contenu, creer, titre, login, done
                                    FROM utilisateurs
                                    INNER JOIN tasks ON utilisateurs.id = tasks.id_utilisateur
                                    WHERE done = 1 AND login = :login
                                    ORDER BY creer DESC
                                ");
        $query->execute(['login' => $login]);
        header("Content-Type: JSON");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result, JSON_PRETTY_PRINT);
    }
    public function numberTasks()
    {
        $login = $_SESSION['login'];
        $query = $this->db->prepare("SELECT COUNT(*) AS numberTasks
                                    FROM utilisateurs
                                    INNER JOIN tasks ON utilisateurs.id = tasks.id_utilisateur
                                    WHERE done = 0 AND login = :login
                                ");
        $query->execute(['login' => $login]);
        header("Content-Type: JSON");
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return json_encode($result, JSON_PRETTY_PRINT);
    }
    public function infosUserReg()
    {
        $id = $_SESSION['id'];
        $query = $this->db->prepare("SELECT id, login FROM utilisateurs WHERE id != :id");
        $query->execute(array('id' => $id));
        header("Content-Type: JSON");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result, JSON_PRETTY_PRINT);
    }
    public function addUserRights($id, $droits)
    {
        $request1 = $this->db->prepare("SELECT `droits_planification` FROM `utilisateurs` WHERE id = :id");
        $request1->execute(['id' => $id]);
        $result = $request1->fetch(PDO::FETCH_ASSOC);


        if (strpos(','.$result['droits_planification'].',', ','.$id.',') !== false) {
            return true;
        } else {
            if (empty($result['droits_planification'])) {
                $new_droits_planification = $id;
            } else {
                $new_droits_planification = $result['droits_planification'].','.$id;
            }
            $request2 = $this->db->prepare("UPDATE utilisateurs SET droits_planification = :new_droits_planification WHERE id = :id");
            $request2->bindParam(':new_droits_planification', $new_droits_planification);
            $request2->bindParam(':id', $id);
            $request2->execute();
            return false;
        }
    }
}
