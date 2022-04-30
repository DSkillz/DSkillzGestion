<?php
require("connect.php");
$Rnom = $_GET['nom'];
$requete = mysqli_query($conn, "SELECT * FROM clients WHERE cli_nom LIKE '%$Rnom%'") or die('Erreur SQL !'.$requete.'<br>'.mysqli_error());    
	
?>

<table width="70%" border="0" align="center">
  <tr>
    <td width="100">&nbsp;</td>
  	<td width="40">N°</td>
    <td width="180">Nom/Prénom</td>
    <td width="80">Téléphone 1</td>
    <td width="80">Téléphone 2</td>
    <td width="100">E-mail</td>  
  </tr>
  <tr>
  <?php	while($donnees = mysqli_fetch_assoc($requete)) { 
echo "<tr>";
echo "<td align='center'>";
  ?>
<a href="client_modif.php?id=<?php echo $donnees['cli_id']; ?>"><button>MODIFIER</button></a>
  <?php
echo "</td>";
echo "<td align='left'>" .$donnees['cli_id']."</td>";
echo "<td align='left'>" .$donnees['cli_civ']. "&nbsp;".$donnees['cli_nom']. "&nbsp;</td>";
echo "<td>" .$donnees['cli_tel1']. "</td>";
echo "<td>" .$donnees['cli_tel2']. "</td>";
echo "<td align='left'>" .$donnees['cli_tel3']. "</td>";
	?>  
  </tr>
  <?php } ?>
  
</table>