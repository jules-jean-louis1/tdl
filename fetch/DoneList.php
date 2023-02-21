<?php
require_once '../Classes/DoList.php';
$list = new DoList();
$events = $list->doneList();
print_r($events);
