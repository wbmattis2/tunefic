<?php
include(__DIR__ . '/Parsedown/Parsedown.php');
$parsedown = new Parsedown();
echo $parsedown->text(file_get_contents('https://raw.githubusercontent.com/wbmattis2/tunefic/main/README.md'));
?>