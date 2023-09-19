<?php
session_start();
if (isset($_COOKIE['username_cookie'])) {
    $_SESSION['username'] = $_COOKIE['username_cookie'];
} 
include("./assets/php/_db_config.php");
include("./assets/php/_db_toolkit.php");
include("./assets/php/_prg.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./assets/php/_head.php"); ?>
<body>
    <?php 
    include("./assets/php/_header.php"); 
    ?>
    <main>
        <?php include("./assets/php/_messages.php"); ?>
        <section id="login">
            <?php include("./assets/php/_login.php"); ?>
        </section>
        <section id="features">
            <?php include("./assets/php/_features.php"); ?>
        </section>
    </main>
</body>
</html>