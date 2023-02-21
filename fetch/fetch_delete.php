<?php
session_start();
require_once '../Classes/DoList.php';
/*$fetch_delete = new DoList();
$fetch_delete->deleteEvent($_GET['id']);*/
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $fetch_delete = new DoList();
    $fetch_delete->deleteEvent($id);
    header('Content-Type: application/json');
    echo json_encode(['status' => 'success']);
} else {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error']);
}