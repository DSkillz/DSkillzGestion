<?php

require("connect.php");
$Date1 = $_GET['date1'];
$Date2 = $_GET['date2'];

$requete = mysqli_query($conn, "SELECT * FROM interventions WHERE inter_date BETWEEN '$Date1' AND '$Date2' ORDER BY inter_id DESC LIMIT 30 ") or die('Erreur SQL !'.$requete.'<br>'.mysqli_error());    
	
?>

<table width="80%" border="0" align="center">
  <tr>
    <td width="100">&nbsp;</td>
  	<td width="40">N°</td>
    <td width="100">Date</td>
    <td width="180">Nom/Prénom</td>
    <td width="340">Observations</td>
    <td width="80">Etats</td> 
    <td width="100">&nbsp;</td>  
  </tr>
  <tr>
  <?php	while($donnees = mysqli_fetch_assoc($requete)) { 
  
$interNom = $donnees['inter_cli_id'];
  $sqlNom = mysqli_query($conn, "SELECT cli_nom, cli_civ FROM clients WHERE cli_id ='$interNom' ") or die('Erreur SQL !'.$sqlNom.'<br>'.mysqli_error()); 
  $dataNom = mysqli_fetch_assoc($sqlNom);
  
echo "<tr>";
echo "<td align='center'>";
  ?>
<a href="intervention_liste_modif.php?id=<?php echo $donnees['inter_id']; ?>&num=1"><button>MODIFIER</button></a>
  <?php
echo "</td>";
echo "<td>" .$donnees['inter_id']."</td>";
echo "<td>" .date('d/m/Y', strtotime($donnees['inter_date']));"</td>";
echo "<td align='left'>" .$dataNom['cli_civ']. "&nbsp;".$dataNom['cli_nom']. "&nbsp;</td>";
echo "<td align='justify'>" .$donnees['inter_info_obs']. "</td>";
echo "<td>" .$donnees['inter_status']. "</td>";
	?>  
<td align="center"><a href="intervention_imprim2.php?id=<?php echo $donnees['inter_id']; ?>&num=1"><button>Imprimer</button></a></td>
  </tr>
  <?php } ?>
  
</table>