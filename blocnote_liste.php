<?php
require("auth.php");
require("connect.php");
include("liste_menu.php")
?>

<section class="row">

  <!-- fiche Client -->
  <p class="tagline"><b style="font-size:16px">LISTE DES BLOCNOTES</b> </p>
  <p>


    <?php
    $requete = mysqli_query($conn, "SELECT * FROM blocnote ORDER BY bn_id DESC LIMIT 50") or die('Erreur SQL !' . $requete . '<br>' . mysqli_error());

    ?>

  <table width="100%" border="0">
    <tr>
      <td>Titre</td>
      <td width="400px">Descriptions</td>
      <td>Date</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <?php while ($donnees = mysqli_fetch_assoc($requete)) { ?>

        <form method="post" action="blocnote_modif.php" enctype="multipart/form-data">

          <?php
          // $interNom = $donnees['inter_cli_id'];
          // $sqlNom = mysqli_query($conn, "SELECT cli_nom FROM clients WHERE cli_id ='$interNom' ") or die('Erreur SQL !' . $sqlNom . '<br>' . mysqli_error());
          // $dataNom = mysqli_fetch_assoc($sqlNom);

          echo "<tr>";
          ?>
          <td><input type="text" value="<?php echo $donnees['bn_nom']; ?>" name="titre" size="12" />
          </td>
          <td><textarea name="description" rows="6" cols="60"><?php echo $donnees['bn_txt']; ?></textarea>
          </td>
          <td><input type="date" name="date" value="<?php echo $donnees['bn_date'];  ?>" />
          </td>
          <td><input type="submit" value="Modifier fiche"></td>
          <input name="bnID" type="hidden" value="<?php echo $donnees['bn_id']; ?>">
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

</section>

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