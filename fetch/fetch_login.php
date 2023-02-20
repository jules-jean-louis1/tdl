<?php
require_once '../Classes/Users.php';
session_start();

if (isset($_POST['login'])) {
    $login =$_POST['login'];
    $password = $_POST['password'];

    if (empty($login) || empty($password)) {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'emptyField']);
    } else {
        $user = new Users();
        $result = $user->loginUser($login, $password);
        if ($result) {
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            $_SESSION['nom'] = $result['nom'];
            $_SESSION['id'] = $result['id'];
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error']);
        }
    }
}