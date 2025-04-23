
const token = window.localStorage.getItem('TOKEN');

function getCustomers() {
    const endPoint = 'https://stonerose.onrender.com/customers/';
    var options = {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${token}`
        },

    };
    fetch(endPoint, options).then(
        response => response.json()
    ).then(data => {
        makeCustomersTable(data);
        console.log(data);
    }).catch(error => {
        console.error(error);
    });
}

function makeCustomersTable(data) {
    var userTable = document.getElementById('userTable');
    var tbody = userTable.getElementsByTagName('tbody')[0];

    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    data.dataSet.forEach(function (user) {
        var row = document.createElement('tr');

        // Salva o ID como atributo no <tr>
        row.setAttribute('data-id', user.id); // ou user.ID, dependendo da chave

        // Agora você só adiciona as outras colunas (exceto ID)
        for (var key in user) {
            if (user.hasOwnProperty(key) && key.toLowerCase() !== 'id') {
                var cell = document.createElement('td');
                cell.textContent = user[key];
                row.appendChild(cell);
            }
        }

        // Celula de ações
        const actionCell = document.createElement('td');
        actionCell.classList.add('acao-buttons');

        const viewBtn = document.createElement('button');
        viewBtn.innerHTML = '<i class="fas fa-eye"></i>';
        viewBtn.classList.add('icon-button', 'view');
        viewBtn.title = 'Ver Detalhes';
        viewBtn.onclick = () => openModal(user);

        const editBtn = document.createElement('button');
        editBtn.innerHTML = '<i class="fas fa-pen"></i>';
        editBtn.classList.add('icon-button', 'edit');
        editBtn.title = 'Editar';
        editBtn.onclick = () => editarCliente(user);

        const deleteBtn = document.createElement('button');
        deleteBtn.innerHTML = '<i class="fas fa-trash"></i>';
        deleteBtn.classList.add('icon-button', 'delete');
        deleteBtn.title = 'Excluir';
        deleteBtn.onclick = () => excluirCliente(user.id);

        const osBtn = document.createElement('button');
        osBtn.textContent = "Ordem de Serviço";
        osBtn.classList.add('os-button', 'action-button');
        osBtn.style.marginLeft = '10px';
        osBtn.onclick = function () {
            // abrirModalOrdemServico(user);
        };

        const estimateBtn = document.createElement('button');
        estimateBtn.textContent = "New Estimate";
        estimateBtn.classList.add('estimate-button', 'action-button');
        estimateBtn.style.marginLeft = '10px';
        estimateBtn.onclick = function () {
            // createEstimate(user);
        };

        actionCell.appendChild(viewBtn);
        actionCell.appendChild(editBtn);
        actionCell.appendChild(deleteBtn);
        actionCell.appendChild(osBtn);
        actionCell.appendChild(estimateBtn);
        row.appendChild(actionCell);

        tbody.appendChild(row);
    });
}


function createEstimate(customer){
    console.log(customer);
}

function excluirCliente(id){
    //const id = deleteBtn.closest('tr').getAttribute('data-id');
    console.log(id);
    const cliente = {
        id: id,
    };
}


function openModal(user) {
    const modal = document.getElementById('modal');
    const modalBody = document.getElementById('modalBody');
    const carousel = document.getElementById('carousel');

    // Carregar as imagens do carrossel
    const images = user.images || []; // Suponha que cada 'user' tenha um array de imagens
    let carouselContent = '';

    images.forEach((image, index) => {
        carouselContent += `
            <div class="carousel-slide" style="display: ${index === 0 ? 'block' : 'none'};">
                <img src="${image}" alt="Imagem do cliente ${user.name}" class="carousel-image">
            </div>
        `;
    });
    carousel.innerHTML = carouselContent;

    // Detalhes do cliente
    modalBody.innerHTML = `
        <p><strong>Nome:</strong> ${user.name}</p>
        <p><strong>Sobrenome:</strong> ${user.last_name}</p>
        <p><strong>CEP:</strong> ${user.zip_code}</p>
        <p><strong>Email:</strong> ${user.email}</p>
        <p><strong>Endereço:</strong> ${user.address}</p>
    `;

    modal.style.display = 'block';
}

function openAddCustomerModal() {
    document.getElementById('addCustomerModal').style.display = 'block';
}

function closeAddCustomerModal() {
    document.getElementById('addCustomerModal').style.display = 'none';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}


async function salvarCliente() {
    event.preventDefault();
    const endPoint = 'https://stonerose.onrender.com/saveCustomer/';
    const nome = document.getElementById('name').value.trim();
    const lastName = document.getElementById('lastName').value.trim();
    const zip = document.getElementById('zipCode').value.trim();
    const endereco = document.getElementById('address').value.trim();
    const email = document.getElementById('email').value.trim();
    const tel = document.getElementById('tel').value.trim();

    const cliente = {
        nome: nome,
        lastName: lastName,
        zipCode: zip,
        endereco: endereco,
        email: email,
        tel: tel
    };

    var options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(cliente)
    };


    try {
        fetch(endPoint, options)
            .then(response => response.json())
            .then(data => {
                console.log();
                if (data.dataSet.status.success) {
                    alert('Cliente cadastrado com sucesso!');
                    fecharModalCadastro(); // você pode esconder o modal aqui
                    getCustomers();
                } else {
                    const erro = data.dataSet.status.error;
                    alert('Erro ao cadastrar: ' + erro);
                }
            })
            .catch(error => {
                console.log(error);
            });

    } catch (err) {
        console.error('Erro na requisição:', err);
        alert('Erro ao conectar com o servidor.');
    }
}

function fecharModalCadastro() {
    const modal = document.getElementById('addCustomerModal');
    if (modal) {
        modal.style.display = 'none';
    }
}