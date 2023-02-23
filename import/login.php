<form action="" method="post" id="loginForm">
    <div class="flex flex-col space-y-2">
        <label for="login" class="text-white">Login :</label>
        <input type="text" name="login" id="login" placeholder="Login"  class="bg-slate-200 p-2 rounded-lg">
        <label for="password" class="text-white">Password :</label>
        <input type="password" name="password" id="password" placeholder="Password"  class="bg-slate-200 p-2 rounded-lg">
        <div id="errorMsg"></div>
        <button type="submit" name="btnlogin" id="btnlogin" class="rounded-lg px-4 py-3 text-[#222] border-[1px] border-[#4e4e4e] bg-[#bfc3c8] hover:bg-[#d3d3d3] duration-200 ease-out">Se connecter</button>
    </div>
</form>