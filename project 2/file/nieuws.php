<!DOCTYPE html>
<html lang="en">

<head>
  <?php require 'header.php' ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>stellingen</title>
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/nieuws.css">
  <link rel="stylesheet" href="../css/dark-mode.css">
  <script src="../js/project2.js" defer></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  require_once '../classes/dbhandler.php';
  $dbhandler = new dbhandler();
  ?>

  <nav>
    <a href="index.php">Home</a>
    <a href="partijen.php">Partijen</a>
    <a href="nieuws.php">Nieuws</a>
    <a href="stellingen.php">Stellingen</a>
  </nav>
  <div class="flex-container">
  <?php
  $rows = $dbhandler->SelectNieuws();
      if ($rows) {
    foreach ($rows as $row) {
        echo "<div class='flex-item'>";
        echo "<div class='news-item'>";
        echo "<h3>" . htmlspecialchars($row["titel"]) . "</h3>";
        echo "<form action='" . $row["url"] . "' target='_blank'>";
        echo "<button type='submit'>Meer informatie</button>";
        echo "</form>";
        echo "</div>";
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