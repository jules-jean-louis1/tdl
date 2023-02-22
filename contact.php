<?php
session_start();
if (isset($_SESSION['login'])) :
require_once 'Classes/Account.php';

$info = new Account();
$info->getInfos();

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <!--Tailwinds-->
    <script src="https://cdn.tailwindcss.com"></script>
    <!--JavaScript-->
    <script defer src="src/profil.js"></script>
    <script src="https://kit.fontawesome.com/8b26d30613.js" crossorigin="anonymous"></script>
    <title>Profil - <?=$_SESSION['login']?></title>
</head>
<body>
<?php require_once 'import/header.php'?>
</body>
</html>
<?php
else :
    header('Location: ../index.php');
endif;
?>