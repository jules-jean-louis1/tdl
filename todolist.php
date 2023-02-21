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
    <script defer src="src/list.js"></script>
    <title>Document</title>
</head>
<body>
<!--H E A D E R   C O N T E N T-->
<?php require_once 'import/header.php'?>
<!--H E A D E R   C O N T E N T-->

<!--M A I N   C O N T E N T-->
   <main>
       <article>
           <section>
               <div class="flex justify-center pt-[3%]">
                   <div class="flex flex-col">
                       <div id="titleTodoList" class="flex flex-col items-center">
                           <h1 class="text-3xl p-2">TodoList</h1>
                           <?php if(isset($_SESSION['login'])) : ?>
                               <p class="text-lg">Bienvenue <?= $_SESSION['login'] ?> sur votre DoToList, votre application de gestion de tâches.</p>
                           <?php else : ?>
                               <p class="text-lg">Bienvenue sur votre DoToList, votre application de gestion de tâches.</p>
                           <?php endif; ?>
                       </div>
                       <div id="containerTodoListForm">
                           <form action="fetch/fetch_todolist.php" method="post" id="todolistForm">
                               <div class="flex lg:flex-row lg:space-x-2 py-4">
                                   <div class="flex flex-col">
                                       <label for="titleTodoList">Titre de la tâche</label>
                                       <input type="text" name="titleTodoList" id="titleTodoList"
                                              class="border-2 border-black rounded-md p-2 text-black">
                                   </div>
                                   <div class="flex flex-col">
                                       <label for="descriptionTodoList">Description de la tâche</label>
                                       <input type="text" name="descriptionTodoList" id="descriptionTodoList"
                                              class="border-2 border-black rounded-md p-2 text-black">
                                   </div>
                                  <button type="submit" name="btnTodoList" id="btnTodoList"
                                         class="bg-red-600 hover:bg-red-800 rounded-lg text-white py-4 px-2">Ajouter cette tâche
                                  </button>
                               </div>
                               <div id="errorMsg"></div>
                           </form>
                       </div>
                       <div id="listTask" class="flex justify-around">
                           <div class="flex flex-col">
                               <h1 class="text-3xl p-2">Liste des tâches</h1>
                               <div id="displayTodoList"></div>
                           </div>
                           <div class="flex flex-col items-center">
                               <h1 class="text-3xl p-2">Tâches terminées</h1>
                               <div id="displayTodoListDone"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
       </article>
   </main>
</body>
</html>
