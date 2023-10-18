<?php require("auth.php"); require("connect.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
fieldset
{
    border:2px solid black;
    -moz-border-radius:8px;
    -webkit-border-radius:8px;	
    border-radius:8px;	
}
</style>
<title>ABCDEPANPC : Fiche Intervention</title>
</head>

<body>
<?php 

$requete = mysql_query("SELECT * FROM interventions ORDER BY inter_id DESC LIMIT 1") or die('Erreur SQL !'.$requete.'<br>'.mysql_error());
$donnees = mysql_fetch_array($requete);

?>


<form name="imprim_inter"  onsubmit="window.print()">
 
   <fieldset>
   	<legend>FICHE D'INTERVENTION</legend> <!-- Titre du fieldset --> 
<table width="100%" border="0">
  <tr>
    <td width="50%">
    ABCDEPAN'PC<br />
    10 Avenue de la République<br />
    63118 CEBAZAT
    </td>
    <td>
    Le <?php echo date("d/m/Y", strtotime($donnees['inter_date'])); ?><br />
    Fiche n° <?php echo $donnees['inter_id']; ?><br />
    Intervenant : <?php echo $donnees['inter_intervenant']; ?>
    </td>
  </tr>
</table>
   </fieldset>
   <br /><br />
   
   
   <fieldset>
   	<legend>PERIPHERIQUE</legend>
<table width="100%" border="0">
  <tr>
    <td width="50%">
    Type matériel : <?php echo $donnees['inter_mat_type']; ?><br />
    Marque : <?php echo $donnees['inter_mat_nom']; ?><br />
    Modèle : <?php echo $donnees['inter_mat_modele']; ?><br />
    
    </td>
    <td>
    	<table width="100%" border="0">
 		 <tr>
    		<td width="50%">
            	<?php
	if ($donnees['inter_mat_chargeur'] == 1) { echo '<input type="checkbox" value="1" checked="checked" />Chargeur<br>';}
	else { echo '<input type="checkbox" value="1" />Chargeur<br>';}
	if ($donnees['inter_mat_sacoche'] == 1) { echo '<input type="checkbox" value="1" checked="checked" />Sacoche<br>';}
	else { echo '<input type="checkbox" value="1" />Sacoche<br>';}
	if ($donnees['inter_mat_souris'] == 1) { echo '<input type="checkbox" value="1" checked="checked" />Souris<br>';}
	else { echo '<input type="checkbox" value="1" />Souris<br>';}
	if ($donnees['inter_mat_sac'] == 1) { echo '<input type="checkbox" value="1" checked="checked" />Sac / Carton<br>';}
	else { echo '<input type="checkbox" value="1" />Sac / Carton<br>';}	
				?>
            </td>
    		<td>
           		<?php
	if ($donnees['inter_mat_hdd'] == 1) { echo '<input type="checkbox" value="1" checked="checked" />HDD / HDD Externe<br>';}
	else { echo '<input type="checkbox" value="1" />HDD / HDD Externe<br>';}
	if ($donnees['inter_mat_cle'] == 1) { echo '<input type="checkbox" value="1" checked="checked" />Clé USB<br>';}
	else { echo '<input type="checkbox" value="1" />Clé USB<br>';}
	if ($donnees['inter_mat_ecran'] == 1) { echo '<input type="checkbox" value="1" checked="checked" />Ecran<br>';}
	else { echo '<input type="checkbox" value="1" />Ecran<br>';}
	if ($donnees['inter_mat_cd'] == 1) { echo '<input type="checkbox" value="1" checked="checked" />CD/DVD<br>';}
	else { echo '<input type="checkbox" value="1" />CD/DVD<br>';}	
				?>
            </td>
  		</tr>
		</table>
    </td>
  </tr>
</table>   
    
   </fieldset>
   <br /><br />
   
 
   <fieldset>
   	<legend>INFORMATIONS</legend> <!-- Titre du fieldset --> 
<table width="100%" border="0">
  <tr>
    <td width="50%">
    Observations :<br />
    <br /><i>
    <?php echo $donnees['inter_info_obs']; ?></i>
    </td>
    <td>
    Mot de passe : <?php echo $donnees['inter_info_mdp']; ?><br /><br />
    Compte/mail : <?php echo $donnees['inter_info_compte']; ?><br />
    
    </td>
  </tr>
</table>
   </fieldset>
   <br /><br />
   

 
   <fieldset>
   	<legend>STATUS</legend> <!-- Titre du fieldset --> 
<table width="100%" border="0">
  <tr>
    <td width="50%">
    <?php 
	$typeStatue = "";
	if ($donnees['inter_status'] == 'cours') { $typeStatue = 'A faire'; }
 	if ($donnees['inter_status'] == 'sav') { $typeStatue = 'SAV'; }
	if ($donnees['inter_status'] == 'commande') { $typeStatue = 'Pièce commandée'; }
 	if ($donnees['inter_status'] == 'electro') { $typeStatue = 'Chez l\'électronicien'; }
	if ($donnees['inter_status'] == 'termine') { $typeStatue = 'Terminée'; }
  	if ($donnees['inter_status'] == 'livre') { $typeStatue = 'Livrée'; }	
	?>
    Etat intervention : <?php echo $typeStatue; ?><br /><br />
    Date de la commande : <?php echo date("d/m/Y", strtotime($donnees['inter_status_date'])); ?><br /><br />
    Commandée chez <?php echo $donnees['inter_status_gros']; ?><br />
    </td>
    <td>
    Matériel commandé : <?php echo $donnees['inter_status_piece']; ?><br /><br />
    Par : <?php echo $donnees['inter_status_qui']; ?><br /><br />
    Client prévenu : 
    <input type="checkbox" />&nbsp;&nbsp;OUI
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="checkbox" />&nbsp;&nbsp;NON
    </td>
  </tr>
</table>
   </fieldset>
   <br /><br />
   
   <fieldset>
   	<legend>REMARQUES/INSTRUCTIONS</legend> <!-- Titre du fieldset --> 
<table width="100%" border="0">
  <tr>
    <td width="50%">
    &nbsp;<br /><br />
    &nbsp;<br /><br />
    &nbsp;<br /><br />    
    </td>
  </tr>
</table>
   </fieldset>
   <br /><br />
   
   <center><input type="submit" value="Imprimer cette page" /></center>
   <br /><br />
   
</form>

<i style="font-size:9px">Le client certifie que le matériel ci-dessus indiqué n'a pas été ouvert ou modifié par du personnel non qualifié, et que ce matériel n'a subi aucun dommage pouvant annuler une garantie constructeur. Le client s'engage à fournir tout logiciel original, documentation, connectique, et accessoires, codes et mots de passes permettant à la société Abcdépan'pc de remettre son matériel en état de fonctionnement. La société Abcdépan'pc ne saurait être tenue pour responsable de retard en cas de manque ou d'erreur dans les éléments sus-cités ou, dans le cas d'un changement de pièce, d'un retard de livraison ou d'une rupture de stock d'un de ses fournisseurs. Abcdépan'pc ne saurait être tenue pour responsable des éventuelles pertes de données durant la réparation. En cas de réparation atelier, dès que le client a été prévenu, celui-ci s'engage à récupérer ou à demander la remise en place de son matériel dans les 6 mois suivant la date où il aura été prévenu. Passé ce délai, Abcdépan'pc ne pourrait être tenue responsable de l'éventuelle perte ou destruction du matériel. Les frais de livraison ou de retour du matériel restent à la charge du client. Toutes les prestations seront effectuées aux tarifs en vigueur, dont le client reconnait avoir pris connaissance. Si, suite à un devis de réparation refusé, le client ne souhaite pas récupérer son matériel, ou s'il ne souhaite pas, en cas de réparation effectuée, conserver ses anciennes pièces, Abcdépan'pc se réserve le droit de disposer du matériel de n'importe quelle façon. Le client reconnait avoir pris connaissance des conditions sus-mentionnées et  les accepte sans réserve.	</i>														
															
															
															

</body>
</html>