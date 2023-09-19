<?php
if (isset($_SESSION['username'])) {
    echo '<p class="logged-in-notice">Logged in to project <span>' . $_SESSION['username'] . '</span>. <a href="index.php?logout=logout">Logout</a></p>';
}
else {
    ?>
    <p>Please log in below, or enter new credentials to create an account.</p>
    <form action="index.php?select_action=<?=filter_input(INPUT_GET, 'select_action')?>" method="POST">
        <label for="login_username">Project Name: </label>
        <input required name="login_username" id="login_username" maxlength="15" value="<?=$new_user?>">
        <br>
        <label for="login_pwd">Project Password: </label>
        <input required type="password" name="login_pwd" id="login_pwd" maxlength="15">
        <br>
        <label for="use_cookies">Remember me with a 24-hour cookie (optional): </label>
        <input type="checkbox" name="use_cookies" value="yes" id="use_cookies">
        <br>
        <button type="submit" name="submit" value="login">Log in</button>
    </form>
    <?php
}

?>
