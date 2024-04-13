<?php require("auth.php");
require("connect.php"); ?>

<div class="row">

  <p class="tagline"><b style="font-size:16px">LISTE DES INTERVENTIONS</b> </p>

  <p>
    <!-- fiche recherche -->

  <form name="formInterPeriode">

    Du :<input type="date" name="date1" size="30">&nbsp;&nbsp;au <input type="date" name="date2" size="30">&nbsp;&nbsp;&nbsp;<input type="button" onClick="rechInterPeriode()" value="RECHERCHER PAR PERIODE">

  </form>
  <br>
  <!-- fin fiche recherche -->

  <!-- fiche Client -->

  <!-- LISTE AJAX -->

  <div id="liste">

    <?php
    $requete = mysqli_query($conn, "SELECT * FROM interventions ORDER BY inter_id DESC") or die('Erreur SQL !' . $requete . '<br>' . mysqli_error());

    ?>

    <input type="search" placeholder="Search..." class="form-control search-input" data-table="interv-list" />


    <table class="interv-list" width="80%" border="0" align="center">
      <thead>
        <tr>
          <th width="100">&nbsp;</th>
          <th width="40">N°</th>
          <th width="100">Date</th>
          <th width="180">Nom/Prénom</th>
          <th width="340">Observations</th>
          <th width="80">Statut</th>
          <th width="40"><span class='material-icons'>&#xe92b;</span></i> </th>
          <th width="100">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php while ($donnees = mysqli_fetch_assoc($requete)) {

            $interNom = $donnees['inter_cli_id'];
            $sqlNom = mysqli_query($conn, "SELECT cli_nom, cli_civ FROM clients WHERE cli_id ='$interNom' ") or die('Erreur SQL !' . $sqlNom . '<br>' . mysqli_error());
            $dataNom = mysqli_fetch_assoc($sqlNom);

            echo "<td align='center'>";
          ?>
            <a href="intervention_liste_modif.php?id=<?php echo $donnees['inter_id']; ?>&num=1"><button>MODIFIER</button></a>
            <?php
            echo "</td>";
            echo "<td>" . $donnees['inter_id'] . "</td>";
            echo "<td>" . date('d/m/Y', strtotime($donnees['inter_date']));
            "</td>";
            echo "<td align='left'>" . $dataNom['cli_civ'] . "&nbsp;" . $dataNom['cli_nom'] . "&nbsp;</td>";
            echo "<td>" . $donnees['inter_info_obs'] . "</td>";
            echo "<td>" . $donnees['inter_status'] . "</td>";
            echo "<td><a href='' <button><span class='material-icons'>&#xe92b;</span></button></a></td>"
            ?>
            <!-- <a href="delete.php?id=<?php echo $donnees['inter_id'] & $donnees['inter_status']; ?>&num=1"><button><span class='material-icons'>&#xe92b;</span></button></a> -->
            <td align="center"><a href="intervention_imprim2.php?id=<?php echo $donnees['inter_id']; ?>&num=1"><button>Imprimer</button></a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

  </div>
  <!-- FIN LISTE AJAX -->

  </p>
  <!-- fin fiche client -->

  <p>&nbsp;</p>
  <p align="center">---------------------------</p>
  <p>&nbsp;</p>


  </p>
  <!-- fin fiche client -->

</div>

<!-- Intro -->
<div class="container text-center">


</div>
<!-- /Intro-->

<!-- AJAX -->
<script>
  function rechInter() {
    var IDnom = document.formInter.nom.value;

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 1) {
        document.getElementById("liste").innerHTML = "<center><img src='images/loading.gif' width='50px'  /></center>";
      } else
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("liste").innerHTML = xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET", "inter_rech_nom.php?nom=" + IDnom, true);
    xmlhttp.send();
  }

  function rechInterPeriode() {
    var Date1 = document.formInterPeriode.date1.value;
    var Date2 = document.formInterPeriode.date2.value;

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 1) {
        document.getElementById("liste").innerHTML = "<center><img src='images/loading.gif' width='50px'  /></center>";
      } else
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("liste").innerHTML = xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET", "inter_rech_periode.php?date1=" + Date1 + "&date2=" + Date2, true);
    xmlhttp.send();
  }
</script>

</body>

</html>