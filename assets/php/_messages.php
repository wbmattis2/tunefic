<?php
$new_user = filter_input(INPUT_GET, "new_user");
$user_add_var = filter_input(INPUT_GET, "msg_flag");
if (isset($new_user)) {
    $user_add_messages = array(
    "success" => '<p class="success-notice">You have created an account with the username <span>' . htmlentities($new_user) . '</span>. Please re-enter your password to log in.</p>',
    "failure" => '<p class="failure-notice">Failed to create new account with the username <span>' . htmlentities($new_user) . '</span>. Please try again with a different username.</p>',
    "wrong_pwd" => '<p class="failure-notice">Login failed for project <span>' . $new_user . '</span>.</p>'
    );
    echo $user_add_messages[$user_add_var];
}
else {
    $loggedout = filter_input(INPUT_GET, "loggedout");
    if ($loggedout) {
        echo '<p class="success-notice">You have successfully logged out of your TuneFic project.</p>';
    }
}
?>