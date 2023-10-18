<?php require("auth.php");
require("connect.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Sergey Pozhilov (GetTemplate.com)">

  <title>Fiche Intervention</title>

  <link rel="shortcut icon" href="assets/images/gt_favicon.png">

  <link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">

  <!-- Custom styles for our template -->
  <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
  <link rel="stylesheet" href="assets/css/main.css">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
  <!-- Fixed navbar -->
  <?php include 'menu.html'; ?>
  <!-- /.navbar -->

  <!-- Header -->
  <header id="head">
    <div class="container">
      <div class="row">
        <?php
        require('encours.php')
        ?>

        <p class="tagline"><b style="font-size:16px">LISTE DES CLIENTS</b> </p>

        <p>
          <!-- fiche recherche -->
        <form name="formNom">
          <input type="text" name="nom" size="30">&nbsp;&nbsp;&nbsp;<input type="button" onClick="rechClient()" value="RECHERCHER PAR NOM">
        </form>
        <!-- fin fiche recherche -->

        <!-- fiche Client -->
        <!-- LISTE AJAX -->

        <div id="liste">

          <?php
          $requete = mysqli_query($conn, "SELECT * FROM clients ORDER BY cli_id DESC") or die('Erreur SQL !' . $requete . '<br>' . mysql_error());

          ?>

          <input type="search" placeholder="Search..." class="form-control search-input" data-table="interv-list" />


          <table class="interv-list" border="0" align="center">
            <thead>
              <tr>
                <th width="100">&nbsp;</th>
                <th width="40">N°</th>
                <th width="180">Nom/Prénom</th>
                <th width="80">Téléphone 1</th>
                <th width="80">Téléphone 2</th>
                <th width="100">E-mail</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php while ($donnees = mysqli_fetch_assoc($requete)) {
                  echo "<tr>";
                  echo "<td align='center'>";
                ?>
                  <a href="client_modif.php?id=<?php echo $donnees['cli_id']; ?>"><button>MODIFIER</button></a>
                  <?php
                  echo "</td>";
                  echo "<td align='left'>" . $donnees['cli_id'] . "</td>";
                  echo "<td align='left'>" . $donnees['cli_civ'] . "&nbsp;" . $donnees['cli_nom'] . "&nbsp;</td>";
                  echo "<td>" . $donnees['cli_tel1'] . "</td>";
                  echo "<td>" . $donnees['cli_tel2'] . "</td>";
                  echo "<td align='left'>" . $donnees['cli_tel3'] . "</td>";
                  ?>
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
    </div>
  </header>
  <!-- /Header -->

  <!-- Intro -->
  <div class="container text-center">


  </div>
  <!-- /Intro-->

  <footer id="footer" class="top-space">

    <?php include 'footer.html'; ?>

  </footer>





  <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="assets/js/headroom.min.js"></script>
  <script src="assets/js/jQuery.headroom.min.js"></script>
  <script src="assets/js/template.js"></script>

  <!-- Clients filtering -->
  <script>
    (function(document) {
      'use strict';

      var TableFilter = (function(myArray) {
        var search_input;

        function _onInputSearch(e) {
          search_input = e.target;
          var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
          myArray.forEach.call(tables, function(table) {
            myArray.forEach.call(table.tBodies, function(tbody) {
              myArray.forEach.call(tbody.rows, function(row) {
                var text_content = row.textContent.toLowerCase();
                var search_val = search_input.value.toLowerCase();
                console.log("search_chars = " + search_val);
                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
              });
            });
          });

        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('search-input');

            myArray.forEach.call(inputs, function(input) {
              input.oninput = _onInputSearch;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          TableFilter.init();
        }
      });

    })(document);
  </script>


  <!-- AJAX -->
  <script>
    function rechClient() {
      var IDnom = document.formNom.nom.value;

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
      xmlhttp.open("GET", "client_rech_ajax.php?nom=" + IDnom, true);
      xmlhttp.send();
    }
  </script>

</body>

</html>