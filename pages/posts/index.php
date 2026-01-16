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
    <link rel="stylesheet" href="/pages/posts/styles/style.css">
</head>
<body>
    <?php include $_SERVER["DOCUMENT_ROOT"]."/include/header.php"; ?>
    <main>
        <div class="posts">
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
            <!-- i need this section below to get into forEach func just for each message in db. load only 10 of them, then if we see the last one, load another 10. -->
            <section>
                <h3></h3>
                <h1></h1>
                <p></p>
                <div class="time">
                    <h3></h3>
                    <h4></h4>
                </div>
            </section>
        </div>
        <aside>
            <h2>Create Post</h2>
            <form action="" method="POST" id="postForm">
                <input type="text" placeholder="Enter your post name" id="postName" class="">
                <input type="text" placeholder="Enter your post message" id="postMessage" class="">
                <p id="errorText">No errors</p>
                <button type="submit">Post</button>
            </form>
        </aside> 
    </main>
    <script src="/pages/posts/logic/js/posts.js"></script>
</body>
</html>