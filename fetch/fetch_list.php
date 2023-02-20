<?php
session_start();
require_once '../Classes/DoList.php';
$list = new DoList();
$events = $list->getEvents($_SESSION['id']);
print_r($events);
?>