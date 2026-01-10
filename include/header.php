<header>
    <h1>Baza C.</h1>
    <nav>
        <a href="/pages/posts/index.php">Posts</a>
        <?php
            if(isset($_SESSION["user-id"])) {
                echo '<a href="../../logic/logout.php">Log out</a>';
            } else {
                echo '<a href="/pages/login/index.php">Login</a>';
            }
        ?>
    </nav>
</header>