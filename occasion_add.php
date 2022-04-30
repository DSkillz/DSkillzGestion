<?php 
require("auth.php"); require("connect.php");



//info général
$type = $_POST['type'];
$description = utf8_decode($_POST['description']);
$descriptioniso = htmlentities($description, ENT_QUOTES,'ISO-8859-15',true);
$prix = $_POST['prix'];
$status = $_POST['status'];

// Envoi données
$sql_envoi = "INSERT INTO occasions(occas_id, occas_type, occas_txt, occas_prix, occas_status) 
VALUES('','$type','$descriptioniso','$prix','$status')";

$requete = mysqli_query($conn, $sql_envoi);
if (!$requete)
{ echo "<center>Impossible de se connecter au serveur MySQL</center>"; 
  echo "\nPDO::errorInfo():\n";
  print_r($requete->errorInfo());}
   else
    { header ("Refresh: 1;URL=occasion.php"); echo "<center><p>La fiche occasion a bien &eacute;t&eacute; enregistr&eacute;e. Redirection dans 2 secondes...</p></center>//"; }

?>

