<?php
session_start();
if (isset($_POST['btn'])) {
    $test = $_POST['select'];
    var_dump($test);
}
$pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$requser = $pdo->prepare("SELECT `droits_planification` FROM `utilisateurs` WHERE id = ?");
$requser->execute(array($_SESSION['id']));
$userinfo = $requser->fetch(PDO::FETCH_ASSOC);
echo $userinfo['droits_planification'];
echo $_SESSION['id'];
$requser2 =$pdo->prepare("UPDATE utilisateurs SET droits_planification = CONCAT(droits_planification, ',', '0') WHERE id = ?");
if (strpos($userinfo['droits_planification'], $_SESSION['id']) !== false) {
    echo "Vous avez les droits";
} else {
    $requser2->execute(array($_SESSION['id']));
}
var_dump($userinfo);
?>

<form action="" method="post">
    <select name="select">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <button type="submit" name="btn">Submit</button>
</form>
