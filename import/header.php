<header>
    <nav class="bg-gradient-to-r from-violet-500 to-fuchsia-500 text-white">
        <?php if(isset($_SESSION['login'])) : ?>
            <div class="flex justify-around py-3 mx-4">
                <div>
                    <a href="index.php">
                        <h1>TodoList</h1>
                    </a>
                </div>
                <div>
                    <ul class="flex space-x-2">
                        <li><a href="todolist.php">TodoList</a></li>
                        <li><a href="contact.php"><?=$_SESSION['login'];?></a></li>
                        <li><a href="deconnexion.php">Deconnexion</a></li>
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
