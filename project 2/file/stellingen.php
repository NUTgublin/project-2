<?php
include_once "../classes/dbhandler.php";
$dbhandler = new dbhandler();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'header.php' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stellingen</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/stellingen.css">
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
    <nav>
        <a href="index.php">Home</a>
        <a href="partijen.php">Partijen</a>
        <a href="nieuws.php">Nieuws</a>
        <a href="stellingen.php">Stellingen</a>
    </nav>
    <div class="DivStelling">
        <?php
        $rows = $dbhandler->SelectStellingen();
        foreach ($rows as $row) {
        ?>
        <div class="stellingen">
            <h2 class="title"><?= $row['title']?></h2>
            <p class="vraag"><?= $row['vraag']?></p>
        </div>
        <?php } ?>
    </div>
    <script>
    document.querySelectorAll('.stellingen .title').forEach(title => {
        title.addEventListener('click', () => {
            const vraag = title.nextElementSibling;
            vraag.style.display = vraag.style.display == 'none' || vraag.style.display == '' ? 'block' : 'none' ;
            
        });
    });
</script> 

    <?php require 'footer.php' ?>
</body>
</html>
