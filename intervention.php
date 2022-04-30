<?php
console_log('chargement encours.php');
require("connect.php");
?>
<div class="row">
  <?php
  console_log('chargement encours.php');
  require('encours.php');
  ?>

  <!-- fiche Client -->
  <p>FICHE CLIENT: Création</p>

  <!--           <script type="text/javascript">
            function verification() {


              if (document.formclients.nom.value == "") {
                alert("Le champ NOM ne peut être vide.");
                document.formclients.nom.focus();
                return false;
              }
              return true;
            }
          </script> -->

  <p>
  <form name="formclients" id="formclients" method="post" action="client_add.php" enctype="multipart/form-data" onSubmit="return verification()">
    <table border="0" cellspacing="0" cellpadding="0" class="tab_client" align="center">
      <tr>
        <td width="90" class="client_td">Civilité</td>
        <td width="350" class="client_td2"><SELECT name="civ" style="width:100px">
            <OPTION VALUE=""></OPTION>
            <OPTION VALUE="Mme">Mme</OPTION>
            <OPTION VALUE="Mr">Mr</OPTION>
            <OPTION VALUE="Mlle">Mlle</OPTION>
            <OPTION VALUE="Ste">Ste</OPTION>
          </SELECT></td>
      </tr>
      <tr>
        <td width="90" class="client_td">Nom*</td>
        <td width="350" class="client_td2"><input type="text" name="nom" size="40" /></td>
      </tr>
      <tr>
        <td class="client_td">Téléphone *</td>
        <td class="client_td2"><input type="text" name="tel1" size="40" /></td>
      </tr>
      <tr>
        <td class="client_td">Téléphone 2</td>
        <td class="client_td2"><input type="text" name="tel2" size="40" /></td>
      </tr>
      <tr>
        <td class="client_td">E-Mail</td>
        <td class="client_td2"><input type="text" name="tel3" size="40" /></td>
      </tr>
      <tr>
        <td class="client_td">Adresse</td>
        <td class="client_td2"> <input type="text" name="adresse" size="60" /></td>
      </tr>
      <tr>
        <td class="client_td">CP/Ville</td>
        <td class="client_td2"><input type="text" name="cp" size="10" />&nbsp;&nbsp;<input type="text" name="ville" size="45" /></td>
      </tr>
    </table>

    <div id="titre1">&nbsp;</div>
    <div align="center"><input name='annuler' type='reset' value='Vider les champs'>&nbsp;&nbsp;&nbsp;<input name='envoyer' type='submit' value='Enregistrer'></div>

  </form>
  </p>
  <!-- fin fiche client -->

  <p>&nbsp;</p>
  <p align="center">---------------------------</p>
  <p>&nbsp;</p>

  <!-- fiche Intervention -->
  <p class="tagline"><b style="font-size:16px">FICHE INTERVENTION: Création</b></p>
  <p>
    <script type="text/javascript">
      function verification() {


        if (document.formclients.nom.value == "") {
          alert("error");
          document.formclients.nom.focus();
          return false;
        }
        return true;
      }
    </script>

    <?php
    // $sql_client = new PDO($conn, "SELECT * FROM clients ORDER BY cli_id DESC LIMIT 5") or die('Erreur SQL !' . $sql_art . '<br>' . mysqli_error());
    //$nb_cli = mysqli_fetch_row($sql_client);
    try {
      console_log('try a request with PDO');
      $req = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
      $req->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $req->beginTransaction();

      $sql = "SELECT * FROM clients ORDER BY cli_id DESC LIMIT 50";
      $req->exec($sql);
      echo 'Affichage de tous les clients';
    } catch (PDOException $e) {
      $req->rollBack();
      echo "Erreur : " . $e->getMessage();
    }
    ?>
  <form name="formInter" id="formInter" method="post" action="intervention_add.php" enctype="multipart/form-data" onSubmit="return verification2()">

    <table border="0" cellspacing="0" cellpadding="0" class="tab_client" align="center">
      <thead>
        <td class="client_td"></td>
        <td class="client_td2"><b align="center">-----------------------------------------------------------------------</b>
          <br>CONTEXTE<br>
        </td>
      </thead>
      <tr>
        <td width="100" class="client_td">Date *<br>(jj/mm/aaaa)</td>
        <td class="client_td2"><input type='text' name='info_date' size='20' value="<?php echo date("d/m/Y"); ?>"></td>
      </tr>
      <tr>
        <td width="100" class="client_td">Intervenant *</td>
        <td width="350" class="client_td2"><SELECT name="intervenant" style="width:100px">
            <OPTION VALUE=""></OPTION>
            <OPTION VALUE="Nicolas">Nicolas</OPTION>
            <OPTION VALUE="Matthias">Matthias</OPTION>
            <OPTION VALUE="Sandrine">Sandrine</OPTION>
            <OPTION VALUE="Autre">Autre</OPTION>
          </SELECT></td>
      </tr>
      <tr>
        <td width="100" class="client_td">Nom*</td>
        <td width="350" class="client_td2"><input id="name_search" type="text" name="nom" size="40" placeholder="sans accent" />
          <br>
          <button onclick="afficheClient(document.formInter.nom.value)" type="button">Rechercher</button>
          &nbsp;&nbsp;
          <SELECT name="client" id="clientID" style="width:240px">
            <?php
            while ($nb_cli = mysqli_fetch_assoc($sql_client)) {
              echo '<OPTION VALUE="' . $nb_cli['cli_id'] . '">' . htmlentities($nb_cli['cli_nom'], ENT_QUOTES, 'utf-8', true) . ' | ' . $nb_cli['cli_tel1'] . ' | ' . $nb_cli['cli_tel2'] . ' | ' . $nb_cli['cli_tel3'] . '</OPTION>';
            }
            ?>

          </SELECT>

        </td>
      </tr>
      <thead>
        <td class="client_td"></td>
        <td class="client_td2"><b align="center">-----------------------------------------------------------------------</b>
          <br>MATERIEL<br>
        </td>
      </thead>
      <tr>
        <td width="100" class="client_td">Type *</td>
        <td width="350" class="client_td2"><SELECT name="type_mat" style="width:150px">
            <OPTION VALUE=""></OPTION>
            <OPTION VALUE="fixe">Fixe/Tour</OPTION>
            <OPTION VALUE="portable">PC Portable</OPTION>
            <OPTION VALUE="tablette">Tablette</OPTION>
            <OPTION VALUE="imprimante">Imprimante</OPTION>
            <OPTION VALUE="aio">All in One</OPTION>
            <OPTION VALUE="autre">Autre</OPTION>
          </SELECT></td>
      </tr>
      <tr>
        <td class="client_td">Marque *</td>
        <td class="client_td2"><input type="text" name="marque" size="20" placeholder="Nom" />&nbsp;&nbsp;&nbsp;<input type="text" name="modele" size="20" placeholder="Modèle" /></td>
      </tr>
      <tr>
        <td class="client_td">Périphérique</td>
        <td class="client_td2">
          <table width="100%" border="0">
            <tr>
              <td width="40%">
                <input type="checkbox" name="periph1" value="chargeur" /> Chargeur&nbsp;&nbsp;&nbsp;<br>
                <input type="checkbox" name="periph2" value="sacoche" /> Sacoche&nbsp;&nbsp;&nbsp;<br>
                <input type="checkbox" name="periph3" value="souris" /> Souris&nbsp;&nbsp;&nbsp;<br>
                <input type="checkbox" name="periph4" value="sac" /> Sac / carton&nbsp;&nbsp;&nbsp;<br>

              </td>
              <td>
                <input type="checkbox" name="periph5" value="hdd" /> HDD / HDD Externe&nbsp;&nbsp;&nbsp;<br>
                <input type="checkbox" name="periph6" value="cle_usb" /> Clé USB &nbsp;&nbsp;&nbsp;<br>
                <input type="checkbox" name="periph7" value="ecran" /> Ecran &nbsp;&nbsp;&nbsp;<br>
                <input type="checkbox" name="periph8" value="dvd" /> CD/DVD &nbsp;&nbsp;&nbsp;<br>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <thead>
        <td class="client_td"></td>
        <td class="client_td2"><b align="center">-----------------------------------------------------------------------</b>
          <br>INFORMATIONS SUPPLEMENTAIRES<br>
        </td>
      </thead>
      <tr>
        <td class="client_td">Mot de passe</td>
        <td class="client_td2"><input type="text" name="mdp" size="20" /></td>
      </tr>
      <tr>
        <td class="client_td">Compte</td>
        <td class="client_td2"><textarea name="compte" rows="3" cols="40" placeholder="mail/licence/ect..."></textarea> </td>
      </tr>
      <tr>
        <td class="client_td">Observation*</td>
        <td class="client_td2"><textarea name="observations" rows="4" cols="40" placeholder="observations supplémentaires..."></textarea></td>
      </tr>
      <thead>
        <td class="client_td"></td>
        <td class="client_td2"><b align="center">-----------------------------------------------------------------------</b>
          <br>STATUS<br>
        </td>
      </thead>
      <tr>
        <td width="100" class="client_td">Status *</td>
        <td width="350" class="client_td2"><SELECT name="status" style="width:150px">
            <OPTION VALUE="cours">A faire</OPTION>
            <OPTION VALUE="sav">SAV</OPTION>
            <OPTION VALUE="commande">Pièce commandée</OPTION>
            <OPTION VALUE="electro">Chez l'électronicien</OPTION>
            <OPTION VALUE="termine">Terminée</OPTION>
            <OPTION VALUE="attente">En attente</OPTION>
            <OPTION VALUE="livre">Livrée</OPTION>
          </SELECT>
        </td>
      </tr>
      <tr>
        <td width="100" class="client_td">Date de commande</td>
        <td width="350" class="client_td2">
          <input type="date" name="status_date" size="30" placeholder="date de commande, SAV..." />
        </td>
      </tr>
      <tr>
        <td width="100" class="client_td">Chez qui</td>
        <td width="350" class="client_td2"><SELECT name="status_gros" style="width:150px">
            <OPTION VALUE="rien"></OPTION>
            <OPTION VALUE="S2i">S2i</OPTION>
            <OPTION VALUE="Amazon">Amazon</OPTION>
            <OPTION VALUE="Pobix">Pobix</OPTION>
            <OPTION VALUE="Alexi">Alexi</OPTION>
            <OPTION VALUE="Dalle Express">Dalle Express</OPTION>
          </SELECT>
        </td>
      </tr>
      <tr>
        <td width="100" class="client_td">Matériel commandé</td>
        <td width="350" class="client_td2">
          <input type="text" name="status_mat_com" size="30" placeholder="pièce commandée" />
        </td>
      </tr>
      <tr>
        <td width="100" class="client_td">Par qui</td>
        <td width="350" class="client_td2"><SELECT name="status_qui" style="width:100px">
            <OPTION VALUE=""></OPTION>
            <OPTION VALUE="Nicolas">Nicolas</OPTION>
            <OPTION VALUE="Jeremy">Matthias</OPTION>
            <OPTION VALUE="Sandrine">Sandrine</OPTION>
            <OPTION VALUE="Autre">Autre</OPTION>
          </SELECT></td>
      </tr>
    </table>

    <div id="titre1">&nbsp;</div><br>
    <div align="center"><input name='annuler' type='reset' value='Vider les champs'>&nbsp;&nbsp;&nbsp;<input name='envoyer' type='submit' value='Enregistrer'></div>

  </form>
  </p>
  <!-- fin fiche client -->

</div>

<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="assets/js/headroom.min.js"></script>
<script src="assets/js/jQuery.headroom.min.js"></script>
<script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>
<script src="/assets/js/ExpandSelect.js"></script>

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