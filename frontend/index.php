<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>

<body>
    <div class="container-login" style="display: block">
        <h1>Login</h1>
        <form method="post" id="loginForm">
            <div class="form-group">
                <label for="username">User</label>
                <input type="text" id="username" name="username" placeholder="Digite seu usuário">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Digite sua senha">
            </div>
            <button type="submit" id="submitButton">Sing In</button>

            <a href="#" id="showSignUp">Registre-se</a>
        </form>
    </div>
    <div class="container-signUp" style="display: none">
        <h1>Sign Up</h1>
        <form method="post" id="signupForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password-signUp" name="password-signUp" placeholder="Enter your password">
            </div>
            <button type="submit" id="submitButton-signUp">Sign Up</button>
        </form>
    </div>
    <script src="./controller/login.js"></script>
</body>

</html>