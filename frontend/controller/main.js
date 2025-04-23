function loadContent(page) {
    const mainContent = document.getElementById("mainContent");
    mainContent.innerHTML = ''; // limpa o conteúdo atual

    if (page === "customers") {
        fetch('/frontend/screens/customers.php')
            .then(response => response.text())
            .then(html => {
                mainContent.innerHTML = html;

                // Agora que o conteúdo foi carregado, podemos chamar getCustomers()
                if (typeof getCustomers === "function") {
                    getCustomers();
                }
            });
    }

    if (page === "estimates") {
        fetch('/frontend/screens/estimates.php')
            .then(response => response.text())
            .then(html => {
                mainContent.innerHTML = html;
                if (typeof getEstimates === "function") {
                  
                    getEstimates();
                }
            });
    }
}


function logout() {
    const token = window.localStorage.getItem('TOKEN');
    if (!token) {
        alert("Você já está deslogado.");
        return;
    }

    fetch('https://stonerose.onrender.com/logout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${token}`
        }
    })
    .then(() => {
        window.localStorage.removeItem('TOKEN');
        window.location.href = '../../index.php';
    })
    .catch(error => {
        console.error('Erro ao fazer logout:', error);
    });
}

// Carrega a página de clientes por padrão
window.onload = () => loadContent('customers');

function dinamicContent (pagetoLoad){
    loadContent(pagetoLoad);
}
