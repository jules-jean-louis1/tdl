<?php
session_start();
require_once '../Classes/Account.php';

if (isset($_POST['login'])) {
    $login = $_POST['login'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if (empty($login) || empty($nom) || empty($password) || empty($passwordConfirm)) {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'emptyFields']);
    } else {
        if (!empty($login)){
            $updateLogin = new Account();
            $updateLogin->updateLogin($login, $_SESSION['id']);
            header('Content-Type: application/json');
            echo json_encode(['status' => 'upLogin']);
        }
        if (!empty($nom)){
            $updateNom = new Account();
            $updateNom->updateNom($nom, $_SESSION['id']);
            header('Content-Type: application/json');
            echo json_encode(['status' => 'upNom']);
        }
        $upateVerifyPassword = new Account();
        if ($upateVerifyPassword->verifyPassword($password)) {
            if (!empty($password) && !empty($passwordConfirm)) {
                $updatePassword = new Account();
                $updatePassword->updatePassword($password, $_SESSION['id']);
                header('Content-Type: application/json');
                echo json_encode(['status' => 'upPassword']);
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'passwordInvalid']);
        }
    }
}