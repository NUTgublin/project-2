<?php
session_start();

if (!isset($_SESSION['ingelogd_als'])) {
    header("Location: ../Start/inloggen.php");
    exit();
}

$username = $_SESSION['ingelogd_als'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neutraal Kieslab</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/dark-mode.css">
    <script src="../js/project2.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once 'header.php'; ?>
    
    <nav>
        <a href="index.php">Home</a>
        <a href="partijen.php">Partijen</a>
        <a href="nieuws.php">Nieuws</a>
        <a href="stellingen.php">Stellingen</a>
    </nav>

    <div class="DivContainer">
        <div class="fototest">
            <img id="imgPar" src="../Logos/stemming.jpg" alt="Parlament">
        </div>

        <div class="titelGrid">
            <div class="titel">
                <h1>Doe de StemWijzer</h1>
            </div>

            <form action="start.php" id="form" method="POST">
                <button id="btStartWijzer" type="submit">Start</button>
            </form>
        </div>
    </div>
    
    <?php require_once 'footer.php'; ?>
</body>
</html>
