<!DOCTYPE html>
<html lang="en">
<?php require 'header.php' ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neutraal Kieslab</title>
  <link rel="stylesheet" href="../css/index.css">
  
  <script src="project2.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
  <nav>
    <a href="index.php">home</a>
    <a href="partijen.php">partijen</a>
    <a href="nieuws.php">nieuws</a>
    <a href="stellingen.php">stellingen</a>
  </nav>


  <div class="DivContainer">
    
    <div class="fototest">
         <img id="imgPar" src="../Logos/stemming.jpg" alt="parlament">
    </div>
    
    <div class="titel">
        <h1>Doe de StemWijzer</h1>
        
    </div>
    <button id="btStartWijzer">Start</button>
  </div>


  <?php require 'footer.php' ?>

</body>

</html>