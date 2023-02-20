<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
        <!--Tailwinds-->
    <script src="https://cdn.tailwindcss.com"></script>
        <!--JavaScript-->
    <script defer src="src/loginregister.js"></script>
    <title>DoToList</title>
</head>
<body>
<!--H E A D E R   C O N T E N T-->
<?php require_once 'import/header.php'?>
<!--H E A D E R   C O N T E N T-->

<!--M A I N   C O N T E N T-->
    <main>
        <article>
            <section class="flex justify-center pt-[4%]">
                <div class="flex flex-col">
                    <div id="btnContainer">
                        <button id="btnRegister" class="bg-red-500 py-3 px-2 text-white">S'inscrire</button>
                        <button id="btnLogin" class="bg-blue-500 py-3 px-2 text-white">Se connecter</button>
                    </div>
                    <div id="containerForm"></div>
                </div>
            </section>
        </article>
    </main>
</body>
</html>
