<?php
include "error_logger.php";

function colors() {
    return array('#ff0000', '#00aa00', '#0000ff', '#ff7d00', '#000000');
}

function readResults() {
    $jsonFromFile = file_get_contents("votes.json");
    $votes = json_decode($jsonFromFile, true);

    return $votes;
}

function displayForm() {
    echo '<form action="vote.php" method="post">';

    $colors = colors();
    foreach($colors as $color) {
        echo '<label style="color:' . $color .';">' 
        . $color;
        echo '<input type="radio" name="color" value="' 
        . $color . '">';
        echo '</label>';
    }
    echo '<input type="submit">';
    echo '</form>';
}

function displayResults() {
    $results = readResults();
    asort($results);
    $results = array_reverse($results);

    echo '<ul>';
    foreach ($results as $color => $votes) {
        echo '<li><span style="color:' . $color . ';">' 
        . $color . '</span> has ' 
        . $votes . ' votes</li>';
    }
    echo '</ul>';
}