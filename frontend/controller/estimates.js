function newEstimateModal() {

    document.getElementById('newEstimateModal').style.display = 'block';
    flatpickr("#datetime", {
        enableTime: true,
        dateFormat: "m/d/Y h:i K",
        time_24hr: false
    });
}

function closeNewEstimateModal() {
    document.getElementById('newEstimateModal').style.display = 'none';
}

async function cadastrarEstimate() {
    event.preventDefault();
    const endPoint = 'https://stonerose.onrender.com/createEstimate/';
    
    const name = document.getElementById('name').value.trim();
    const last_Name = document.getElementById('lastName').value.trim();
    const zip_code = document.getElementById('zipCode').value.trim();
    const address = document.getElementById('address').value.trim();
    const email = document.getElementById('email').value.trim();
    const contact = document.getElementById('tel').value.trim();
    const datetime = document.getElementById('datetime').value.trim();
    
    
    const estimate = {
        name: name,
        last_Name: last_Name,
        zip_code: zip_code,
        address: address,
        email: email,
        contact: contact,
        datetime: datetime
    };

    var options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(estimate)
    };


    try {
        fetch(endPoint, options)
            .then(response => response.json())
            .then(data => {
                console.log();
                if (data.dataSet.status.success) {
                    alert('Estimate cadastrada com sucesso!');
                    closeNewEstimateModal(); // você pode esconder o modal aqui
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

function getEstimates() {
    const endPoint = 'https://stonerose.onrender.com/getEstimates/';
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
        makeEstimatesTable(data);
    }).catch(error => {
        console.error(error);
    });
}

function makeEstimatesTable(data) {
    var estimateTable = document.getElementById('estimateTable');
    var tbody = estimateTable.getElementsByTagName('tbody')[0];

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
        viewBtn.title = 'Preencher estimate';
        viewBtn.onclick = () => openModal(user);




        actionCell.appendChild(viewBtn);
      
       
        
        row.appendChild(actionCell);

        tbody.appendChild(row);
    });
}
