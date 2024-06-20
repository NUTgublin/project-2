<?php
session_start();
include '../classes/dbhandler.php';
$db = new dbhandler();

$user_id = $_SESSION['gebruiker_id'] ?? null;

if ($user_id) {
    try {
        $pdo = new PDO($db->dataSource, $db->username, $db->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $pdo->prepare("DELETE FROM gebruiker_antwoorden WHERE gebruiker_id = :gebruiker_id");
        $statement->bindParam(':gebruiker_id', $user_id, PDO::PARAM_STR);
        $statement->execute();
    } catch (PDOException $exception) {
        echo "Error: " . $exception->getMessage();
        exit();
    }
}

$_SESSION['current_question'] = 1;
$_SESSION['gebruiker_id'] = uniqid();

header("Location: stemwijzer.php");
exit();
?>
