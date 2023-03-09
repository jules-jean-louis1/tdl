const displayForm = document.querySelector('#containerForm');
const btnRegisterForm = document.querySelector('#btnRegister');

btnRegisterForm.addEventListener('click', async (ev) => {
   await fetch('import/register.php')
       .then(response => response.text())
         .then(data => {
             displayForm.innerHTML = data;
         });
        const btnOnRegister = document.querySelector('#registerForm');
        btnOnRegister.addEventListener('submit', (e) => {
            e.preventDefault();
            fetch('fetch/fetch_register.php', {
                method: 'POST',
                body: new FormData(btnOnRegister)
            })
            .then(response => response.json())
            .then(data => {
                    let message = document.querySelector('#errorMsg');
                    if (data.status === 'emptyField') {
                        message.innerHTML = 'Veillez remplir tous les champs';
                        message.classList.add('alert-danger');
                        message.classList.remove('alert-success');
                    } else if (data.status === 'loginExist') {
                        message.innerHTML = 'Ce login existe déjà';
                        message.classList.add('alert-danger');
                        message.classList.remove('alert-success');
                    } else if (data.status === 'passwordInvalid') {
                        message.innerHTML = 'Le mot de passe doit contenir au moins 5 caractères dont un chiffre';
                        message.classList.add('alert-danger');
                        message.classList.remove('alert-success');
                    } else if (data.status === 'passwordNotMatch') {
                        message.innerHTML = 'Les mots de passe ne correspondent pas';
                        message.classList.add('alert-danger');
                        message.classList.remove('alert-success');
                    } else if (data.status === 'success') {
                        message.innerHTML = 'Inscription réussie';
                        message.classList.add('alert-success');
                        message.classList.remove('alert-danger');
                    }
            })
        })
});

// Login Part
const btnLoginForm = document.querySelector('#btnLogin');

btnLoginForm.addEventListener('click', async (ev) => {
    await fetch('import/login.php')
        .then(response => response.text())
        .then(data => {
            displayForm.innerHTML = data;
        });
    const btnOnLogin = document.querySelector('#loginForm');
    btnOnLogin.addEventListener('submit', (e) => {
        e.preventDefault();
        fetch('fetch/fetch_login.php', {
            method: 'POST',
            body: new FormData(btnOnLogin)
        })
        .then(response => response.json())
        .then(data => {
            let message = document.querySelector('#errorMsg');
            if(data.status === 'emptyField') {
                message.innerHTML = 'Veillez remplir tous les champs';
                message.classList.add('alert-danger');
                message.classList.remove('alert-success');
            } else if (data.status === 'success') {
                message.innerHTML = 'Connexion réussie';
                message.classList.add('alert-success');
                message.classList.remove('alert-danger');
                window.location.replace('index.php');
            } else {
                message.innerHTML = 'Login ou mot de passe incorrect';
                message.classList.add('alert-danger');
                message.classList.remove('alert-success');
            }
        })
    })
})