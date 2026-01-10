<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="/include/styles/header.css">
    <link rel="stylesheet" href="/pages/posts/style/style.css">
</head>
<body>
    <?php include $_SERVER["DOCUMENT_ROOT"]."/include/header.php"; ?>
    <main>
        <h2>Posts</h2>
        <section>
            <h3>Admin</h3>
            <h1>Really needed info</h1>
            <p>Baza is da best programmer in the entire globe.</p>
            <div class="time">
                <h3>04.01.2026</h3>
                <h4>23:12</h4>
            </div>
        </section>
    </main>
    <aside>
        <h2>Create Post</h2>
        <form action="" method="POST">
            <input type="text" placeholder="Enter your post idea" id="postName">
            <input type="text" placeholder="Enter your post message" id="postMessage">
            <button type="submit">Post</button>
        </form>
    </aside>
</body>
</html>