<?php
session_start();
require_once '../Classes/DoList.php';
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