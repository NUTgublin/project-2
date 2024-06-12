<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="project2.js"></script>
    <link rel="stylesheet" href="../css/stemwijzer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>stemwijzer</title>
</head>

<body>
    <?php
    session_start();
    include '../classes/dbhandler.php';
    $db = new dbhandler();

    if (!isset($_SESSION['current_question'])) {
        header("Location: start.php");
        exit();
    }

    $current_question = $_SESSION['current_question'];
    $question = $db->SelectAntwoorden($current_question);


    if (!$question) {
        echo "Geen vragen gevonden.";
        exit();
    }
    ?>

    <?php
    if (!$question || empty($question)) {
        echo "Geen vragen gevonden.";
        exit();
    }
    ?>

    <h3><?php echo htmlspecialchars($question[0]['title']); ?></h3>
    <p><?php echo htmlspecialchars($question[0]['vraag']); ?></p>
    <form method="post" action="submit.php">
        <input type="hidden" name="vraag_id" value="<?php echo $current_question; ?>">
        <button type="submit" name="antwoord" value="eens">Eens</button>
        <button type="submit" name="antwoord" value="oneens">Oneens</button>
    </form>

</body>

</html>