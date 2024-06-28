<?php
session_start();
require_once '../classes/dbhandler.php';


// Maak een instantie van de dbhandler klasse
$db = new dbhandler();

// Haal de huidige vraag op basis van sessie of stel deze in als 1
$current_question = $_SESSION['current_question'] ?? 1;

// Haal de totale aantal vragen op
$total_questions = 15; // Stel het totale aantal vragen in

// Haal de stelling op voor de huidige vraag
$question = $db->getQuestionById($current_question); // Deze functie moet worden gedefinieerd in dbhandler.php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stemwijzer</title>
    <link rel="stylesheet" href="../css/stemwijzer.css">
    <link rel="stylesheet" href="../css/dark-mode.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/project2.js" defer></script>
</head>

<body>
    
<?php require 'header.php' ?>
    <div class="flex-container">
        <h3><?php echo htmlspecialchars($question['title']); ?></h3>
        <p><?php echo htmlspecialchars($question['vraag']); ?></p>
        <form method="post" action="submit.php">
            <input type="hidden" name="vraag_id" value="<?php echo $current_question; ?>">
            <button class="StemKnop" type="submit" name="antwoord" value="eens">Eens</button>
            <button class="StemKnop2" type="submit" name="antwoord" value="oneens">Oneens</button>
        </form>
    </div>
    
</body>

</html>