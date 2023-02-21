<form action="" method="post" id="registerForm">
    <div class="flex flex-col space-y-2">
        <label for="login">Login :</label>
        <input type="text" name="login" id="login" placeholder="Login" class="bg-slate-200 p-2 rounded-lg">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" placeholder="Nom" class="bg-slate-200 p-2 rounded-lg">
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" placeholder="Password" class="bg-slate-200 p-2 rounded-lg">
        <label for="passwordConfirm">Confirm Password :</label>
        <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirm Password" class="bg-slate-200 p-2 rounded-lg">
        <div id="errorMsg"></div>
        <button type="submit" name="btnregister" id="btnregister" class="rounded-full px-3 py-2 bg-gradient-to-r from-orange-500 to-orange-600 ease-in hover:bg-gradient-to-b hover:form-orange-600 hover:to-orange-500"">S'inscrire</button>
    </div>
</form>