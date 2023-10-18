<?php 
require("auth.php"); require("connect.php");



//info général
$interID = $_POST['interId'];

//status
$status = $_POST['status'];

if ($_POST['status_date'] == "") {
	$date_status = "0000-00-00";
}
else {
	$date_status = $_POST['status_date'];	
}

$status_gros = $_POST['status_gros'];

$status_mat = utf8_decode($_POST['status_mat_com']);
$status_matiso = htmlentities($status_mat, ENT_QUOTES,'ISO-8859-15',true);

$status_qui = $_POST['status_qui'];


// Envoi données
$sql = "UPDATE interventions SET inter_status='$status', inter_status_date='$date_status', inter_status_gros='$status_gros', inter_status_piece='$status_mat', inter_status_qui='$status_qui' WHERE inter_id = '$interID'";

$requete = mysqli_query($conn, $sql);
if (!$requete)
 { echo "<center>Impossible de se connecter au serveur MySQL</center>"; 
   echo "\nPDO::errorInfo():\n";
   print_r($requete->errorInfo());}
   else
    { header ("Refresh: 2;URL=afaire.php"); echo "<center><p>La fiche d'intervention a bien &eacute;t&eacute; modifi&eacute;e. Redirection dans 2 secondes...</p></center>"; }

?>



