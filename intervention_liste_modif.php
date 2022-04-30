<?php require("auth.php"); require("connect.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Fiche Intervention</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<?php include 'menu.html'; ?> 
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">	
            	<p class="tagline"><b style="font-size:16px">FICHE EN COURS</b> </p>
              	<p>
                <!-- PC à faire -->
<?php 
        $requete = mysqli_query($conn, "SELECT COUNT(*) as NBafaire FROM interventions WHERE inter_status ='cours' ") or die('Erreur SQL !'.$requete.'<br>'.mysqli_error());
        $data=mysqli_fetch_assoc($requete);

		$requete2 = mysqli_query($conn, "SELECT COUNT(*) as NBattente FROM interventions WHERE inter_status ='sav' OR inter_status ='electro' OR inter_status ='commande' ") or die('Erreur SQL !'.$requete2.'<br>'.mysqli_error());
        $data2=mysqli_fetch_assoc($requete2);
        
        $requete3 = mysqli_query($conn, "SELECT COUNT(*) as NBtermine FROM interventions WHERE inter_status ='termine' ") or die('Erreur SQL !'.$requete.'<br>'.mysqli_error());
        $data3=mysqli_fetch_assoc($requete3);
?>

<center  style="color:#FFF; " >
    &nbsp;&nbsp;
    <a href="afaire.php" target="_self" style="color:#F90">A faire <?php echo $data['NBafaire']; ?></a>
    &nbsp;&nbsp;
    <a href="attente.php" target="_parent" style="color:#0CC">En attente <?php echo $data2['NBattente']; ?></a>
    &nbsp;&nbsp;
    <a href="termine.php" target="_parent" style="color:#F30">Terminé <?php echo $data3['NBtermine']; ?></a>
           <!-- fin -->  
</center>
                </p>
                
                <p>&nbsp;</p>
                <p align="center">---------------------------</p>
                <p>&nbsp;</p>
                
                <!-- fiche Intervention -->			
				<p class="tagline"><b style="font-size:16px">FICHE INTERVENTION: Modification</b></p>
              	<p> 
    <script type="text/javascript">
    function verification(){
	   
		
        if(document.formclients.nom.value == ""){           
           alert("Le champ NOM ne peut être vide.");
           document.formclients.nom.focus();
           return false;
        }
		return true;         
    }	
    </script>
    
<?php
$idFiche = $_GET['id'];
$numFiche = $_GET['num'];
$sql = mysqli_query($conn, "SELECT * FROM interventions WHERE inter_id = '$idFiche' ") or die('Erreur SQL !'.$sql.'<br>'.mysqli_error());
$req = mysqli_fetch_assoc($sql);

$clientID = $req['inter_cli_id'];
$sql_client = mysqli_query($conn, "SELECT * FROM clients WHERE cli_id = '$clientID'") or die('Erreur SQL !'.$sql_art.'<br>'.mysqli_error());

?>
<form name="formInter" id="formInter" method="post" action="intervention_liste_envoi.php" enctype="multipart/form-data" onSubmit="return verification2()">

<table  border="0" cellspacing="0" cellpadding="0" class="tab_client" align="center">
  <tr>
    <td width="100" class="client_td">Date *<br>(jj/mm/aaaa)</td>
    <td class="client_td2"><input type='date' name='info_date' size='20' value="<?php echo $req['inter_date']; ?>"></td>
  </tr>
  <tr>
    <td width="100" class="client_td">Intervenant *</td>
    <td width="350" class="client_td2"><SELECT name="intervenant" style="width:100px" >
    <OPTION VALUE="<?php echo $req['inter_intervenant']; ?>"><?php echo $req['inter_intervenant'];  ?></OPTION>    
    <OPTION VALUE="Nicolas">Nicolas</OPTION>
    <OPTION VALUE="Jeremy">Matthias</OPTION>
    <OPTION VALUE="Sandrine">Sandrine</OPTION>
    <OPTION VALUE="Autre">Autre</OPTION></SELECT></td>    
  </tr>
  <tr>
    <td width="100" class="client_td">Nom*</td>
    <td width="350" class="client_td2"><input type="text" name="nom" size="40" placeholder="sans accent" />
    <br>
    <button onclick="afficheClient(document.formInter.nom.value)" type="button">Rechercher</button>
    &nbsp;&nbsp;
    <SELECT name="client" id="clientID" style="width:240px" >
<?php 
	 while($nb_cli = mysqli_fetch_assoc($sql_client)) {
	  echo '<OPTION VALUE="' .$nb_cli['cli_id']. '">' .htmlentities($nb_cli['cli_nom'], ENT_QUOTES,'ISO-8859-15',true). ' | ' .$nb_cli['cli_tel1']. ' | ' .$nb_cli['cli_tel2']. ' | ' .$nb_cli['cli_tel3']. '</OPTION>';
	 }
?>

</SELECT>
    
    </td>    
  </tr>
  <tr>
    <td class="client_td"></td>
    <td class="client_td2"><b align="center">-----------------------------------------------------------------------</b>
    <br>MATERIEL<br></td>   
  </tr>
  <tr>
    <td width="100" class="client_td">Type *</td>
    <td width="350" class="client_td2">
    <?php
  $typeMat = "";
  if ($req['inter_mat_type'] == 'fixe') { $typeMat = 'Fixe/Tour'; }
  if ($req['inter_mat_type'] == 'portable') { $typeMat = 'PC Portable'; }
  if ($req['inter_mat_type'] == 'tablette') { $typeMat = 'Tablette'; }
  if ($req['inter_mat_type'] == 'imprimante') { $typeMat = 'Imprimante'; }
  if ($req['inter_mat_type'] == 'aio') { $typeMat = 'All in One'; }
  if ($req['inter_mat_type'] == 'autre') { $typeMat = 'Autre'; }
  	?>
    
    <SELECT name="type_mat" style="width:150px" >
    <OPTION VALUE="<?php echo $req['inter_mat_type'];  ?>"><?php echo $typeMat;  ?></OPTION>
    <OPTION VALUE="">---------</OPTION>    
    <OPTION VALUE="fixe">Fixe/Tour</OPTION>
    <OPTION VALUE="portable">PC Portable</OPTION>
    <OPTION VALUE="tablette">Tablette</OPTION>
    <OPTION VALUE="imprimante">Imprimante</OPTION>
    <OPTION VALUE="aio">All in One</OPTION>
    <OPTION VALUE="autre">Autre</OPTION></SELECT></td>    
  </tr>
  <tr>
    <td class="client_td">Marque *</td>
    <td class="client_td2"><input type="text" name="marque" size="20" placeholder="Nom" value="<?php echo $req['inter_mat_nom']; ?>" />&nbsp;&nbsp;&nbsp;<input type="text" name="modele" size="20" placeholder="Modèle" value="<?php echo $req['inter_mat_modele']; ?>" /></td>   
  </tr>
  <tr>
    <td class="client_td">Périphérique</td>
    <td class="client_td2">
    		<table width="100%" border="0">
  				<tr>
    				<td width="40%">
	<?php  
  if ($req['inter_mat_chargeur'] == '1') { echo '<input type="checkbox" name="periph1"  checked />Chargeur&nbsp;&nbsp;&nbsp;<br>'; }
  else { echo '<input type="checkbox" name="periph1" />Chargeur&nbsp;&nbsp;&nbsp;<br>'; }
  if ($req['inter_mat_sacoche'] == '1') { echo '<input type="checkbox" name="periph2"  checked />Sacoche&nbsp;&nbsp;&nbsp;<br>'; }
  else { echo '<input type="checkbox" name="periph2" />Sacoche&nbsp;&nbsp;&nbsp;<br>'; }
  if ($req['inter_mat_souris'] == '1') { echo '<input type="checkbox" name="periph3"  checked />Souris&nbsp;&nbsp;&nbsp;<br>'; }
  else { echo '<input type="checkbox" name="periph3" />Souris&nbsp;&nbsp;&nbsp;<br>'; }
  if ($req['inter_mat_sac'] == '1') { echo '<input type="checkbox" name="periph4" value="chargeur" checked />Sac / carton&nbsp;&nbsp;&nbsp;<br>'; }
  else { echo '<input type="checkbox" name="periph4" />Sac / carton&nbsp;&nbsp;&nbsp;<br>'; }
  
  echo "</td><td>";
  
  if ($req['inter_mat_hdd'] == '1') { echo '<input type="checkbox" name="periph5" value="chargeur" checked />HDD / HDD Externe&nbsp;&nbsp;&nbsp;<br>'; }
  else { echo '<input type="checkbox" name="periph5" />HDD / HDD Externe&nbsp;&nbsp;&nbsp;<br>'; }
  if ($req['inter_mat_cle'] == '1') { echo '<input type="checkbox" name="periph6" value="chargeur" checked />Clé USB &nbsp;&nbsp;&nbsp;<br>'; }
  else { echo '<input type="checkbox" name="periph6" />Clé USB &nbsp;&nbsp;&nbsp;<br>'; }
  if ($req['inter_mat_ecran'] == '1') { echo '<input type="checkbox" name="periph7" value="chargeur" checked />Ecran &nbsp;&nbsp;&nbsp;<br>'; }
  else { echo '<input type="checkbox" name="periph7" />Ecran &nbsp;&nbsp;&nbsp;<br>'; }
  if ($req['inter_mat_cd'] == '1') { echo '<input type="checkbox" name="periph8" value="chargeur" checked />CD/DVD &nbsp;&nbsp;&nbsp;<br>'; }
  else { echo '<input type="checkbox" name="periph8" />CD/DVD &nbsp;&nbsp;&nbsp;<br>'; }
    	?>             
                  </td>
  				</tr>
			</table>    
    </td>   
  </tr>
  <tr>
    <td class="client_td"></td>
    <td class="client_td2"><b align="center">-----------------------------------------------------------------------</b>
    <br>INFORMATIONS SUPPLEMENTAIRES<br></td>   
  </tr>
  <tr>
    <td class="client_td">Mot de passe</td>
    <td class="client_td2"><input type="text" name="mdp" size="20" value="<?php echo $req['inter_info_mdp']; ?>" /></td>   
  </tr>
  <tr>
    <td class="client_td">Compte</td>
    <td class="client_td2"><textarea name="compte" rows="3" cols="40" placeholder="mail/licence/ect..."><?php echo $req['inter_info_compte']; ?></textarea> </td>    
  </tr>
  <tr>
    <td class="client_td">Observation*</td>
    <td class="client_td2"><textarea name="observations" rows="4" cols="40" placeholder="observations supplémentaires..."><?php echo $req['inter_info_obs']; ?></textarea></td>    
  </tr>
  <tr>
    <td class="client_td"></td>
    <td class="client_td2"><b align="center">-----------------------------------------------------------------------</b>
    <br>STATUS<br></td>   
  </tr>
  <tr>
    <td width="100" class="client_td">Status *</td>
    <td width="350" class="client_td2">
    <?php 
	$typeStatue = "";
	if ($req['inter_status'] == 'cours') { $typeStatue = 'A faire'; }
 	if ($req['inter_status'] == 'sav') { $typeStatue = 'SAV'; }
	if ($req['inter_status'] == 'commande') { $typeStatue = 'Pièce commandée'; }
 	if ($req['inter_status'] == 'electro') { $typeStatue = 'Chez l\'électronicien'; }
	if ($req['inter_status'] == 'termine') { $typeStatue = 'Terminée'; }
  	if ($req['inter_status'] == 'livre') { $typeStatue = 'Livrée'; }
	
	?>
    
    <SELECT name="status" style="width:150px" >
    <OPTION VALUE="<?php echo $req['inter_status']; ?>"><?php echo $typeStatue; ?></OPTION>
    <OPTION VALUE="">----------</OPTION>
	<OPTION VALUE="cours">A faire</OPTION>
    <OPTION VALUE="sav">SAV</OPTION>
    <OPTION VALUE="commande">Pièce commandée</OPTION>
    <OPTION VALUE="electro">Chez l'électronicien</OPTION>
    <OPTION VALUE="termine">Terminée</OPTION>
    <OPTION VALUE="livre">Livrée</OPTION></SELECT> 
    </td>    
  </tr>
  <tr>
    <td width="100" class="client_td">Date de commande</td>
    <td width="350" class="client_td2">	
    <input type="date" name="status_date" size="30" value="<?php echo $req['inter_status_date']; ?>"  />
    </td>    
  </tr>
  <tr>
    <td width="100" class="client_td">Chez qui</td>
    <td width="350" class="client_td2"><SELECT name="status_gros" style="width:150px" >
    <OPTION VALUE="<?php echo $req['inter_status_gros']; ?>"><?php echo $req['inter_status_gros']; ?></OPTION>
    <OPTION VALUE="">----------</OPTION>
	<OPTION VALUE="S2i">S2i</OPTION>
    <OPTION VALUE="Amazon">Amazon</OPTION>
    <OPTION VALUE="Pobix">Pobix</OPTION>
    <OPTION VALUE="Alexi">Alexi</OPTION>
    <OPTION VALUE="Dalle Express">Dalle Express</OPTION></SELECT>    
    </td>    
  </tr>
  <tr>
    <td width="100" class="client_td">Matériel commandé</td>
    <td width="350" class="client_td2">	
    <input type="text" name="status_mat_com" size="30" placeholder="pièce commandée" value="<?php echo htmlentities($req['inter_status_piece'], ENT_QUOTES,'ISO-8859-15',true); ?>" />
    </td>    
  </tr>
  <tr>
    <td width="100" class="client_td">Par qui</td>
    <td width="350" class="client_td2"><SELECT name="status_qui" style="width:100px" >
    <OPTION VALUE="<?php echo $req['inter_status_qui']; ?>"><?php echo $req['inter_status_qui']; ?></OPTION>
    <OPTION VALUE="">----------</OPTION>    
    <OPTION VALUE="Nicolas">Nicolas</OPTION>
    <OPTION VALUE="Jeremy">Matthias</OPTION>
    <OPTION VALUE="Sandrine">Sandrine</OPTION>
    <OPTION VALUE="Autre">Autre</OPTION></SELECT></td>    
  </tr>
</table>

		<div id="titre1">&nbsp;<input type="hidden" name="idInter" value="<?php echo $req['inter_id']; ?>" ><input type="hidden" name="numInter" value="<?php echo $numFiche; ?>" ></div><br>
        <div align="center"><input name='envoyer' type='submit' value='Modifier la fiche'></div>
				
</form>
                </p>
                <!-- fin fiche client -->
                
			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	<div class="container text-center">	
        
	</div>
	<!-- /Intro-->

	<footer id="footer" class="top-space">

		<?php include 'footer.html'; ?>

	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery-ui.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
    
   
</body>
</html>