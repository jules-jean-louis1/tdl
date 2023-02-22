<?php
session_start();
if (isset($_SESSION['login'])) :
require_once 'Classes/Account.php';

if (isset($_POST['deleteBtn'])) {
    $delect = new Account();
    $delect->deleteAccount($_SESSION['id']);
    session_destroy();
    header('Location: index.php');
}

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
    <main>
        <article>
            <section>
                <div class="flex justify-center pt-[4%]">
                    <div class="flex flex-col">
                        <form action="" method="post" class="flex flex-col space-y-2" id="updateForm">
                            <div class="flex flex-col">
                                <label for="Login">Login actuel : <?= $_SESSION['login'] ?></label>
                                <input type="text" name="login" id="login" placeholder="Login"
                                       class="bg-slate-200 p-2 rounded-lg">
                            </div>
                            <div class="flex flex-col">
                                <label for="nom">Nom actuel : <?= $_SESSION['nom'] ?></label>
                                <input type="text" name="nom" id="nom" placeholder="nom"
                                       class="bg-slate-200 p-2 rounded-lg">
                            </div>
                            <div class="flex flex-col">
                                <label for="password">Password :</label>
                                <input type="password" name="password" id="password" placeholder="Password"
                                       class="bg-slate-200 p-2 rounded-lg">
                            </div>
                            <div class="flex flex-col">
                                <label for="c_password">Confirmer le Password :</label>
                                <input type="password" name="c_password" id="c_password" placeholder="Password"
                                       class="bg-slate-200 p-2 rounded-lg">
                            </div>
                            <div class="flex flex-col space-y-3 justify-center">
                                <div id="errorMsg"></div>
                                <button type="submit"
                                        class="rounded-full px-3 py-2 bg-gradient-to-r from-orange-500 to-orange-600 ease-in hover:bg-gradient-to-b hover:form-orange-600 hover:to-orange-500 w-full">
                                    Modifier
                                </button>
                            </div>
                        </form>
                        <form action="" method="post">
                            <button type="submit" class="w-full px3 py-2 bg-[#fc0000] rounded-full"
                                    id="btnDeleteAccount" name="deleteBtn">Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </article>
    </main>
</body>
</html>
<?php
else :
    header('Location: ../index.php');
endif;
?>