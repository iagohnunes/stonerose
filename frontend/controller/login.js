document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const endPoint = 'https://stonerose.onrender.com/';

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    var data = {
        username: username,
        password: password
    };

    var options = {
        method: 'POST',
        mode: 'cors',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    };
    fetch(`${endPoint}login`, options)
        .then(response => {
            console.log(response);
            return response.json()
        })
        .then(data => {
            console.log(data);

            window.localStorage.setItem('TOKEN', data.dataSet[0].USERTOKEN);
            window.location.href = '/frontend/screens/main.php';

        })
        .catch(error => {
            console.log(error);
        });
});

document.getElementById('showSignUp').addEventListener('click', function (event) {
    
    event.preventDefault(); // Evita que o link recarregue a página
    document.getElementById('container-signUp').style.display = 'block';
    document.getElementById('container-login').style.display = 'none';
});

document.getElementById('signupForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const endPoint = 'https://stonerose.onrender.com/';
    var username = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password-signUp').value;

    var data = {
        username: username,
        password: password,
        email: email
    };

    var options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    };

    fetch(`${endPoint}users`, options)
        .then(response => response.json())
        .then(data => {
            console.log(data);

        })
        .catch(error => {
            console.log(error);
        });
});