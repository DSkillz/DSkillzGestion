<?php 
require('connect.php'); 

$civilite = $_POST['civ'];
$nom = $_POST['nom'];
$tel01 = $_POST['tel1'];
$tel02 = $_POST['tel2'];
$tel03 = $_POST['tel3'];
$adresse = $_POST['adresse'];
$cp = $_POST['cp'];
$ville = $_POST['ville'];



// Envoi données

$sql_envoi1 = "INSERT INTO clients(cli_id, cli_civ, cli_nom, cli_tel1, cli_tel2, cli_tel3, cli_adr, cli_cp, cli_ville) 
VALUES('', '$civilite','$nom','$tel01','$tel02','$tel03','$adresse','$cp','$ville')";
    
$req = mysqli_query($conn, $sql_envoi1);
if (!$req)
 { echo "<center>Impossible de se connecter au serveur MySQL</center>"; }
   else
    {  header ("Refresh: 1;URL=intervention.php"); echo "<center><p>La fiche T&eacute;l&eacute;phone a bien &eacute;t&eacute; enregistr&eacute;e. Redirection dans 1 secondes...</p></center>";  }


?>
