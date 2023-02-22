<header>
    <nav class="bg-[#000000BA] backdrop-blur text-white">
        <?php if(isset($_SESSION['login'])) : ?>
            <div class="flex items-center justify-around py-2 mx-4">
                <div>
                    <a href="index.php" class="hover:text-[#fd7330]">
                        <i class="fa-solid fa-list-check"></i>
                    </a>
                </div>
                <div>
                    <ul class="flex items-center space-x-2 font-semibold">
                        <li><a href="todolist.php" class="hover:text-[#fd7330]">TodoList</a></li>
                        <li class="rounded-full px-3 py-2 bg-gradient-to-r from-orange-500 to-orange-600 ease-in hover:bg-gradient-to-b hover:form-orange-600 hover:to-orange-500">
                            <i class="fa-regular fa-circle-user"></i>
                            <a href="contact.php"><?=$_SESSION['login'];?></a>
                        </li>
                        <li><a href="deconnexion.php" class="border-2 border-orange-600 rounded-full px-3 py-2 hover:text-[#fd7330]">Deconnexion</a></li>
                        <li><a href="https://github.com/jules-jean-louis1/tdl" class="hover:text-[#fd7330]"></a><i class="fa-brands fa-github fa-2x"></i></li>
                    </ul>
                </div>
            </div>
        <?php else : ?>
            <div class="flex justify-around py-3 mx-4">
                <div>
                    <h1>TodoList</h1>
                </div>
                <div>
                    <ul class="flex space-x-2">
                        <li><a href="todolist.php">TodoList</a></li>
                        <li><a href="index.php">Inscription</a></li>
                        <li><a href="index.php">Connexion</a></li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </nav>
</header>
