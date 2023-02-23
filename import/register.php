<form action="" method="post" id="registerForm">
    <div class="flex flex-col space-y-2">
        <label for="login" class="text-white">Login :</label>
        <input type="text" name="login" id="login" placeholder="Login" class="bg-slate-200 p-2 rounded-lg">
        <label for="nom" class="text-white">Nom :</label>
        <input type="text" name="nom" id="nom" placeholder="Nom" class="bg-slate-200 p-2 rounded-lg">
        <label for="password" class="text-white">Password :</label>
        <input type="password" name="password" id="password" placeholder="Password" class="bg-slate-200 p-2 rounded-lg">
        <label for="passwordConfirm" class="text-white">Confirm Password :</label>
        <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirm Password" class="bg-slate-200 p-2 rounded-lg">
        <div id="errorMsg"></div>
        <button type="submit" name="btnregister" id="btnregister" class="rounded-lg px-4 py-3 text-white border-[1px] border-[#4e4e4e] hover:bg-[#3e3e3e] duration-200 ease-out">S'inscrire</button>
    </div>
</form>