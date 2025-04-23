<h1>Estimates</h1>
<button onclick="newEstimateModal()">Nova Estimate</button>

<table id="estimateTable">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Last Name</th>
            <th>Zip Code</th>
            <th>Adress</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Agendamento</th>
            <th>Status</th>
            <th>Acoes</th>
        </tr>
    </thead>
    <tbody>
        <!-- Conteúdo preenchido via JS -->
    </tbody>
</table>

<!-- Modal de Detalhes -->


<!-- Modal de Cadastro -->
<div id="newEstimateModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeNewEstimateModal()">&times;</span>
        <h2>Cadastrar Nova Estimate</h2>
        <form id="teste">
            <div class="form-group">
                <label for="newName">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="newLastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="newZipCode">Zip Code:</label>
                <input type="text" id="zipCode" name="zipCode" required>
            </div>
            <div class="form-group">
                <label for="newAddress">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="newemail">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="newemail">Contato:</label>
                <input type="text" id="tel" name="tel" required>
            </div>
            <div class="form-group">
                <label for="datetime">Data e hora (AM/PM):</label>
                <input type="text" id="datetime" name="datetime" class="form-control" placeholder="Selecione a data e hora">

            </div>
            <button onclick="cadastrarEstimate()">Cadastrar Estimate</button>
        </form>
    </div>
</div>