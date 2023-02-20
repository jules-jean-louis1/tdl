const dolistForm = document.querySelector('#todolistForm');
const btnTodoList = document.querySelector('#btnTodoList');
function dislpayList() {
    fetch('fetch/fetch_list.php')
    .then(response => response.json())
    .then(data => {
        let displaytodo = document.getElementById('displayTodoList');
        displaytodo.innerHTML = '';
        data.forEach(element => {
            displaytodo.innerHTML += `
            <div class="flex flex-col">
                <div class="flex flex-col space-y-3">
                    <div class="col-md-10">
                        <h3>Titre de l'event: ${element.titre}</h3>
                        <p>Créer par ${element.login} le ${element.creer}</p>
                    </div>
                    <div class="flex flex-col">
                        <p>
                            <span class="bg-slate-200 p-2 rounded">${element.contenu}</span>
                        </p>
                    </div>
                    <div class="flex">
                        <button class="rounded-lg bg-red-500 text-white p-2" onclick="deleteList(${element.id})">Delete</button>
                    </div>
                </div>
            </div>
            `;
        });
    })
}
dislpayList();

dolistForm.addEventListener('submit', (e) => {
    e.preventDefault();
    fetch('fetch/fetch_todolist.php', {
        method: 'POST',
        body: new FormData(dolistForm)
    })
    .then(response => response.json())
    .then(data => {
        let message = document.querySelector('#errorMsg');
        if (data.status === 'emptyFields') {
            message.innerHTML = 'Veillez remplir tous les champs';
            message.classList.add('alert-danger');
            message.classList.remove('alert-success');
        } else if (data.status === 'success') {
            message.innerHTML = 'Todo list ajouté';
            message.classList.add('alert-success');
            message.classList.remove('alert-danger');
        }
    })
});
btnTodoList.addEventListener('click', (e) => {
    e.preventDefault();
    setTimeout(dislpayList, 10);
});