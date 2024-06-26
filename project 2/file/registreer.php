<?php
require_once '../classes/dbhandler.php';
$dbHandler = new dbHandler();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['gebruikersnaam'];
    $password = $_POST['wachtwoord'];

    $result = $dbHandler->createUser($username, $password);
    if ($result) {
        $success_message = "Account succesvol aangemaakt!";
        // Redirect the user to a different page after successful registration
        header("Location: ../Start/inloggen.php?registered=true");
        exit();
    } else {
        $success_message = "Er is een fout opgetreden bij het aanmaken van het account.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inloggen.css">
    <title>Registreren</title>
</head>
<body>
    <div class="login-container">
        <h1>Registreren</h1>
        <?php if (!empty($success_message)) : ?>
            <p style="color:green;"><?php echo htmlspecialchars($success_message); ?></p>
        <?php endif; ?>
        
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="gebruikersnaam" required>
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="wachtwoord" required>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Registreren">
            </div>
        </form>
        Heeft u al een account? <a href="../Start/inloggen.php">Inloggen</a>
    </div>
</body>
</html>