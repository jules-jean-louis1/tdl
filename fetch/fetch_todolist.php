<?php
session_start();
require_once '../Classes/DoList.php';

$list = new DoList();

if(isset($_POST['titleTodoList'])) {
    $titre = $_POST['titleTodoList'];
    $contenu = $_POST['descriptionTodoList'];
    $id_utilisateur = $_SESSION['id'];

    if(empty($titre) || empty($contenu)) {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'emptyFields']);
    } else {
        $list->createEvent($contenu, $id_utilisateur, $titre);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success']);
    }
}
?>
