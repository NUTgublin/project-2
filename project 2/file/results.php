<?php
session_start();
include '../classes/dbhandler.php';
include 'header.php';

// Maak een instantie van de dbhandler klasse
$db = new dbhandler();

$user_id = $_SESSION['gebruiker_id'];

// Haal de best passende partij op
$best_party = $db->getBestMatchingParty($user_id); // Deze functie moet worden gedefinieerd in dbhandler.php

// Haal alle antwoorden van de gebruiker op
$answers = $db->getUserAnswers($user_id); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Resultaten</title>
    <link rel="stylesheet" href="../css/stemwijzer.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/project2.js" defer></script>
    <link rel="stylesheet" href="../css/dark-mode.css">
</head>

<body>

   
<h3>Uw Antwoorden</h3>
    <ul>
        <?php foreach ($answers as $answer): ?>
            <li>Stelling <?php echo htmlspecialchars($answer['vraag_id']); ?>:
                <?php echo htmlspecialchars($answer['antwoord']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <h3>De partij die het beste bij uw antwoorden past:</h3>
    <p><?php echo htmlspecialchars($best_party); ?></p>
</body>

</html>