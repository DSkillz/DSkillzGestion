<?php
session_start();
if (!isset($_SESSION['login']) && !isset($_SESSION['pwd'])){
  //si la variable de session n'existe pas
  //on redirige l'utilisateur vers le formulaire d'identification
  header('Location: ./index.php');
  //on arrête l'exécution
  exit();}
?>
