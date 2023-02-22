const updateForm = document.querySelectorAll('#updateForm');
const deleteAccount = document.querySelectorAll('#btnDeleteAccount');

updateForm.addEventListener('submit', (event) => {
   event.preventDefault();
   fetch('fetch/update_profil.php', {
         method: 'POST',
            body: new FormData(updateForm)
   })
    .then(response => response.json())
    .then(data => {
       let message = document.querySelector('#errorMsg');
       if (data.status === 'emptyFields') {
            message.innerHTML = 'Veillez remplir tous les champs';
            message.classList.add('alert-danger');
            message.classList.remove('alert-success');
            fadeOutMsg(message);
        } else {
           if (data.status === 'upLogin') {
               message.innerHTML = 'Login modifié';
                message.classList.add('alert-success');
                message.classList.remove('alert-danger');
           } else if (data.status === 'upNom') {
               message.innerHTML = 'Nom modifié';
                message.classList.add('alert-success');
                message.classList.remove('alert-danger');
           } else if (data.status === 'upPassword') {
               message.innerHTML = 'Mot de passe modifié';
                message.classList.add('alert-success');
                message.classList.remove('alert-danger');
           } else if (data.status === 'passwordInvalid') {
                message.innerHTML = 'Mot de passe invalide';
                 message.classList.add('alert-danger');
                 message.classList.remove('alert-success');
           }
       }
       })
});