<header>
    <nav class="backdrop-blur text-white">
        <?php if(isset($_SESSION['login'])) : ?>
            <div class="flex items-center justify-between py-2 mx-8" id="border-header">
                <div>
                    <a href="index.php" class="flex items-center space-x-3 bg-[#bfc3c8] px-4 py-2 rounded-lg text-[#222]">
                        <i class="fa-solid fa-list-check fa-lg"></i>
                        <h2 class="text-xl font-bold">TodoList</h2>
                    </a>

                </div>
                <div>
                    <ul class="flex items-center space-x-2 font-semibold">
                        <li><a href="todolist.php" class="hover:text-[#fd7330] text-[#222]">TodoList</a></li>
                        <li class="flex items-center space-x-2 rounded-lg px-3 py-2 ease-in bg-[#222] ">
                            <i class="fa-regular fa-circle-user"></i>
                            <a href="contact.php"><?=$_SESSION['login'];?></a>
                        </li>
                        <li><a href="deconnexion.php" class="border-[1px] border-[#222] rounded-lg px-3 py-2  text-[#222] hover:text-[#fd7330]">Deconnexion</a></li>
                        <li><a href="https://github.com/jules-jean-louis1/tdl" class="hover:text-[#fd7330] text-[#bfc3c8]"><i class="fa-brands fa-github fa-2x"></i></a></li>
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
