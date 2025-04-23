<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="/frontend/styles.css">
    <title>Stone Rose Intranet</title>
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>
    <div class="navbar">
        <div class="navbar-title">Clientes</div>
        <div class="navbar-actions">
            <button class="logout-button" onclick="logout()">Logout</button>
        </div>
    </div>
    <aside class="sidebar">
        <ul>
            <li><a href="#" id="estimatesList" onclick="dinamicContent('estimates')">Estimates</a></li>
            <li><a href="#" id="customersList" onclick="dinamicContent('customers')">Customers</a></li>
            <li><a href="#" id="config" onclick="dinamicContent('config')">Configurações</a></li>
        </ul>
    </aside>

    <div id="mainContent" class="container">

    <!-- Conteudo carregado dinamicamente -->
    </div>
    <script src="/frontend/controller/main.js"></script>
    <script src="/frontend/controller/customers.js"></script>
    <script src="/frontend/controller/estimates.js"></script>
</body>

</html>