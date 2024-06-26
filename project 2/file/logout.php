<?php
session_start();
session_unset();

// Destroy the session
session_destroy();

header("Location: ../Start/inloggen.php");
exit();
