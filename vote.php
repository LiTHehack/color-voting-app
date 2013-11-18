<?php
include "functions.php";

if(isset($_POST['color'])) {
    $color = $_POST['color'];
    $votes = readResults();

    if(!isset($votes[$color])) {
        $votes[$color] = 0;
    }
    $votes[$color]++;

    var_dump($votes);

    $jsonToSave = json_encode($votes);
    file_put_contents("votes.json", $jsonToSave);
}
header("Location: index.php");