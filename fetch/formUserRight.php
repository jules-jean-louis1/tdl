<?php
session_start();
require_once '../Classes/DoList.php';

if (isset($_POST['selectUser'])) {
    $id = $_SESSION['id'];
    $droits = $_POST['selectUser'];
    $addUser = new DoList();
    $right = $addUser->addUserRights($id, $droits);

    if ($right) {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success']);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error']);
    }
}
