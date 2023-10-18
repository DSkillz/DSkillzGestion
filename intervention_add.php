<?php 
require("auth.php"); require("connect.php");



//info général
list($jour,$mois,$annee) = explode('/',$_POST['info_date']);
$date = $annee.'-'.$mois.'-'.$jour;
$intervenant = $_POST['intervenant'];
$client = $_POST['client'];

//Matériels
$type_mat = $_POST['type_mat'];
$marque = $_POST['marque'];
$marqueiso = htmlentities($marque, ENT_QUOTES,'ISO-8859-15',true);
$model = $_POST['modele'];
$modeliso = htmlentities($model, ENT_QUOTES,'ISO-8859-15',true);
$intervenant = $_POST['intervenant'];

//périphérique
$chargeur = 0; if (isset($_POST['periph1'])) {$chargeur = 1;}
$sacoche = 0; if (isset($_POST['periph2'])) {$sacoche = 1;}
$souris = 0; if (isset($_POST['periph3'])) {$souris = 1;} 
$sac = 0; if (isset($_POST['periph4'])) {$sac = 1;} 
$hdd = 0; if (isset($_POST['periph5'])) {$hdd = 1;} 
$cle_usb = 0; if (isset($_POST['periph6'])) {$cle_usb = 1;} 
$ecran = 0; if (isset($_POST['periph7'])) {$ecran = 1;} 
$dvd = 0; if (isset($_POST['periph8'])) {$dvd = 1;} 

//infos supplémentaires
$mdp = utf8_decode($_POST['mdp']);
$mdpiso = htmlentities($mdp, ENT_QUOTES,'ISO-8859-15',true);
 
$compte = utf8_decode($_POST['compte']);
$compteiso = htmlentities($compte, ENT_QUOTES,'ISO-8859-15',true);

$observations = utf8_decode($_POST['observations']);
$observationsiso = htmlentities($observations, ENT_QUOTES,'ISO-8859-15',true);

//status
$status = $_POST['status'];

echo $_POST['status_date'];
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
//$nom2 =  utf8_decode($_POST['nom']); 
//$nom = htmlentities($nom2, ENT_QUOTES,'ISO-8859-15',true);

// Envoi données
$sql_envoi = "INSERT INTO interventions(inter_id, inter_date, inter_cli_id, inter_intervenant, inter_mat_type, inter_mat_nom, inter_mat_modele, inter_mat_chargeur, inter_mat_sacoche, inter_mat_souris, inter_mat_sac, inter_mat_hdd, inter_mat_cle, inter_mat_ecran, inter_mat_cd, inter_info_mdp, inter_info_compte, inter_info_obs, inter_status, inter_status_date, inter_status_gros, inter_status_piece, inter_status_qui ) 
VALUES('','$date','$client','$intervenant','$type_mat','$marqueiso','$modeliso','$chargeur','$sacoche','$souris','$sac','$hdd','$cle_usb','$ecran','$dvd','$mdpiso','$compteiso','$observationsiso','$status', '$date_status', '$status_gros', '$status_matiso', '$status_qui')";

$requete = mysqli_query($conn, $sql_envoi);
if (!$requete)
{ echo "<center>Impossible de se connecter au serveur MySQL</center>"; 
  echo "\nPDO::errorInfo():\n";
  print_r($requete->errorInfo());}
   else
    { header ("Refresh: 1;URL=intervention_imprim.php"); echo "<center><p>La fiche d'intervention a bien &eacute;t&eacute; enregistr&eacute;e. Redirection dans 2 secondes...</p></center>//"; }

?>

