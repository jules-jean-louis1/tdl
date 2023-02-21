<?php
require_once '../Classes/DoList.php';
 if(isset($_GET['id'])) {
     $id = $_GET['id'];
     $update = new DoList();
     $update->updateEvent($id);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success']);
 } else {
     header('Content-Type: application/json');
     echo json_encode(['status' => 'error']);
 }