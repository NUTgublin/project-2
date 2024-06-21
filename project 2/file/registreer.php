<?php
require_once '../classes/dbhandler.php';
$dbHandler = new dbHandler();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['gebruikersnaam'];
    $password = $_POST['wachtwoord'];

    $result = $dbHandler->createUser($username, $password);
     echo "<meta http-equiv='refresh' content='0'";
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