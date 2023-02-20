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

            })
        })
});