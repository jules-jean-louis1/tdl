<?php
require_once '../Classes/Users.php';

if (isset($_POST['login'])) {
    $login =$_POST['login'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if (empty($login) || empty($nom) || empty($password) || empty($passwordConfirm)) {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'emptyField']);
    } else {
        $user = new Users();
        if ($user->checkLogin($login)) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'loginExist']);
        } else {
            if (!$user->verifyPassword($password)) {
                header('Content-Type: application/json');
                echo json_encode(['status' => 'passwordInvalid']);
            } else {
                if (!$user->checkPassword($password, $passwordConfirm)) {
                    header('Content-Type: application/json');
                    echo json_encode(['status' => 'passwordNotMatch']);
                } else {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    if ($user->createUser($login, $nom, $password)) {
                        header('Content-Type: application/json');
                        echo json_encode(['status' => 'success']);
                    } else {
                        header('Content-Type: application/json');
                        echo json_encode(['status' => 'error']);
                    }
                }
            }
        }
    }
}