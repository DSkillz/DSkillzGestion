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

<section class="row topsection">
  <h2 class="text-center">FICHE EN COURS</h2>
  <!-- PC à faire -->

  <ul class="mx-auto d-inline-flex justify-content-evenly" style="width: 500px">
    <li>
      <button onclick="btnclick('intervention_liste.php')" style="color:#9aff00">Interventions <?php echo $dataT['NBtotal']; ?></button>
    </li>
    <li>
      <a href="afaire.php" target="_self" style="color:#F90">A faire <?php echo $data['NBafaire']; ?></a>
    </li>
    <li>
      <a href="attente.php" target="_parent" style="color:#0CC">En attente <?php echo $data2['NBattente']; ?></a>
    </li>
    <li>
      <a href="termine.php" target="_parent" style="color:#F30">Terminé <?php echo $data3['NBtermine']; ?></a>
    </li>
  </ul>

  <p>&nbsp;</p>
  <p class="text-center" ---------------------------</p>
  <p>&nbsp;</p>
</section>


<script type="text/javascript">
  function btnclick(_url) {
    $.ajax({
      url: _url,
      type: 'post',
      success: function(data) {
        $('.intervention').html(data);
      },
      error: function() {
        $('.intervention').text('An error occurred');
      }
    });
  }
</script>