<?php include $_SERVER["DOCUMENT_ROOT"]."/include/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="/include/styles/header.css">
    <link rel="stylesheet" href="/pages/login/style/style.css">
</head>
<body>
    <main>
        <section>
            <h1>Login into your account</h1>
            <form id="loginForm" method="POST" novalidate>
                <input type="text" placeholder="Enter your login" id="nameInput">
                <input type="password" placeholder="Enter your password" id="passwordInput">
                <div class="disc">
                    <div class="remember">
                        <input type="checkbox" name="rememberInput" id="rememberAll">
                        <label for="rememberInput">Remember me?</label>
                    </div>
                    <a href="/pages/register/index.php" id="register">No Account?</a>
                </div>
                <button type="submit">Submit</button>
            </form>
            <p id="errorMessage"></p>
            
        </section>
    </main>
    <script src="/pages/login/logic/js/login.js"></script>
</body>
</html>