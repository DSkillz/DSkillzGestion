<?php
require('connect.php');

$civ = $_POST['civ'];
$nom = $_POST['nom'];
$tel01 = $_POST['tel1'];
$tel02 = $_POST['tel2'];
$contact = $_POST['contact'];
$adresse = $_POST['adresse'];
$cp = $_POST['cp'];
$ville = $_POST['ville'];

echo $civ;

// Envoi donn�es

$sql_envoi1 = "INSERT INTO clients(cli_id, cli_civ, cli_nom, cli_tel1, cli_tel2, cli_contact, cli_adr, cli_cp, cli_ville) VALUES('', '$civ','$nom','$tel01','$tel02','$contact','$adresse','$cp','$ville')";



if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}

// Perform a query, check for error
if (!$conn -> query($sql_envoi1)) {
  echo("Error description: " . $conn -> error);
}