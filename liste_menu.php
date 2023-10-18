<nav id="liste_menu">

  <?php
  include('connect.php');

  $totRequest = mysqli_query($conn, "SELECT COUNT(*) as NBtotal FROM interventions WHERE 1 ") or die('Erreur SQL !' . $totRequest . '<br>' . mysqli_error($conn));
  $dataT = mysqli_fetch_assoc($totRequest);

  $requete = mysqli_query($conn, "SELECT COUNT(*) as NBafaire FROM interventions WHERE inter_status ='cours' ") or die('Erreur SQL !' . $requete . '<br>' . mysqli_error($conn));
  $data = mysqli_fetch_assoc($requete);

  $requete2 = mysqli_query($conn, "SELECT COUNT(*) as NBattente FROM interventions WHERE inter_status ='sav' OR inter_status ='electro' OR inter_status ='commande' ") or die('Erreur SQL !' . $requete2 . '<br>' . mysqli_error($conn));
  $data2 = mysqli_fetch_assoc($requete2);

  $requete3 = mysqli_query($conn, "SELECT COUNT(*) as NBtermine FROM interventions WHERE inter_status ='termine' ") or die('Erreur SQL !' . $requete3 . '<br>' . mysqli_error($conn));
  $data3 = mysqli_fetch_assoc($requete3);
  ?>

  <br><br><br><br><br>
  <center id="time" style="color:#FFF; font-weight: 900;">
  <?php

  ?>

  </center>
  <center style="color:#FFF; ">
    &nbsp;&nbsp;
    <a id="liste_interv" href="#" style="color:#9aff00">Interventions <?php echo $dataT['NBtotal']; ?></a>
    &nbsp;&nbsp;
    <!-- <a href="afaire.php" target="_self" style="color:#F90">A faire </a>
    &nbsp;&nbsp; -->
    <a id="liste_afaire" href="#" style="color:#F90">A faire <?php echo $data['NBafaire']; ?></a>
    &nbsp;&nbsp;
    <a id="liste_en_attente" href="#" style="color:#0CC">En attente <?php echo $data2['NBattente']; ?></a>
    &nbsp;&nbsp;
    <a id="liste_termine" href="#" style="color:#F30">Terminé <?php echo $data3['NBtermine']; ?></a>
  </center>
  <p>&nbsp;</p>
  <p align="center">---------------------------</p>
  <p>&nbsp;</p>
</nav>

<script>
  var timeDisplay = document.getElementById("time");


  function refreshTime() {
    var dateString = new Date().toLocaleString("fr-FR", {
      timeZone: "Europe/Paris"
    });
    var formattedString = dateString.replace(", ", " - ");
    timeDisplay.innerHTML = "Nous sommes le: " + formattedString;
  }

  setInterval(refreshTime, 1000);

  $('#liste_interv').click(function() {
    $('main').load('intervention_liste.php');
    return false;
  });
  $('#liste_afaire').click(function() {
    $('main').load('afaire.php');
    return false;
  });
  $('#liste_en_attente').click(function() {
    $('main').load('attente.php');
    return false;
  });
  $('#liste_termine').click(function() {
    $('main').load('termine.php');
    return false;
  });
</script>