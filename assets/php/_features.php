<?php
$current_feature = filter_input(INPUT_GET, "select_action");
$available_features = array(
    "set_metaconfig" => "Developer Mode (set meta-configuration)", 
    "create_tune" => "Designer Mode (test project configuration)",
    "view_docs" => "Documentation (README)"
);

//Locate and include the feature component selected by the user
if (!empty($current_feature)) {
    $feature_location = "./assets/php/_" . $current_feature . ".php";
    echo "<h2>" . $available_features[$current_feature] . "</h2>";
    if ($current_feature == 'view_docs') {
        include($feature_location);
    }
    else {
        if (!empty($_SESSION['username'])) {
            include($feature_location);
        }
    }
}
else {
    echo "<p><quote>I never quit until I get what I'm after. Negative results are just what I'm after. They are just as valuable to me as positive results.</quote><br/>&mdash;Thomas Edison</p>";
}

?>