<?php
session_start();
require_once 'Classes/DoList.php';

/*if (isset($_SESSION['login'])) {
    $list = new DoList();
    $events = $list->getEvents($_SESSION['id']);
    $doneList = $list->doneList();
} */
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
    <script src="https://kit.fontawesome.com/8b26d30613.js" crossorigin="anonymous"></script>
    <script defer src="src/list.js"></script>
    <title>ToDoList</title>
</head>
<body>
<!--H E A D E R   C O N T E N T-->
<?php require_once 'import/header.php'?>
<!--H E A D E R   C O N T E N T-->

<!--M A I N   C O N T E N T-->
   <main>
       <article>
           <section class="flex justify-center">
               <div class="flex justify-center pt-[3%] lg:w-[90%] text-[#000]">
                   <div class="flex flex-col w-full">
                       <div class="flex justify-center items-start space-x-4 border-b-2 border-[#000] pb-2">
                           <div id="titleTodoList" class="flex flex-col items-center ">
                               <h1 class="text-6xl p-2 uppercase font-semibold">TodoList</h1>
                               <?php if (isset($_SESSION['login'])) : ?>
                                   <p class="text-lg flex flex-col text-center">
                                       <span>Bienvenue <?= $_SESSION['login'] ?> sur votre Do To List</span>
                                       <span>Votre application de gestion de tâches.</span>
                                   </p>
                               <?php else : ?>
                                   <p class="text-lg">Bienvenue sur votre DoToList, votre application de gestion de
                                       tâches.</p>
                               <?php endif; ?>
                           </div>
                           <div id="containerTodoListForm">
                               <form action="fetch/fetch_todolist.php" method="post" id="todolistForm">
                                   <div class="flex justify-center lg:flex-col rounded-lg p-3 lg:space-y-2" id="color-form">
                                       <div class="flex flex-col">
                                           <label for="titleTodoList">Titre de la tâche :</label>
                                           <input type="text" name="titleTodoList" id="titleTodoList"
                                                  class="rounded-md p-2 text-black bg-slate-300 hover:bg-slate-100 ease-out duration-200">
                                       </div>
                                       <div class="flex flex-col">
                                           <label for="descriptionTodoList">Description de la tâche :</label>
                                           <input type="text" name="descriptionTodoList" id="descriptionTodoList"
                                                  class="rounded-md p-2 text-black bg-slate-300 hover:bg-slate-100 ease-out duration-200">
                                       </div>
                                       <div id="errorMsg"></div>
                                       <button type="submit" name="btnTodoList" id="btnTodoList"
                                               class="ease-in bg-gradient-to-b from-[#fd7330] to-[#ef4b00] hover:bg-gradient-to-b hover:form-orange-600 hover:to-orange-700 rounded-lg text-white py-4 px-2">
                                           <i class="fa-solid fa-circle-plus"></i>
                                           Ajouter une tâche
                                       </button>
                                   </div>
                               </form>
                           </div>
                       </div>
                       <div id="listTask" class="flex flex-row justify-around space-x-4">
                           <div class="flex flex-col w-[50%]">
                               <h1 class="text-3xl p-2">Tâches planifiées</h1>
                               <div id="displayTodoList" class="flex flex-wrap"></div>
                           </div>
                           <div class="flex flex-col w-[50%]">
                               <h1 class="text-3xl p-2">Tâches terminées</h1>
                               <div id="displayTodoListDone" class="flex flex-wrap"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
       </article>
   </main>
</body>
</html>
