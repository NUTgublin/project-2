<?php
$gebruikers = [
    ['user' => 'Remi', 'password' => '123']
];

session_start();

if (isset($_POST['gebruikersnaam']) && isset($_POST['wachtwoord'])) {
    
    $username = $_POST['gebruikersnaam'];
    $password = $_POST['wachtwoord'];
    
    $login_success = false;

    foreach ($gebruikers as $gebruiker) {
        if ($gebruiker['user'] == $username && $gebruiker['password'] == $password) {
            // Bestaat
            $_SESSION['ingelogd_als'] = $gebruiker['user'];
            $login_success = true;
            break;
        }
    }

    if ($login_success) {
      
        header("Location: ../file/index.php");
        exit("../file/index.php");
    } else {
        $login_error = "Onjuiste gebruikersnaam of wachtwoord.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inloggen.css">
    <title>Inloggen</title>
</head>
<body>
    <div class="login-container">
        <h1>Inloggen</h1>
        <?php
        if (isset($login_error)) {
            echo "<p style='color:red;'>$login_error</p>";
        }
        ?>
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
                <input type="submit" value="Inloggen">
            </div>
        </form>
    </div>
</body>
</html>
