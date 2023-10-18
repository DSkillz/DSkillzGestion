<?php
    require("auth.php");
    require("connect.php");
    require("consolelog.php");
    include("liste_menu.php");

    $req = "SELECT * FROM clients";

    if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
    }

    $res = $conn -> query($req);
    console_log('Affichage du tableau clients.');
    echo '<section>
    <p class="tagline"><b style="font-size:16px">LISTE ET GESTION DES CLIENTS</b> </p>
  

      <!-- fiche recherche -->
      <input type="search" placeholder="Search..." class="form-control search-input" data-table="liste_clients" />';

    if (!$conn -> query($req)) {
        echo("Error description: " . $conn -> error);
    } else {
        // on va scanner tous les tuples un par un
        echo '<table class="liste_clients">
                <thead>
                   <tr>
                    <th>Id</th>
                    <th>Civilité</th>
                    <th>Nom</th>;
                    <th>Tel 1</th>
                    <th>Tel 2</th>
                    <th>Contact autre (mail)</th>
                    <th>Adresse</th>
                    <th>Code postal</th>
                    <th>Ville</th>
                    <th><span class="editClient material-icons">edit</span></th>
                    <th><span class="toTrash material-icons">&#xe92b;</span></th>
                   </tr>
                </thead>
                ';
        while ($data = mysqli_fetch_array($res)) {
            // on affiche les résultats
            echo "<tr><td>".$data['cli_id']."</td><td>".$data['cli_civ']."</td><td>".$data['cli_nom']."</td><td>".$data['cli_tel1']."</td><td>".$data['cli_tel2']."</td><td>".$data['cli_contact']."</td><td>".$data['cli_adr']."</td><td>".$data['cli_cp']."</td><td>".$data['cli_ville']."</td><td><span class='editClient material-icons'>edit</span></td><td><span class='toTrash material-icons'>&#xe92b;</span></td></tr>";
        }
        echo "</table></section>
        
        <!-- fin fiche client -->

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

  // Table multiple drag row selection

$(function () {
    var isMouseDown = false,
      isHighlighted;
    $('.liste_clients tbody tr')
      .mousedown(function () {
        isMouseDown = true;
        $(this).toggleClass('highlighted');
        isHighlighted = $(this).hasClass('highlighted');
        return false; // prevent text selection
      })
      .mouseover(function () {
        if (isMouseDown) {
          $(this).toggleClass('highlighted', isHighlighted);
        }
      });
  
    $(document)
      .mouseup(function () {
        isMouseDown = false;
      });
  });

  // si click sur une des poubelles,
  $('.toTrash').click(function() {

    // créé une chaîne de caractère de tous les index des rangées sélectionnées
    // indexes = $('.highlighted > td:first-child').text();
    
    // envoie au serveur

    $.ajax({
      url: 'client_trash.php',
      type: 'POST',
      data: {
        indexes: $('.highlighted > td:first-child').text()
      },
      success: function(msg) {
        $('.highlighted').hide();
        alert('Clients déplacés dans la corbeille.');
      },
      error: function(e) {
        alert('error:' + e);
      }
  })})

</script>";
    }

    $conn -> close();
?>