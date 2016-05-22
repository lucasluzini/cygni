<?php require "../acoes/verifica.php"; ?>
<?php 
// Inicia sessões, para assim poder destruí-las 
session_start(); 
session_destroy(); 

header("Location: ../login.php"); 
?>

