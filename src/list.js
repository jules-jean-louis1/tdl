const dolistForm = document.querySelector('#todolistForm');
const btnTodoList = document.querySelector('#btnTodoList');
function formatDate(timestamp) {
    const date = new Date(timestamp);
    const year = date.getFullYear();
    const month = date.getMonth() + 1;
    const day = date.getDate();
    const hours = date.getHours();
    const minutes = date.getMinutes();
    const seconds = date.getSeconds();
    return `${day}/${month}/${year} à ${hours}:${minutes}:${seconds}`;
}

function dislpayList() {
    fetch('fetch/fetch_list.php')
    .then(response => response.json())
    .then(data => {
        let displaytodo = document.getElementById('displayTodoList');
        displaytodo.innerHTML = '';
        data.forEach(element => {
            const formattedDate = formatDate(element.creer);
            displaytodo.innerHTML += `
            <div class="flex flex-col rounded-lg ease-in bg-gradient-to-b from-[#fd7330] to-[#ef4b00] hover:bg-gradient-to-b hover:form-orange-600 hover:to-orange-700 my-2 p-2 lg:p-4 lg:w-full">
                <div class="flex flex-col space-y-3">
                    <div class="col-md-10">
                        <h3 class="font-bold">${element.titre}</h3>
                        <p class="font-light text-sm">Créer par ${element.login}</p>
                        <div class="flex items-center space-x-2">
                            <i class="fa-solid fa-clock"></i>
                            <p class="font-light text-sm">${formattedDate}</p>
                        </div>
                    </div>
                    <div class="flex flex-col bg-[#00000040] p-2 rounded">
                        <h3>Description :</h3>
                        <p>
                            <span>${element.contenu}</span>
                        </p>
                    </div>
                    <div class="flex">
                        <button class="text-white p-2" id="btnDelete" onclick="deleteList(${element.id})"><i class="fa-solid fa-trash-can"></i></button>
                        <button class="text-white p-2" onclick="updateList(${element.id})"><i class="fa-solid fa-circle-check"></i></button>
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
            const formattedDate = formatDate(element.creer);
            displaytodo.innerHTML += `
            <div class="flex flex-col bg-gradient-to-b from-orange-600 to-red-600 rounded-lg  my-2 p-2 lg:p-4 lg:w-full">
                <div class="flex flex-col space-y-3">
                    <div class="col-md-10">
                        <h3 class="font-bold">${element.titre}</h3>
                        <p class="font-light text-sm">Créer par ${element.login}</p>
                        <div class="flex items-center space-x-2">
                            <i class="fa-solid fa-clock"></i>
                            <p class="font-light text-sm">${formattedDate}</p>
                        </div>
                    </div>
                    <div class="flex flex-col bg-[#00000040] p-2 rounded">
                        <h3>Description :</h3>
                        <p>
                            <span>${element.contenu}</span>
                        </p>
                    </div>
                    <div class="flex">
                        <button class="text-white p-2" id="btnDelete" onclick="deleteList(${element.id})"><i class="fa-solid fa-trash-can"></i></button>
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
        console.log(data);
        if (data.status === 'success') {
            dislpayList();
            displayDoneList();
        }
    })
}
function deleteList(id) {
    fetch(`fetch/fetch_delete.php?id=${id}`)
        .then(response => {
            console.log(response);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            if (data.status === 'success') {
                dislpayList();
                displayDoneList();
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
            fadeOutMsg(message);
        } else if (data.status === 'success') {
            dislpayList();
            message.innerHTML = 'Tâche ajouté';
            message.classList.add('alert-success');
            message.classList.remove('alert-danger');
            fadeOutMsg(message);
        }
    })
});
btnTodoList.addEventListener('submit', (e) => {
    e.preventDefault();
    setTimeout(dislpayList, 50);
});

/*
let btnDelete = document.querySelector('#btnDelete');
btnDelete.addEventListener('click', (e) => {
    setTimeout(dislpayList, 10);
});*/
//Modiffication de l'opacity du bouton du succès
function fadeOutMsg(message) {
    setTimeout(() => {
        message.classList.add('hidden');
    }, 3000);
}


