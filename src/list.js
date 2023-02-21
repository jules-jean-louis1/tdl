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
            <div class="flex flex-col border-2 border-blue-800 rounded-lg my-2 p-2">
                <div class="flex flex-col space-y-3">
                    <div class="col-md-10">
                        <h3>Titre de l'event: ${element.titre}</h3>
                        <p>Créer par ${element.login} le ${element.creer}</p>
                    </div>
                    <div class="flex flex-col bg-slate-500 p-2 rounded">
                        <h3>Description :</h3>
                        <p>
                            <span>${element.contenu}</span>
                            <span>ID: ${element.id}</span>
                        </p>
                    </div>
                    <div class="flex justify-around">
                        <button class="rounded-lg bg-red-500 text-white p-2" id="btnDelete" onclick="deleteList(${element.id})">Delete</button>
                        <button class="rounded-lg bg-green-500 text-white p-2" onclick="updateList(${element.id})">Done</button>
                    </div>
                </div>
            </div>
            `;
        });
    })
}
dislpayList();
function displayDoneList() {
    fetch('fetch/DoneList.php')
    .then(response => response.json())
    .then(data => {
        let displaytodo = document.getElementById('displayTodoListDone');
        displaytodo.innerHTML = '';
        data.forEach(element => {
            displaytodo.innerHTML += `
            <div class="flex flex-col border-2 border-red-800 rounded-lg my-2 p-2">
                <div class="flex flex-col space-y-3">
                    <div class="col-md-10">
                        <h3>Titre de l'event: ${element.titre}</h3>
                        <p>Créer par ${element.login} le ${element.creer}</p>
                    </div>
                    <div class="flex flex-col bg-slate-500 p-2 rounded">
                        <h3>Description :</h3>
                        <p>
                            <span>${element.contenu}</span>
                            <span>ID: ${element.id}</span>
                        </p>
                    </div>
                    <div class="flex justify-around">
                        <button class="rounded-lg bg-red-500 text-white p-2" id="btnDelete" onclick="deleteList(${element.id})">Delete</button>
                    </div>
                </div>
            </div>
            `;
        });
    })
}
displayDoneList();
function updateList(id) {
    fetch(`fetch/fetch_update.php?id=${id}`)
    .then(response => {
        console.log(response);
        return response.json();
    })
    .then(data => {
        if (data.status === 'success') {
            dislpayList();
        }
    })
}
function deleteList(id) {
    fetch(`fetch/fetch_delete.php?id=${id}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                dislpayList();
            }
        })
        .catch(error => console.error('Error:', error));
}
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
            message.innerHTML = 'Tâche ajouté';
            message.classList.add('alert-success');
            message.classList.remove('alert-danger');
        }
    })
});
btnTodoList.addEventListener('submit', (e) => {
    e.preventDefault();
    setTimeout(dislpayList, 50);
});

let btnDelete = document.querySelector('#btnDelete');
btnDelete.addEventListener('click', (e) => {
    setTimeout(dislpayList, 10);
});