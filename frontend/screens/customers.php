<h1>Customers</h1>
<button onclick="openAddCustomerModal()">New Customer</button>

<div class="input-container" style="display: none;">
    <label class="input-label" for="idInput">ID:</label>
    <input class="input-field" type="text" id="idInput" name="idInput">
    <button onclick="filterUser()">filtrar</button>
</div>

<table id="userTable">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Last Name</th>
            <th>Zip Code</th>
            <th>E-mail</th>
            <th>Adress</th>
            <th>Tel</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <!-- Conteúdo preenchido via JS -->
    </tbody>
</table>

<!-- Modal de Detalhes -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Servico</h2>
        <div id="modalBody"></div>

        <div class="carousel-container">
            <button class="carousel-prev" onclick="moveSlide(-1)">&#10094;</button>
            <div id="carousel" class="carousel"></div>
            <button class="carousel-next" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </div>
</div>

<!-- Modal de Cadastro -->
<div id="addCustomerModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeAddCustomerModal()">&times;</span>
        <h2>Cadastrar Novo Cliente</h2>
        <form id="addCustomerForm">
            <div class="form-group">
                <label for="newName">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="newLastName">Last Name</label>
                <input type="text" id="lastName" name="lastName">
            </div>
            <div class="form-group">
                <label for="newZipCode">Zip Code:</label>
                <input type="text" id="zipCode" name="zipCode">
            </div>
            <div class="form-group">
                <label for="newAddress">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="newTel">Telefone:</label>
                <input type="text" id="tel" name="tel">
            </div>
            <div class="form-group">
                <label for="newemail">Email:</label>
                <input type="text" id="email" name="email">
            </div>
            <button onclick="salvarCliente()">Salvar</button>
        </form>
    </div>
</div>


