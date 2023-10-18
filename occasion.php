<?php
require("auth.php");
require("connect.php");
include('liste_menu.php');
?>

<section class="row">

	<!-- fiche Client -->
	<p class="tagline"><b style="font-size:16px">FICHE OCCASION: Création</b> </p>
	<p>
	<form name="formoccas" id="formoccas" method="post" action="occasion_add.php" enctype="multipart/form-data" onSubmit="return verification()">
		<table border="0" cellspacing="0" cellpadding="0" class="tab_client" align="center">
			<tr>
				<td width="90" class="client_td">Type *</td>
				<td width="350" class="client_td2"><SELECT name="type" style="width:150px">
						<OPTION VALUE=""></OPTION>
						<OPTION VALUE="fixe">Fixe/Tour</OPTION>
						<OPTION VALUE="portable">PC Portable</OPTION>
						<OPTION VALUE="tablette">Tablette</OPTION>
						<OPTION VALUE="imprimante">Imprimante</OPTION>
						<OPTION VALUE="aio">All in One</OPTION>
						<OPTION VALUE="autre">Autre</OPTION>
					</SELECT></td>
			</tr>
			<tr>
				<td width="90" class="client_td">Description</td>
				<td width="350" class="client_td2"><textarea name="description" rows="4" cols="40" placeholder="description du pc..."></textarea></td>
			</tr>
			<tr>
				<td width="90" class="client_td">Prix</td>
				<td width="350" class="client_td2"><input type="text" name="prix" size="12" /></td>
			</tr>
			<tr>
				<td class="client_td">Status</td>
				<td class="client_td2"><SELECT name="status" style="width:100px">
						<OPTION VALUE="Au magasin">Au magasin</OPTION>
						<OPTION VALUE="Vendu">Vendu</OPTION>
				</td>
			</tr>
		</table>
		<div id="titre1">&nbsp;</div>
		<div align="center"><input name='envoyer' type='submit' value='Enregistrer'></div>

	</form>
	<div id="titre1">&nbsp;</div>


	<!-- fin fiche occas -->

</section>