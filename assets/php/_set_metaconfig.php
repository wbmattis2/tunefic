<?php
$vars_array = get_metaconfig($conn, $_SESSION['username']);
$msg_template = filter_input(INPUT_GET, "msg_flag");
if (isset($msg_template)) { 
    $msg_array = array(
        "failure" => '<p class="failure-notice">Your update has failed.</p>',
        "success" => '<p class="success-notice">Your update has succeeded.</p>',
    );
    echo $msg_array[$msg_template];
}
?>
<form method="post">
    <?php
    foreach ($vars_array as $var => $properties) {
        if ($var == 'url') echo '<div class="core-var">';
    ?>
    <h3><?=$var?></h3>

    <label for="<?=$var?>_type">Prompt for type: </label>
    <select id="<?=$var?>_type" name="<?=$var?>_type" required>
        <option name="<?=$var?>_type" value="string" <?=$properties->type == 'string' ? 'selected="selected"':''?>>String<option>
        <option name="<?=$var?>_type" value="number" <?=$properties->type == 'number' ? 'selected="selected"':''?>>Number<option>
        <option name="<?=$var?>_type" value="boolean" <?=$properties->type == 'boolean' ? 'selected="selected"':''?>>Boolean<option>
    </select>

    <label for="<?=$var?>_value">Default value: </label>
    <input id="<?=$var?>_value" name="<?=$var?>_value" value="<?=$properties->value?>" required></input>

    <label for="<?=$var?>_status">Status: </label>
    <select id="<?=$var?>_status" name="<?=$var?>_status" required>
        <option name="<?=$var?>_status" value="required" <?=$properties->status == 'required' ? 'selected="selected"':''?>>Required<option>
        <option name="<?=$var?>_status" value="permitted" <?=$properties->status == 'permitted' ? 'selected="selected"':''?>>Permitted<option>
        <option name="<?=$var?>_status" value="prohibited" <?=$properties->status == 'prohibited' ? 'selected="selected"':''?>>Prohibited<option>
    </select>

    <?php
        if ($var == 'url') echo '<br/><em>This value should be the url of your project (e.g., https://www.site.com/game.php)</em></div>';
    }
    ?>
        <h3>--- Add New Variable ---</h3>

        <label for="new_name">Name: </label>
        <input id="new_name" name="new_name"></input>

        <label for="new_type">Variable type: </label>
        <select id="new_type" name="new_type">
            <option name="new_type" value="string">String<option>
            <option name="new_type" value="number">Number<option>
            <option name="new_type" value="boolean">Boolean<option>
        </select>

        <label for="new_value">Default value: </label>
        <input id="new_value" name="new_value"></input>

        <label for="new_status">Status: </label>
        <select id="new_status" name="new_status">
            <option name="new_status" value="required">Required<option>
            <option name="new_status" value="permitted">Permitted<option>
            <option name="new_status" value="prohibited">Prohibited<option>
        </select>

        <br/>

        <button type="submit" name="submit" value="metaconfig">Submit new meta-configuration</button>
</form>