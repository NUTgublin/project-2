<?php
session_start();
include '../classes/dbhandler.php';
$db = new dbhandler();

if (!isset($_POST['antwoord'])) {
    header("Location: stemwijzer.php");
    exit();
}

$user_id = $_SESSION['gebruiker_id'];
$antwoord = $_POST['antwoord'];

try {
    $pdo = new PDO($db->dataSource, $db->username, $db->password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $pdo->prepare("INSERT INTO gebruiker_antwoorden (gebruiker_id, antwoord) VALUES (:gebruiker_id, :antwoord)");
    $statement->bindParam(':gebruiker_id', $user_id, PDO::PARAM_STR);
    $statement->bindParam(':antwoord', $antwoord, PDO::PARAM_STR);
    $statement->execute();

    // Ga naar de volgende vraag
    $_SESSION['current_question']++;

    // Check of er nog meer vragen zijn (stel dat er 15 vragen zijn)
    if ($_SESSION['current_question'] > 15) {
        header("Location: results.php"); // Ga naar resultatenpagina
    } else {
        header("Location: stemwijzer.php");
    }
    exit();
} catch (PDOException $exception) {
    echo "Error: " . $exception->getMessage();
    exit();
}
?>