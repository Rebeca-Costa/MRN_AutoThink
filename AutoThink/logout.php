<?php
session_start(); 

session_destroy();

// Redirecione para a página de login
header('Location: index.php');
exit();
?>
