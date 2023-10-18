

<!-- Main -->
<main class="container-fluid">
  <?php
  include('liste_menu.php');
  include('fichecrea.php')
  ?>
</main>

<!-- AJAX -->
<script>
  function afficheClient(txtcli) {
    var txtcli;
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

        var info = texte.split(" | ");
        var i = info.length;

        $('#clientID').empty()
        var a = 1;
        var b = 2;
        var c = 3;
        var d = 4;
        var e = 5;
        var inc = (info.length / 6) - 1;

        for (var i = 0; i < inc; i++) {

          $('#clientID').append('<option value="' + info[a] + '" >' + info[b] + ' / ' + info[c] + ' / ' + info[d] + ' / ' + info[d] + '</option>');
          var a = a + 6;
          var b = b + 6;
          var c = c + 6;
          var d = d + 6;
          var e = e + 6;
        }
        if (i != 0) {
          $("#name_search").notify(i + " clients trouvés !", {
            position: 'top right',
            className: 'success'
          });
          $('#clientsID OPTION').show()
        } else {
          $("#name_search").notify(i + " clients trouvés !", {
            position: 'top right',
            className: 'warn'
          });
        }
        //document.formInter.client.removeChild(document.formInter.client.options[1]); 
        //document.formInter.client.options[document.formInter.client.length] = new Option(texteCliId, texteCliNom, true, true);
        //document.form_articles.artTTC.value = info[4];
      }
    }
    xmlArt.open("GET", "ajax_clients.php?gettxt=" + txtcli, true);
    xmlArt.send();
  }
</script>