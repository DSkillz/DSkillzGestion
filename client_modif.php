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
    </center>
           <!-- fin -->  
</center>
                </p>
                
                <p>&nbsp;</p>
                <p align="center">---------------------------</p>
                <p>&nbsp;</p>
                
            	<!-- fiche Client -->
                
                <p>

<?php
$idFiche = $_GET['id'];
$sql_client = mysqli_query($conn, "SELECT * FROM clients WHERE cli_id='$idFiche' ") or die('Erreur SQL !'.$sql_art.'<br>'.mysqli_error());
$req = mysqli_fetch_assoc($sql_client);
?>               
           			
				<p class="tagline"><b style="font-size:16px">FICHE CLIENT: Modification</b> </p>
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
<form name="formclients" id="formclients" method="post" action="client_modif_envoi.php" enctype="multipart/form-data" onSubmit="return verification()">
                <table  border="0" cellspacing="0" cellpadding="0" class="tab_client" align="center">
  <tr>
    <td width="90" class="client_td">Civilité</td>
    <td width="350" class="client_td2"><SELECT name="civ" style="width:100px" >
    <OPTION VALUE="<?php echo $req['cli_civ']; ?>"><?php echo $req['cli_civ']; ?></OPTION>
    <OPTION VALUE="">----------</OPTION>    
    <OPTION VALUE="Mme">Mme</OPTION>
    <OPTION VALUE="Mr">Mr</OPTION>
    <OPTION VALUE="Mlle">Mlle</OPTION>
    <OPTION VALUE="Ste">Ste</OPTION></SELECT></td>    
  </tr>
  <tr>
    <td width="90" class="client_td">Nom*</td>
    <td width="350" class="client_td2"><input type="text" name="nom" size="40" value="<?php echo $req['cli_nom']; ?>" /></td>    
  </tr>
  <tr>
    <td class="client_td">Téléphone *</td>
    <td class="client_td2"><input type="text" name="tel1" size="40" value="<?php echo $req['cli_tel1']; ?>" /></td>   
  </tr>
  <tr>
    <td class="client_td">Téléphone 2</td>
    <td class="client_td2"><input type="text" name="tel2" size="40" value="<?php echo $req['cli_tel2']; ?>" /></td>   
  </tr>
  <tr>
    <td class="client_td">E-mail</td>
    <td class="client_td2"><input type="text" name="tel3" size="40" value="<?php echo $req['cli_tel3']; ?>" /></td>   
  </tr>
  <tr>
    <td class="client_td">Adresse</td>
    <td class="client_td2"> <input type="text" name="adresse" size="40" value="<?php echo $req['cli_adr']; ?>" /></td>    
  </tr>
  <tr>
    <td class="client_td">CP/Ville</td>
    <td class="client_td2"><input type="text" name="cp" size="10" value="<?php echo $req['cli_cp']; ?>"  />&nbsp;&nbsp;<input type="text" name="ville" size="27" value="<?php echo $req['cli_ville']; ?>" /></td>    
  </tr>
</table>

		<div id="titre1">&nbsp;</div>
        <div align="center"><input name='envoyer' type='submit' value='Modifier'></div>
				<input type="hidden" name='cliID' value='<?php echo $req['cli_id']; ?>'>
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