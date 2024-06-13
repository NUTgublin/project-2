<?php
session_start();
include '../classes/dbhandler.php';
$db = new dbhandler();

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
    <h3><?php echo htmlspecialchars($question['title']); ?></h3>
    <p><?php echo htmlspecialchars($question['vraag']); ?></p>
    <form method="post" action="submit.php">
        <input type="hidden" name="vraag_id" value="<?php echo $current_question; ?>">
        <button type="submit" name="antwoord" value="eens">Eens</button>
        <button type="submit" name="antwoord" value="oneens">Oneens</button>
    </form>
</body>

</html>