<?php 
session_start(); 
$_SESSION['flash']['success'] = "Vous êtes maintenant déconnecté !";
session_destroy();
header('Location: connexion.php');
die();

?>
