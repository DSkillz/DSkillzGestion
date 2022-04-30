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
                
            	<!-- fiche Client -->			
				<p class="tagline"><b style="font-size:16px">BLOC NOTE: Création</b> </p>
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
<form name="formoccas" id="formoccas" method="post" action="blocnote_add.php" enctype="multipart/form-data" onSubmit="return verification()">
                <table  border="0" cellspacing="0" cellpadding="0" class="tab_client" align="center">
  <tr>
    <td width="90" class="client_td">Titre</td>
    <td width="350" class="client_td2"><input type="text" name="titre" size="12" /></td>    
  </tr>
  <tr>
    <td width="90" class="client_td">Description</td>
    <td width="350" class="client_td2"><textarea name="description" rows="6" cols="50" placeholder="texte..."></textarea></td>    
  </tr>
  <tr>
    <td width="90" class="client_td">Date</td>
    <td width="350" class="client_td2"><input type="date"  name="date" size="12" /></td>    
  </tr>  
</table>
		<div id="titre1">&nbsp;</div>
        <div align="center"><input name='envoyer' type='submit' value='Enregistrer'></div>
				
				</form>
		<div id="titre1">&nbsp;</div>
        
               
                <!-- fin fiche occas -->
                
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
    
    <!-- AJAX -->
    <script>
function afficheClient(txtcli) {   
  var txtcli;	
  //alert(txtcli);
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlArt=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlArt=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlArt.onreadystatechange=function() {    
    if (xmlArt.readyState==4 && xmlArt.status==200) {
      var texte = xmlArt.responseText;  
	  
	  var info = texte.split(" | ");
	  //var i = info.length;
	  //alert (i);	  
	  
	  $ ('#clientID').empty()
		var a = 1;
		var b = 2;
		var c = 3;
		var d = 4;
		var e = 5;
		var inc = (info.length / 6) - 1;
		

		alert ('Recherche trouvé');
		for (var i = 0; i < inc; i++) {
		
      	$ ('#clientID').append('<option value="' +info[a]+ '" >' +info[b]+ ' / ' +info[c]+ ' / ' +info[d]+ ' / ' +info[d]+ '</option>');
		var a = a + 6;
		var b = b + 6;
		var c = c + 6;
		var d = d + 6;
		var e = e + 6;
		}
	  //document.formInter.client.removeChild(document.formInter.client.options[1]); 
	  //document.formInter.client.options[document.formInter.client.length] = new Option(texteCliId, texteCliNom, true, true);
	  //document.form_articles.artTTC.value = info[4];
    }
  }
  xmlArt.open("GET","ajax_clients.php?gettxt="+txtcli,true);
  xmlArt.send();
}
	</script>
</body>
</html>