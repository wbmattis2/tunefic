<?php
$vars_array = get_metaconfig($conn, $_SESSION['username']);
?>

<form method="post" action="<?=$vars_array->url->value?>" target="_blank">
    <?php
    $status_dict = [
        'required' => 'required',
        'prohibited' => 'disabled',
        'permitted' => ''
    ];
    foreach ($vars_array as $var => $properties) {
        if ($var == 'url') echo '<div class="core-var">';
        if ($properties->type == 'boolean') {
            ?>
            <label for="<?=$var?>"><?=$var?> (<?=$properties->status?> boolean):</label>
            <select id="<?=$var?>" name="<?=$var?>" <?=$status_dict[$properties->status]?>>
                <option name="<?=$var?>" value="true" <?=strtolower($properties->value) == 'true' ? 'selected="selected"':''?>>True<option>
                <option name="<?=$var?>" value="false" <?=strtolower($properties->value) == 'false' ? 'selected="selected"':''?>>False<option>
            </select>
            <?php
        }
        else {
        ?>
        <label for="<?=$var?>"><?=$var?> (<?=$properties->status?> <?=$properties->type?>):</label>
        <input id="<?=$var?>" name="<?=$var?>" value="<?=$properties->value?>" <?=$status_dict[$properties->status]?>></input>
        <?php
        }
        ?>
        <br/>
    <?php
        if ($var == 'url') echo '<em>This value should be the url of your project (e.g., https://www.site.com/game.php)</em></div>';
    }
    ?>
    <br/>
    <button type="submit" name="tunefic" value="1">Test this configuration</button>
</form>