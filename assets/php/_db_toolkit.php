<?php

function get_metaconfig($conn, $username) {
    $query = "SELECT `project_metaconfig` FROM projects WHERE `project_name` = '".mysqli_real_escape_string($conn, $username)."'";
    $result = mysqli_query($conn, $query);
    return json_decode(mysqli_fetch_assoc($result)['project_metaconfig']);
}

function validate_login($username, $pwd) { 
    //Returns TRUE for successful login, or FALSE for unsuccessful logins.
    //If the username does not already exist, creates a new record and feeds notice to user through POST-REDIRECT-GET
        global $conn;
        $query = "SELECT * FROM projects WHERE `project_name` = '".mysqli_real_escape_string($conn, $username)."'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 0) {
            $query = "INSERT INTO projects (`project_name`, `project_pwd`, `project_metaconfig`) VALUES ('".mysqli_real_escape_string($conn, $username)."', '".mysqli_real_escape_string($conn, $pwd)."', '{\"url\":{\"value\": \"test.com\", \"type\": \"string\", \"status\": \"prohibited\"} }')";
            $result = mysqli_query($conn, $query);
            $user_add = $result ? "success" : "failure";
            header("Location:index.php?msg_flag=$user_add&new_user=$username&select_action=".(filter_input(INPUT_GET, 'select_action') ?? ''));
            exit("Redirecting...");
        }
        $query = "SELECT * FROM projects WHERE `project_name` = '".mysqli_real_escape_string($conn, $username)."' AND `project_pwd` = '".mysqli_real_escape_string($conn, $pwd)."'";
        $result = mysqli_query($conn, $query);
        return (mysqli_num_rows($result) == 1);
    }

?>
