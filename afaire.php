<?php
require("auth.php");
require("connect.php");
include('liste_menu.php');
?>

<section class="row">
  <!-- fiche Client -->
  <p class="tagline"><b style="font-size:16px">FICHE INTERVENTION: A FAIRE</b> </p>
  <p>

    <?php

    $req = "SELECT * FROM interventions WHERE inter_status ='cours' ORDER BY inter_date ASC";

    // on exécute la requête
    $requete = $conn->query($req);

    // $requete = mysqli_query($conn, "SELECT * FROM interventions WHERE inter_status ='cours' ORDER BY inter_date ASC") or die('Erreur SQL !' . $requete . '<br>' . mysqli_error());
    ?>

    <input type="search" placeholder="Search..." class="form-control search-input" data-table="interv-list" />

  <table class="table interv-list" width="100%" border="0">
    <thead>
      <tr>
        <th>&nbsp;</th>
        <th>Date</th>
        <th width="150px">Nom</th>
        <th width="300px">Observations</th>
        <th>Status</th>
        <th>Date commande</th>
        <th>Chez qui</th>
        <th>Matériel commandé</th>
        <th>Par qui</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php while ($donnees = mysqli_fetch_assoc($requete)) { ?>

          <?php
          $interNom = $donnees['inter_cli_id'];
          $sqlNom = mysqli_query($conn, "SELECT cli_nom FROM clients WHERE cli_id ='$interNom' ") or die('Erreur SQL !' . $sqlNom . '<br>' . mysqli_error());
          $dataNom = mysqli_fetch_assoc($sqlNom);

          echo "<tr>";
          echo "<td align='center' ><a href='intervention_modif.php?id=" . $donnees['inter_id'] . "'><button>Modifier Fiche</button></a></td>";
          echo "<form method='post' action='status_modif.php' enctype='multipart/form-data'>";

          echo "<td>" . date('d/m/Y', strtotime($donnees['inter_date']));
          "</td>";
          echo "<td>" . $dataNom['cli_nom'] . "</td>";
          echo "<td><i>" . $donnees['inter_info_obs'] . "</i></td>";
          ?>
          <td>
            <SELECT name="status" style="width:60px">
              <OPTION VALUE="<?php echo $donnees['inter_status']; ?>"></OPTION>
              <OPTION VALUE="sav">SAV</OPTION>
              <OPTION VALUE="commande">Pièce commandée</OPTION>
              <OPTION VALUE="electro">Chez l'électronicien</OPTION>
              <OPTION VALUE="termine">Terminée</OPTION>
              <OPTION VALUE="attente">En attente</OPTION>
              <OPTION VALUE="livre">Livrée</OPTION>
            </SELECT>
          </td>
          <td><input type="date" name="status_date" value="<?php echo $donnees['inter_status_date'];  ?>" />
          </td>
          <td>
            <SELECT name="status_gros" style="width:60px">
              <OPTION VALUE="<?php echo $donnees['inter_status_gros']; ?>">
                <?php echo $donnees['inter_status_gros']; ?></OPTION>
              <OPTION VALUE="S2i">S2i</OPTION>
              <OPTION VALUE="Amazon">Amazon</OPTION>
              <OPTION VALUE="Pobix">Pobix</OPTION>
              <OPTION VALUE="Alexi">Alexi</OPTION>
              <OPTION VALUE="Accessoires ASUS">Accessoires ASUS</OPTION>
              <OPTION VALUE="Dalle Express">Dalle Express</OPTION>
            </SELECT>
          </td>
          <td>
            <input type="text" value="<?php echo $donnees['inter_status_piece']; ?>" name="status_mat_com" placeholder="pièce commandée" size="12" />
          </td>
          <td>
            <SELECT name="status_qui" style="width:60px">
              <OPTION VALUE="<?php echo $donnees['inter_status_qui']; ?>">
                <?php echo $donnees['inter_status_qui']; ?></OPTION>
              <OPTION VALUE="Nicolas">Nicolas</OPTION>
              <OPTION VALUE="Matthias">Matthias</OPTION>
              <OPTION VALUE="Sandrine">Sandrine</OPTION>
              <OPTION VALUE="Autre">Autre</OPTION>
            </SELECT>
          </td>
          <td><input type="submit" value="Modifier status"></td>
          <input name="interId" type="hidden" value="<?php echo $donnees['inter_id']; ?>">
          </form>
        <?php } ?>
      </tr>
    </tbody>
  </table>

  </p>
  <!-- fin fiche client -->

  <p>&nbsp;</p>
  <p align="center">---------------------------</p>
  <p>&nbsp;</p>


  </p>
  <!-- fin fiche client -->

</section>

<!-- Table filtering -->
<script>
  (function() {
    'use strict';

    var TableFilter = (function() {
      var Arr = Array.prototype;
      var input;

      function onInputEvent(e) {
        input = e.target;
        var table1 = document.getElementsByClassName(input.getAttribute('data-table'));
        Arr.forEach.call(table1, function(table) {
          Arr.forEach.call(table.tBodies, function(tbody) {
            Arr.forEach.call(tbody.rows, filter);
          });
        });
      }

      function filter(row) {
        var text = row.textContent.toLowerCase();
        //console.log(text);
        var val = input.value.toLowerCase();
        //console.log(val);
        row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
      }

      return {
        init: function() {
          var inputs = document.getElementsByClassName('search-input');
          Arr.forEach.call(inputs, function(input) {
            input.oninput = onInputEvent;
          });
        }
      };

    })();

    TableFilter.init();
  })();
</script>

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