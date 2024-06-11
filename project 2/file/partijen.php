<?php
include_once "../classes/dbhandler.php";
$dbhandler = new dbhandler();
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'header.php' ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/partijen.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>partijen</title>
</head>

<body>
    <nav>
        <a href="index.php">home</a>
        <a href="partijen.php">partijen</a>
        <a href="nieuws.php">nieuws</a>
        <a href="stellingen.php">stellingen</a>
    </nav>
    <?php

    $rows = $dbhandler->SelectPartijen();

    foreach ($rows as $row) {
        echo "<tr>";
        echo "<td><img src='" . $row["logo"] . "' alt='" . $row["naam"] . " image' class='logo'></td>";
        echo "<td>";
    }
    ?>
    <?php require 'footer.php' ?>
</body>

</html>