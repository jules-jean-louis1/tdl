const dolistForm = document.querySelector('#todolistForm');
const btnTodoList = document.querySelector('#btnTodoList');

// Formatage de la date
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
//Modiffication de l'opacity du bouton du succès-erreur
function fadeOutMsg(message) {
    setTimeout(() => {
        message.classList.add('hidden');
    }, 3000);
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
            <div class="w-1/2 px-2 mb-4">
                <div class="flex flex-col rounded-lg border-2 border-[#fff] bg-[#FFFFFF66] ease-in p-2 lg:p-4 text-black">
                    <div class="flex flex-col space-y-3">
                        <div class="col-md-10">
                            <h3 class="font-bold border-b-2 border-[#000]">${element.titre}</h3>
                            <p class="font-light text-sm">Créer par ${element.login}</p>
                            <div class="flex items-center space-x-2">
                                <i class="fa-solid fa-clock"></i>
                                <p class="font-light text-sm">${formattedDate}</p>
                            </div>
                        </div>
                        <div class="flex flex-col bg-[#FFFFFF99] p-2 rounded hover:bg-[#FFFFFF] ease-out duration-300">
                            <h3>Description :</h3>
                            <p>
                                <span>${element.contenu}</span>
                            </p>
                        </div>
                        <div class="flex">
                            <button class="text-red-300 hover:text-red-500 p-2 px-3 hover:bg-[#bfc3c8] rounded-full" id="btnDelete" onclick="deleteList(${element.id})"><i class="fa-solid fa-trash-can"></i></button>
                            <button class="text-green-300 hover:text-green-500 p-2 px-3 hover:bg-[#bfc3c8] rounded-full" onclick="updateList(${element.id})"><i class="fa-solid fa-circle-check"></i></button>
                        </div>
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
            <div class="w-1/2 px-2 mb-4">
                <div class="flex flex-col border-2 border-[#00000040] bg-[#dcdcdc] hover:bg-[#b7b7b7] ease-in duration-300 rounded-lg p-2 lg:p-4 w-[%50]">
                    <div class="flex flex-col space-y-3">
                        <div class="col-md-10">
                            <h3 class="font-bold border-b-2 border-[#000]">${element.titre}</h3>
                            <p class="font-light text-sm">Créer par ${element.login}</p>
                            <div class="flex items-center space-x-2">
                                <i class="fa-solid fa-clock"></i>
                                <p class="font-light text-sm">${formattedDate}</p>
                            </div>
                        </div>
                        <div class="flex flex-col bg-[#b7b7b7] p-2 rounded">
                            <h3>Description :</h3>
                            <p>
                                <span>${element.contenu}</span>
                            </p>
                        </div>
                        <div class="flex">
                            <button class="text-red-300 hover:text-red-500 p-2 px-3 hover:bg-[#bfc3c8] rounded-full" id="btnDelete" onclick="deleteList(${element.id})"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
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
//Affichage des users
/*function displayUsers() {
    fetch('fetch/todo_info_user_select.php')
        .then(response => response.json())
        .then(data => {

            // Récupérer la div parent
            const displayUsers = document.getElementById('displayUsers');

            // Créer le select parent
            const select = document.createElement('select');
            select.className = 'rounded-md p-2 text-black bg-slate-300 hover:bg-slate-100 ease-out duration-200';

            data.forEach(utilisateur => {
                const option = document.createElement('option');
                option.value = utilisateur.id;
                option.textContent = utilisateur.login;
                option.className = 'rounded-md p-2 text-black bg-slate-300 hover:bg-slate-100 ease-out duration-200'
                select.appendChild(option);
            });

            // Ajouter le select parent dans la div parent
            displayUsers.appendChild(select);
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des utilisateurs avec droits de planification', error);
        });
}*/
function displayUsers() {
    return fetch('fetch/todo_info_user_select.php')
        .then(response => response.json())
        .then(data => {
            const select = document.createElement('select');
            select.className = 'rounded-md p-2 text-black bg-slate-300 hover:bg-slate-100 ease-out duration-200';
            select.id = 'selectUser';
            select.name = 'selectUser';

            data.forEach(utilisateur => {
                const option = document.createElement('option');
                option.value = utilisateur.id;
                option.textContent = utilisateur.login;
                option.className = 'rounded-md p-2 text-black bg-slate-300 hover:bg-slate-100 ease-out duration-200'
                select.appendChild(option);
            });

            return select;
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des utilisateurs avec droits de planification', error);
        });
}
// Creation d'un formulaire qui permet de donner des droits à un autres utilisateurs
function createAddUser(addUserFormContainer) {
    let addUserForm = document.createElement('form');
    addUserForm.id = 'addUserForm';
    addUserForm.className = 'flex space-x-2 py-2 justify-center';
    addUserForm.setAttribute('action', 'fetch/formUserRight.php')
    addUserForm.setAttribute('method', 'POST');

    displayUsers().then(select => {
        addUserForm.appendChild(select);

        let addUserFormSubmit = document.createElement('button');
        addUserFormSubmit.className = 'rounded-md p-2 text-black bg-slate-300 hover:bg-slate-100 ease-out duration-200';
        addUserFormSubmit.textContent = 'Ajouter';
        addUserFormSubmit.type = 'submit';
        addUserFormSubmit.name = 'addUser';
        addUserFormSubmit.id = 'addUser';
        addUserForm.appendChild(addUserFormSubmit);
    });

    addUserFormContainer.appendChild(addUserForm);

    return addUserForm;
}

// Fonction qui supprime le formulaire d'ajout d'utilisateur
function removeAddUserForm(parent, child) {
    parent.removeChild(child);
}
// Bouton pour faire apparaitre/disparaitre le formulaire d'ajout d'utilisateur

function toggleButton(btnDisplayUser, addUserFormContainer, addUserForm) {
    if (addUserForm !== null) {
        removeAddUserForm(addUserFormContainer, addUserForm);
        btnDisplayUser.textContent = 'Ajouter un utilisateur';
    }
    else {
        createAddUser(addUserFormContainer);
        btnDisplayUser.textContent = 'Annuler';
    }
}
let btnDisplayUser = document.querySelector('#btnAddUser');
let addUserFormContainer = document.querySelector('#addUserFormContainer');
let containerNodes = addUserFormContainer.childNodes;

btnDisplayUser.addEventListener('click', (e) => {
    let addUserForm = document.querySelector('#addUserForm');
    toggleButton(btnDisplayUser, addUserFormContainer, addUserForm);
});

// Recupperation des utilisateur ajouter avec les droits de planification
function displayUsersWithRights() {
    fetch('fetch/formUserRight.php')
        .then(response => response.json())
        .then(data => {
            let displayMsg = document.querySelector('#errorMsg2');
            if (data.status === 'success') {
                displayMsg.innerHTML = 'Utilisateur ajouté';
                displayMsg.classList.add('alert-success');
                displayMsg.classList.remove('alert-danger');
                fadeOutMsg(displayMsg);
            } else if (data.status === 'error') {
                displayMsg.innerHTML = 'Erreur lors de l\'ajout de l\'utilisateur';
                displayMsg.classList.add('alert-danger');
                displayMsg.classList.remove('alert-success');
                fadeOutMsg(displayMsg);
            }
        })
}


