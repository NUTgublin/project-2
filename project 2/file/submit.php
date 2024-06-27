<?php
session_start();
include '../classes/dbhandler.php';

// Maak een instantie van de dbhandler klasse
$db = new dbhandler();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['antwoord']) && isset($_POST['vraag_id'])) {
        // Haal gebruikersinformatie op (voorbeeld)
        $user_id = $_SESSION['gebruiker_id']; // Verondersteld dat gebruiker_id al is ingesteld bij sessie starten

        // Ontvang antwoord en vraag_id
        $antwoord = $_POST['antwoord'];
        $vraag_id = $_POST['vraag_id'];

        // Sla het antwoord van de gebruiker op
        $result = $db->insertUserAnswer($user_id, $vraag_id, $antwoord);

        if (!$result) {
            echo "Er is een fout opgetreden bij het opslaan van het antwoord.";
            exit();
        }

        // Verhoog de huidige vraag met 1
        $_SESSION['current_question']++;

        // Controleer of we alle vragen hebben doorlopen
        if ($_SESSION['current_question'] > 15) {
            header("Location: results.php");
        } else {
            header("Location: stemwijzer.php");
        }
        exit();
    } else {
        header("Location: stemwijzer.php");
        exit();
    }
} else {
    header("Location: stemwijzer.php");
    exit();
}
?>
