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
    <script src="https://kit.fontawesome.com/8b26d30613.js" crossorigin="anonymous"></script>
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
                    <div class="flex flex-col">
                        <h2>
                            <span>To Do List</span>
                        </h2>
                    </div>
                    <div class="flex flex-col">
                        <div id="btnContainer">
                            <button id="btnRegister"
                                    class="rounded-full px-3 py-2 bg-gradient-to-r from-orange-500 to-orange-600 ease-in hover:bg-gradient-to-b hover:form-orange-600 hover:to-orange-500">
                                S'inscrire
                            </button>
                            <button id="btnLogin"
                                    class="border-2 border-orange-600 rounded-full px-3 py-2 hover:text-[#fd7330]">Se
                                connecter
                            </button>
                        </div>
                        <div id="containerForm"></div>
                    </div>
                </div>
            </section>
        </article>
    </main>
</body>
</html>
