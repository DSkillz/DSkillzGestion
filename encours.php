<p class="tagline"><b style="font-size:16px">FICHE EN COURS</b> </p>
<p>
  <!-- PC à faire -->
  <?php

  $totRequest = mysqli_query($conn, "SELECT COUNT(*) as NBtotal FROM interventions WHERE 1 ") or die('Erreur SQL !' . $totRequest . '<br>' . mysqli_error());
  $dataT = mysqli_fetch_assoc($totRequest);

  $requete = mysqli_query($conn, "SELECT COUNT(*) as NBafaire FROM interventions WHERE inter_status ='cours' ") or die('Erreur SQL !' . $requete . '<br>' . mysqli_error());
  $data = mysqli_fetch_assoc($requete);

  $requete2 = mysqli_query($conn, "SELECT COUNT(*) as NBattente FROM interventions WHERE inter_status ='sav' OR inter_status ='electro' OR inter_status ='commande' ") or die('Erreur SQL !' . $requete2 . '<br>' . mysqli_error());
  $data2 = mysqli_fetch_assoc($requete2);

  $requete3 = mysqli_query($conn, "SELECT COUNT(*) as NBtermine FROM interventions WHERE inter_status ='termine' ") or die('Erreur SQL !' . $requete3 . '<br>' . mysqli_error());
  $data3 = mysqli_fetch_assoc($requete3);
  ?>

  <center style="color:#FFF; ">
    &nbsp;&nbsp;
    <a href="intervention_liste.php" target="_self" style="color:#9aff00">Interventions <?php echo $dataT['NBtotal']; ?></a>
    &nbsp;&nbsp;
    <!-- <a href="afaire.php" target="_self" style="color:#F90">A faire </a>
    &nbsp;&nbsp; -->
    <a href="afaire.php" target="_self" style="color:#F90">A faire <?php echo $data['NBafaire']; ?></a>
    &nbsp;&nbsp;
    <a href="attente.php" target="_parent" style="color:#0CC">En attente <?php echo $data2['NBattente']; ?></a>
    &nbsp;&nbsp;
    <a href="termine.php" target="_parent" style="color:#F30">Terminé <?php echo $data3['NBtermine']; ?></a>
  </center>
</p>
<!-- fin -->

<p>&nbsp;</p>
<p align="center">---------------------------</p>
<p>&nbsp;</p>