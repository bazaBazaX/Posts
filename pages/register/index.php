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
            <form id="registerForm" method="POST" novalidate>
                <input type="email" placeholder="Enter your email" id="emailInput">
                <input type="text" placeholder="Enter your login" id="nameInput">
                <input type="password" placeholder="Enter your password" id="passwordInput">

                <button type="submit">Submit</button>
            </form>
            <p id="errorMessage"></p>
            <a href="/pages/register/index.php">No account?</a>
        </section>
    </main>
</body>
</html>