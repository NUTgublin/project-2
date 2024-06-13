<?php
session_start();
include '../classes/dbhandler.php';
$db = new dbhandler();

$user_id = $_SESSION['gebruiker_id'];

// Haal alle antwoorden van de gebruiker op
try {
    $pdo = new PDO($db->dataSource, $db->username, $db->password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $pdo->prepare("SELECT antwoord FROM gebruiker_antwoorden WHERE gebruiker_id = :gebruiker_id");
    $statement->bindParam(':gebruiker_id', $gebruiker_id, PDO::PARAM_STR);
    $statement->execute();
    $answers = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    echo "Error: " . $exception->getMessage();
    exit();
}

// Toon de antwoorden of verwerk de resultaten om een aanbeveling te doen
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
            <li>Vraag <?php echo htmlspecialchars($answer['gebruiker_id']); ?>:
                <?php echo htmlspecialchars($answer['antwoord']); ?></li>
        <?php endforeach; ?>
    </ul>
    <!-- Voeg hier logica toe om de partij te bepalen die het beste overeenkomt met de antwoorden -->
</body>

</html>