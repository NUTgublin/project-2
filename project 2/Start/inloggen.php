<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inloggen.css">
    <title>Ínloggen</title>
</head>
<body>
    <div class="login-container">
        <h1>Inloggen</h1>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="gebruikersnaam" required>
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="wachtwoord" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Inloggen">
            </div>
        </form>
    </div>
</body>
</html>