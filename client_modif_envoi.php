<?php 
require('connect.php'); 

$idCli = $_POST['cliID'];
$civilite = $_POST['civ'];
$nom = utf8_decode($_POST['nom']);
$nomiso = htmlentities($nom, ENT_QUOTES,'ISO-8859-15',true);
$tel01 = $_POST['tel1'];
$tel02 = $_POST['tel2'];
$mail = utf8_decode($_POST['tel3']);
$mailiso = htmlentities($mail, ENT_QUOTES,'ISO-8859-15',true);
$adresse = utf8_decode($_POST['adresse']);
$adresseiso = htmlentities($adresse, ENT_QUOTES,'ISO-8859-15',true);
$cp = $_POST['cp'];
$ville = utf8_decode($_POST['ville']);
$villeiso = htmlentities($ville, ENT_QUOTES,'ISO-8859-15',true);

// Envoi données

$sql_envoi = "UPDATE clients SET cli_civ='$civilite', cli_nom='$nomiso', cli_tel1='$tel01', cli_tel2='$tel02', cli_tel3='$mail', cli_adr='$adresseiso', cli_cp='$cp', cli_ville='$ville'  WHERE cli_id = '$idCli'";
    
$req = mysqli_query($conn, $sql_envoi);
if (!$req)
 { echo "<center>Impossible de se connecter au serveur MySQL</center>"; }
   else
    {  header ("Refresh: 1;URL=client.php"); echo "<center><p><img src='images/loading.gif' width='50px'  /></p><p>La fiche client a bien &eacute;t&eacute; modifi&eacute;e. Redirection dans 1 secondes...</p></center>";  }


?>