<?php 
require("auth.php"); require("connect.php");



//info général
$bnID = $_POST['bnID'];
$titre = $_POST['titre'];
$description = utf8_decode($_POST['description']);
$descriptioniso = htmlentities($description, ENT_QUOTES,'ISO-8859-15',true);
if ($_POST['date'] == "") {
	$date_status = "0000-00-00";
}
else {
	$date_status = $_POST['date'];	
}




// Envoi données
$sql = "UPDATE blocnote SET bn_nom='$titre', bn_txt='$descriptioniso', bn_date='$date_status' WHERE bn_id = '$bnID'";

$requete = mysqli_query($conn, $sql);
if (!$requete)
 { echo "<center>Impossible de se connecter au serveur MySQL</center>"; 
   echo "\nPDO::errorInfo():\n";
   print_r($requete->errorInfo());}
   else
    { header ("Refresh: 2;URL=blocnote_liste.php"); echo "<center><p>La fiche bloc a bien &eacute;t&eacute; modifi&eacute;e. Redirection dans 2 secondes...</p></center>"; }

?>



