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
            <section class="flex justify-center lg:pt-[5%] lg:h-[92vh]">
                <div class="flex justify-around lg:pt-[6%] bg-[#222] backdrop-blur rounded-lg lg:w-[80%] lg:h-[80%]">
                    <div class="flex flex-col items-center">
                        <h2 class="text-7xl font-bold uppercase">
                            <span id="effect-gradiant">ToDoList</span>
                        </h2>
                        <p>
                            <span class="text-white">Gérez votre liste de tâches en ligne</span>
                        </p>
                    </div>
                    <div class="flex flex-col lg:space-y-3">
                        <div id="btnContainer" class="flex lg:space-x-5 lg:pt-2">
                            <button id="btnRegister"
                                    class="rounded-lg px-4 py-3 text-white border-[1px] border-[#4e4e4e] hover:bg-[#3e3e3e] duration-200 ease-out">
                                S'inscrire
                            </button>
                            <button id="btnLogin"
                                    class="rounded-lg px-4 py-3 text-[#222] border-[1px] border-[#4e4e4e] bg-[#bfc3c8] hover:bg-[#d3d3d3] duration-200 ease-out">Se
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
