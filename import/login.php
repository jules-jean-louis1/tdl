<form action="" method="post" id="loginForm">
    <div class="flex flex-col space-y-2">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" placeholder="Login"  class="bg-slate-200 p-2">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Password"  class="bg-slate-200 p-2">
        <div id="errorMsg"></div>
        <button type="submit" name="btnlogin" id="btnlogin"  class="bg-blue-500 hover:bg-blue-800 py-4 px-2">Se connecter</button>
    </div>
</form>