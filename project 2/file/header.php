<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <script src="./js/project2.js" defer></script>
    <link rel="stylesheet" href="./css/dark-mode.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<header> 
    <img id="logo" src="..\Logos\logo-neutraal-kieslab-lichtblauw.svg" alt="logo">
    <h1> Neutraal Kieslab </h1>
    <?php
    if (isset($_SESSION['ingelogd_als'])) {
        echo '<a id="BTNuitloggen" href="logout.php">Uitloggen</a>';
    } else {
        echo '<a id="BTNuitloggen" href="../Start/inloggen.php">Inloggen</a>';
    }
    ?>

    <div class="theme-switch">
        <img src="../Logos/moon.png" id="icon">
    </div>
</header>
<nav>
    <a href="index.php">Home</a>
    <a href="partijen.php">Partijen</a>
    <a href="nieuws.php">Nieuws</a>
    <a href="stellingen.php">Stellingen</a>
</nav>

</body>
</html>