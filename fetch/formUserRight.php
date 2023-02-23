<?php
session_start();
require_once '../Classes/DoList.php';

if (isset($_POST['selectUser'])) {
    $addUser = new DoList();
}
