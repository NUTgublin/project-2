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
    <link rel="stylesheet" href="../css/dark-mode.css">
    <script src="../js/project2.js" defer></script>
    
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
        <a href="index.php">Home</a>
        <a href="partijen.php">Partijen</a>
        <a href="nieuws.php">Nieuws</a>
        <a href="stellingen.php">Stellingen</a>
    </nav>

    <div class="flex-container">
        <?php
        $rows = $dbhandler->SelectPartijen();
        if ($rows) {
            foreach ($rows as $row) {
                echo "<div class='flex-item'>";
                echo "<a href='" . $row["url"] . "' target='_blank'><img src='" . $row["logo"] . "' alt='" . $row["naam"] . " image' class='logo'></a>";
                echo "</div>";
            }
        } else {
            echo "<div>No data found</div>";
        }
        ?>
    </div>
        <?php require 'footer.php' ?>
</body>

</html>