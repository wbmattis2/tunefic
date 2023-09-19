<?php

$submit_code = filter_input(INPUT_POST, 'submit');

if (isset($submit_code)) {
    switch ($submit_code) {
        case 'metaconfig':
            $just_submitted = filter_input(INPUT_POST, "submit") == 'metaconfig';
            $new_var_submitted = !empty(filter_input(INPUT_POST, "new_name"));
            $vars_array = get_metaconfig($conn, $_SESSION['username']);
            if ($just_submitted) {
                $new_vals_obj = $vars_array;
                foreach ($vars_array as $var => $properties) {
                    foreach ($properties as $property => $value) {
                        $new_vals_obj->$var->$property = filter_input(INPUT_POST, $var . "_" . $property);
                    }
                }
                if ($new_var_submitted) {
                    $submitted_var_name = filter_input(INPUT_POST, 'new_name');
                    $new_vals_obj->$submitted_var_name = new stdClass();
                    foreach (['type','status','value'] as $property) {
                        $new_vals_obj->$submitted_var_name->$property = filter_input(INPUT_POST, 'new_' . $property);
                    }
                }
                $query = "UPDATE `projects` 
                    SET `project_metaconfig` = '".mysqli_real_escape_string($conn, json_encode($new_vals_obj))."'
                    WHERE `project_name` = '".mysqli_real_escape_string($conn, $_SESSION['username'])."';";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    $msg_flag = "success";
                }
                else {
                    $msg_flag = "failure";
                }
                $redirect_address = "index.php?select_action=set_metaconfig&msg_flag=$msg_flag";
            }
            break;
        case 'login':
            $login_username = filter_input(INPUT_POST, "login_username");
            $login_pwd = filter_input(INPUT_POST, "login_pwd");
            $use_cookies = filter_input(INPUT_POST, "use_cookies");
            if ( isset($login_username) && !empty($login_pwd) ) {
                $encrypted_pwd = md5($login_pwd);
                if ( validate_login($login_username, $encrypted_pwd) ) {
                    $_SESSION['username'] = $login_username;
                    if (isset($use_cookies) && $use_cookies['yes']) {
                        setcookie("username_cookie", $login_username, time() + 60 * 60 * 24);
                    }
                } 
                else {
                    $redirect_address = "index.php?msg_flag=wrong_pwd&new_user=". $login_username."&select_action=".(filter_input(INPUT_GET, 'select_action') ?? '');
                }
            }
    }
}

$logout = filter_input(INPUT_GET, "logout");
if ( isset($logout) && $logout === "logout") {
    if (isset($_COOKIE['username_cookie'])) {
        setcookie('username_cookie', "", time() - 120);
    }
    session_unset();
    session_destroy();
    $redirect_address = "index.php?loggedout=loggedout";
}

if (!empty($redirect_address)) {
    header('Location:' . $redirect_address);
    exit("Redirecting...");
}
?>