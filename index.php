<?php include "functions.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Voting App</title>
</head>
<body>
    <?php
        displayForm();
        displayResults();
    ?>
    <canvas id="canvas" width="300" height="300"></canvas>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
