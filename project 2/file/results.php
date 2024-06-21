<?php
session_start();
include '../classes/dbhandler.php';
$db = new dbhandler();

$user_id = $_SESSION['gebruiker_id'];

// Haal de best passende partij op
$best_party = $db->getBestMatchingParty($user_id);

// Haal alle antwoorden van de gebruiker op
try {
    $pdo = new PDO($db->dataSource, $db->username, $db->password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $pdo->prepare("SELECT stelling_id, antwoord FROM gebruiker_antwoorden WHERE gebruiker_id = :gebruiker_id");
    $statement->bindParam(':gebruiker_id', $user_id, PDO::PARAM_STR);
    $statement->execute();
    $answers = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    echo "Error: " . $exception->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultaten</title>
    <link rel="stylesheet" href="../css/stemwijzer.css">
</head>

<body>
    <h3>Uw Antwoorden</h3>
    <ul>
        <?php foreach ($answers as $answer): ?>
            <li>Stelling <?php echo htmlspecialchars($answer['stelling_id']); ?>:
                <?php echo htmlspecialchars($answer['antwoord']); ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>De partij die het beste bij uw antwoorden past:</h3>
    <p><?php echo htmlspecialchars($best_party); ?></p>
</body>

</html>