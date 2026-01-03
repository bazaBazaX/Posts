<?php 

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<body>
    <header>
    <h1>Baza C.</h1>
    <nav>
        <a href="/pages/posts/index.php">Posts</a>
        <?php
            if(isset($_SESSION["user-id"])) {
                echo '<a href="">Create posts</a>';
                echo '<a href="../../logic/logout.php">Log out</a>';
            } else {
                echo '<a href="/pages/login/index.php">Login</a>';
            }
        ?>
    </nav>
</header>