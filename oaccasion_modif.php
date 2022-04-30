<?php 
require("auth.php"); require("connect.php");



//info général
$occasID = $_POST['occasId'];
$type = $_POST['type'];
$description = utf8_decode($_POST['description']);
$descriptioniso = htmlentities($description, ENT_QUOTES,'ISO-8859-15',true);
$prix = $_POST['prix'];
$status = $_POST['status'];
if ($_POST['date'] == "") {
	$date_status = "0000-00-00";
}
else {
	$date_status = $_POST['date'];	
}




// Envoi données
$sql = "UPDATE occasions SET occas_type='$type', occas_txt='$descriptioniso', occas_prix='$prix', occas_status='$status', occas_date='$date_status' WHERE occas_id = '$occasID'";

$requete = mysqli_query($conn, $sql);
if (!$requete)
 { echo "<center>Impossible de se connecter au serveur MySQL</center>"; 
   echo "\nPDO::errorInfo():\n";
   print_r($requete->errorInfo());}
   else
    { header ("Refresh: 2;URL=occasion_liste.php"); echo "<center><p>La fiche occasion a bien &eacute;t&eacute; modifi&eacute;e. Redirection dans 2 secondes...</p></center>"; }

?>



