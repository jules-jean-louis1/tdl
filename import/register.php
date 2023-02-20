<form action="" method="post" id="registerForm">
    <div class="flex flex-col space-y-2">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" placeholder="Login" required class="bg-slate-200 p-2">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" placeholder="Nom" required class="bg-slate-200 p-2">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required class="bg-slate-200 p-2">
        <label for="passwordConfirm">Confirm Password</label>
        <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirm Password" required class="bg-slate-200 p-2">
        <button type="submit" name="btnregister" id="btnregister" class="bg-red-500 hover:bg-red-800 py-4 px-2">S'inscrire</button>
    </div>
</form>