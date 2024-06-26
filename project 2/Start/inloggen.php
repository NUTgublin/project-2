<?php
include '../classes/dbhandler.php';
session_start();

$db = new dbhandler();
$registration_success = isset($_GET['registered']) && $_GET['registered'] === 'true';
if (isset($_POST['gebruikersnaam']) && isset($_POST['wachtwoord'])) {
    $username = $_POST['gebruikersnaam'];
    $password = $_POST['wachtwoord'];

    $user = $db->getUserByUsername($username);

    if ($user && $password === $user['password']) {
        session_unset();
        session_destroy();
        session_start();

        $_SESSION['ingelogd_als'] = $user['user'];
        session_regenerate_id();
        header("Location: ../file/index.php");
        exit();
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
        <?php if ($registration_success) : ?>
            <p style="color:green;">Registratie succesvol! U kunt nu inloggen.</p>
        <?php endif; ?>
        <?php if (isset($login_error)) : ?>
            <p style="color:red;"><?php echo htmlspecialchars($login_error); ?></p>
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
                <input type="submit" value="Inloggen">
            </div>
        </form>
        Heeft u nog geen account? <a href="../file/registreer.php">Registreer</a>
    </div>
</body>
</html>
