<form action="" method="post" id="loginForm">
    <div class="flex flex-col space-y-2">
        <label for="login">Login :</label>
        <input type="text" name="login" id="login" placeholder="Login"  class="bg-slate-200 p-2 rounded-lg">
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" placeholder="Password"  class="bg-slate-200 p-2 rounded-lg">
        <div id="errorMsg"></div>
        <button type="submit" name="btnlogin" id="btnlogin" class="border-2 border-orange-600 rounded-full px-3 py-2 hover:text-[#fd7330]">Se connecter</button>
    </div>
</form>