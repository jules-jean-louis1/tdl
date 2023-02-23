<?php
require_once '../Classes/DoList.php';

$infosUser = new DoList();
$info = $infosUser->infosUserReg();
print_r($info);
