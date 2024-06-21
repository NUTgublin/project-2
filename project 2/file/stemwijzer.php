<?php
session_start();
include '../classes/dbhandler.php';
$db = new dbhandler();
include 'header.php';

if (!isset($_SESSION['current_question'])) {
    header("Location: start.php");
    exit();
}

$current_question = $_SESSION['current_question'];
$questions = $db->SelectStellingen();
$question = $questions[$current_question - 1];

if (!$question) {
    echo "Geen vragen gevonden.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stemwijzer</title>
    <link rel="stylesheet" href="../css/stemwijzer.css">
</head>

<body>
<nav>
    <a href="index.php">home</a>
    <a href="partijen.php">partijen</a>
    <a href="nieuws.php">nieuws</a>
    <a href="stellingen.php">stellingen</a>
  </nav>
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