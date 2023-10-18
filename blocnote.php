<?php
require("auth.php");
require("connect.php");
include("liste_menu.php");
?>

<section class="row">
	<!-- fiche Client -->
	<p class="tagline"><b style="font-size:16px">BLOC NOTE: Création</b></p>
	<p>
		<script type="text/javascript">
			function verification() {


				if (document.formoccas.nom.value == "") {
					alert("Le champ NOM ne peut être vide.");
					document.formoccas.nom.focus();
					return false;
				}
				return true;
			}
		</script>
	<form name="formoccas" id="formoccas" method="post" action="blocnote_add.php" enctype="multipart/form-data" onSubmit="return verification()">
		<table border="0" cellspacing="0" cellpadding="0" class="tab_client" align="center">
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
				<td width="350" class="client_td2"><input type="date" name="date" size="12" /></td>
			</tr>
		</table>
		<div id="titre1">&nbsp;</div>
		<div align="center"><input name='envoyer' type='submit' value='Enregistrer'></div>

	</form>
	<div id="titre1">&nbsp;</div>


	<!-- fin fiche occas -->

</section>


<!-- AJAX -->
<script>
	function afficheClient(txtcli) {
		var txtcli;
		//alert(txtcli);
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlArt = new XMLHttpRequest();
		} else { // code for IE6, IE5
			xmlArt = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlArt.onreadystatechange = function() {
			if (xmlArt.readyState == 4 && xmlArt.status == 200) {
				var texte = xmlArt.responseText;

				var info = texte.split(" | ");
				//var i = info.length;
				//alert (i);	  

				$('#clientID').empty()
				var a = 1;
				var b = 2;
				var c = 3;
				var d = 4;
				var e = 5;
				var inc = (info.length / 6) - 1;


				alert('Recherche trouvé');
				for (var i = 0; i < inc; i++) {

					$('#clientID').append('<option value="' + info[a] + '" >' + info[b] + ' / ' + info[c] + ' / ' + info[d] + ' / ' + info[d] + '</option>');
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
		xmlArt.open("GET", "ajax_clients.php?gettxt=" + txtcli, true);
		xmlArt.send();
	}
</script>
</body>

</html>