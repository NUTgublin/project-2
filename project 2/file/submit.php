<?php
session_start();
include '../classes/dbhandler.php';
$db = new dbhandler();

if (!isset($_POST['vraag_id']) || !isset($_POST['antwoord'])) {
    header("Location: question.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$vraag_id = $_POST['vraag_id'];
$antwoord = $_POST['antwoord'];

// Sla het antwoord op in de database
$pdo = $db->SelectStellingen();
if (!$pdo)
    die("Database connection failed");

try {
    $statement = $pdo->prepare("INSERT INTO user_answers (user_id, vraag_id, antwoord) VALUES (:user_id, :vraag_id, :antwoord)");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $statement->bindParam(':vraag_id', $vraag_id, PDO::PARAM_INT);
    $statement->bindParam(':antwoord', $antwoord, PDO::PARAM_STR);
    $statement->execute();
} catch (PDOException $exception) {
    echo "Error: " . $exception->getMessage();
    exit();
}

// Ga naar de volgende vraag
$_SESSION['current_question']++;

// Check of er nog meer vragen zijn (stel dat er 15 vragen zijn)
if ($_SESSION['current_question'] > 15) {
    header("Location: results.php"); // Ga naar resultatenpagina
} else {
    header("Location: question.php");
}
exit();
?>