<?php 
session_start();
$_SESSION['current_question'] = 1;
$_SESSION['user_id'] = uniqid();

header("location: stemwijzer.php");
exit();
?>