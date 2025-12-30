<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="/include/styles/header.css">
</head>
<body>
    <?php include $_SERVER["DOCUMENT_ROOT"]."/include/header.php"; ?>

    <main>
        <section>
            <form id="loginForm" method="POST" novalidate>
                <input type="text" placeholder="Enter your login" id="nameInput">
                <input type="password" placeholder="Enter your password" id="passwordInput">

                <button type="submit">Submit</button>
            </form>
            <p id="errorMessage"></p>
        </section>
    </main>
    <script src="/pages/login/logic/js/login.js"></script>
</body>
</html>