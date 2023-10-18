<?php 
require("auth.php"); require("connect.php");



//info général
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
$sql_envoi = "INSERT INTO blocnote(bn_id, bn_nom, bn_txt, bn_date) 
VALUES('', '$titre','$descriptioniso','$date_status')";



$requete = mysqli_query($conn, $sql_envoi);
if (!$requete)
{ echo "<center>Impossible de se connecter au serveur MySQL</center>"; 
  echo "\nPDO::errorInfo():\n";
  print_r($requete->errorInfo());}
   else
    { header ("Refresh: 1;URL=occasion.php"); echo "<center><p>La fiche bloc note a bien &eacute;t&eacute; enregistr&eacute;e. Redirection dans 2 secondes...</p></center>//"; }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
</body>
</html>