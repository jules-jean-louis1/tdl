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
echo $userinfo['droits_planification']."<br>";
echo "ID:" . $_SESSION['id'];
if (strpos(','.$userinfo['droits_planification'].',', ','.$_SESSION['id'].',') !== false) {
    echo "Vous avez les droits";
} else {
    if (empty($userinfo['droits_planification'])) {
        $new_droits_planification = $_SESSION['id'];
    } else {
        $new_droits_planification = $userinfo['droits_planification'].','.$_SESSION['id'];
    }
    $requser2 = $pdo->prepare("UPDATE utilisateurs SET droits_planification = :new_droits_planification WHERE id = :id_utilisateur");
    $requser2->bindParam(':new_droits_planification', $new_droits_planification);
    $requser2->bindParam(':id_utilisateur', $_SESSION['id']);
    $requser2->execute();
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
