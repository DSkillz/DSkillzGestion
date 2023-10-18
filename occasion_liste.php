<?php
require("auth.php");
require("connect.php");
include("liste_menu.php");
?>

<div class="row">

  <!-- fiche Client -->
  <p class="tagline"><b style="font-size:16px">LISTE DES OCCASIONS</b> </p>
  <p>


    <?php
    $requete = mysqli_query($conn, "SELECT * FROM occasions ORDER BY occas_id DESC LIMIT 50") or die('Erreur SQL !' . $requete . '<br>' . mysqli_error());
    ?>

  <table width="100%" border="0">
    <tr>
      <td>N°</td>
      <td>Type</td>
      <td width="300px">Descriptions</td>
      <td>Prix</td>
      <td>Status</td>
      <td>Vendu le</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <?php while ($donnees = mysqli_fetch_assoc($requete)) { ?>

        <form method="post" action="oaccasion_modif.php" enctype="multipart/form-data">

          <?php
          // echo '<pre>'; print_r($donnees); echo '</pre>';
          // $interNom = $donnees['inter_cli_id'];
          // $sqlNom = mysqli_query($conn, "SELECT cli_nom FROM clients WHERE cli_id ='$interNom' ") or die('Erreur SQL !' . $sqlNom . '<br>' . mysqli_error());
          // $dataNom = mysqli_fetch_assoc($sqlNom);

          echo "<tr>";
          echo "<td align='center' >" . $donnees['occas_id'] . "</td>";

          ?>
          <td><SELECT name="type" style="width:150px">
              <OPTION VALUE="<?php echo $donnees['occas_type']; ?>"><?php echo $donnees['occas_type']; ?>
              <OPTION VALUE=""></OPTION>
              <OPTION VALUE="fixe">Fixe/Tour</OPTION>
              <OPTION VALUE="portable">PC Portable</OPTION>
              <OPTION VALUE="tablette">Tablette</OPTION>
              <OPTION VALUE="imprimante">Imprimante</OPTION>
              <OPTION VALUE="aio">All in One</OPTION>
              <OPTION VALUE="autre">Autre</OPTION>
            </SELECT>
          </td>
          <td><textarea name="description" rows="3" cols="40" placeholder="description du pc..."><?php echo $donnees['occas_txt']; ?></textarea>
          </td>
          <td><input type="text" value="<?php echo $donnees['occas_prix']; ?>" name="prix" size="12" />
          </td>
          <td>
            <SELECT name="status" style="width:120px">
              <OPTION VALUE="<?php echo $donnees['occas_status']; ?>"><?php echo $donnees['occas_status']; ?>
              <OPTION VALUE="Au magasin">Au magasin</OPTION>
              <OPTION VALUE="Vendu">Vendu</OPTION>
            </SELECT>
          </td>
          <td><input type="date" name="date" value="<?php echo $donnees['occas_date'];  ?>" />
          </td>
          <td><input type="submit" value="Modifier fiche"></td>
          <input name="occasId" type="hidden" value="<?php echo $donnees['occas_id']; ?>">
        </form>
      <?php } ?>
    </tr>
  </table>

  </p>
  <!-- fin fiche client -->

  <p>&nbsp;</p>
  <p align="center">---------------------------</p>
  <p>&nbsp;</p>


  </p>
  <!-- fin fiche client -->

</div>
<!-- AJAX -->
<script>
  function modifStatus(idInter) {
    var idInter;
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

        alert(idInter);
        window.location.reload();

        //document.formInter.client.removeChild(document.formInter.client.options[1]); 
        //document.formInter.client.options[document.formInter.client.length] = new Option(texteCliId, texteCliNom, true, true);
        //document.form_articles.artTTC.value = info[4];
      }
    }
    xmlArt.open("GET", "ajax_status_modif.php?gettxt=" + idInter, true);
    xmlArt.send();
  }
</script>

</body>

</html>