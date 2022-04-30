<?php require("auth.php"); require("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Sergey Pozhilov (GetTemplate.com)">

  <title>Fiche Intervention</title>

  <link rel="shortcut icon" href="assets/images/gt_favicon.png">

  <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
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
  <style>
    body {
      width: 210mm;
      margin: auto;
    }

    legend {
      border-bottom: 2px solid #b3b3b3c4;
    }

    form[name='imprim_inter'] {
      width: 210mm;
      padding-right: 6mm;
    }

    table,
    tbody,
    tr {
      background-color: transparent !important;
    }

    #validate {
      padding-top: 10mm !important;
      font-size: 90%;
    }

    @page {
      size: A4;
      margin: 0;
    }

    @media print {
      #printPageButton {
        display: none;
      }

      html,
      body {
        width: 210mm;
        height: 297mm;
      }

      body {
        margin: 3%;
      }

    }
  </style>
</head>

<body>

  <?php

  $requeteSQL = mysqli_query($conn, "SELECT * FROM interventions i, clients c WHERE i.inter_cli_id=c.cli_id ORDER BY inter_id DESC LIMIT 1") or die('Erreur SQL !' . $requeteSQL . '<br>' . mysqli_error());
  $donnees = mysqli_fetch_array($requeteSQL);


  ?>


  <form name="imprim_inter">

    <fieldset>
      <legend>FICHE D'INTERVENTION</legend> <!-- Titre du fieldset -->
      <table width="100%" border="0">
        <tr>
          <td width="50%">
            ABCDEPAN'PC<br />
            10 Avenue de la République<br />
            63118 CEBAZAT
          </td>
          <td>
            Le <?php echo date("d/m/Y", strtotime($donnees['inter_date'])); ?><br />
            Fiche n° <?php echo $donnees['inter_id']; ?><br />
            Intervenant : <?php echo $donnees['inter_intervenant']; ?>
          </td>
        </tr>
      </table>
    </fieldset>
    <br />

    <fieldset>
      <legend>CLIENTS</legend> <!-- Titre du fieldset -->
      <table width="100%" border="0">
        <tr>
          <td width="50%">
            NOM : <?php echo $donnees['cli_nom']; ?><br />
            E-mail : <?php echo $donnees['cli_tel3']; ?>
          </td>
          <td>
            TEL1 : <?php echo $donnees['cli_tel1']; ?><br />
            TEL2 : <?php echo $donnees['cli_tel2']; ?>
          </td>
        </tr>
      </table>
    </fieldset>
    <br />


    <fieldset>
      <legend>PERIPHERIQUE</legend>
      <table width="100%" border="0">
        <tr>
          <td width="50%">
            Type matériel : <?php echo $donnees['inter_mat_type']; ?><br />
            Marque : <?php echo $donnees['inter_mat_nom']; ?><br />
            Modèle : <?php echo $donnees['inter_mat_modele']; ?><br />

          </td>
          <td>
            <table width="100%" border="0">
              <tr>
                <td width="50%">
                  <?php
                  if ($donnees['inter_mat_chargeur'] == 1) {
                    echo '<input type="checkbox" value="1" checked="checked" />Chargeur<br>';
                  } else {
                    echo '<input type="checkbox" value="1" />Chargeur<br>';
                  }
                  if ($donnees['inter_mat_sacoche'] == 1) {
                    echo '<input type="checkbox" value="1" checked="checked" />Sacoche<br>';
                  } else {
                    echo '<input type="checkbox" value="1" />Sacoche<br>';
                  }
                  if ($donnees['inter_mat_souris'] == 1) {
                    echo '<input type="checkbox" value="1" checked="checked" />Souris<br>';
                  } else {
                    echo '<input type="checkbox" value="1" />Souris<br>';
                  }
                  if ($donnees['inter_mat_sac'] == 1) {
                    echo '<input type="checkbox" value="1" checked="checked" />Sac / Carton<br>';
                  } else {
                    echo '<input type="checkbox" value="1" />Sac / Carton<br>';
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if ($donnees['inter_mat_hdd'] == 1) {
                    echo '<input type="checkbox" value="1" checked="checked" />HDD / HDD Externe<br>';
                  } else {
                    echo '<input type="checkbox" value="1" />HDD / HDD Externe<br>';
                  }
                  if ($donnees['inter_mat_cle'] == 1) {
                    echo '<input type="checkbox" value="1" checked="checked" />Clé USB<br>';
                  } else {
                    echo '<input type="checkbox" value="1" />Clé USB<br>';
                  }
                  if ($donnees['inter_mat_ecran'] == 1) {
                    echo '<input type="checkbox" value="1" checked="checked" />Ecran<br>';
                  } else {
                    echo '<input type="checkbox" value="1" />Ecran<br>';
                  }
                  if ($donnees['inter_mat_cd'] == 1) {
                    echo '<input type="checkbox" value="1" checked="checked" />CD/DVD<br>';
                  } else {
                    echo '<input type="checkbox" value="1" />CD/DVD<br>';
                  }
                  ?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>

    </fieldset>
    <br />


    <fieldset>
      <legend>INFORMATIONS</legend> <!-- Titre du fieldset -->
      <table width="100%" border="0">
        <tr>
          <td width="50%">
            Observations :<br />
            <br /><i>
              <?php echo $donnees['inter_info_obs']; ?></i>
          </td>
          <td>
            Mot de passe : <?php echo $donnees['inter_info_mdp']; ?><br /><br />
            Compte/mail : <?php echo $donnees['inter_info_compte']; ?><br />

          </td>
        </tr>
      </table>
    </fieldset>
    <br />



    <fieldset>
      <legend>STATUS</legend> <!-- Titre du fieldset -->
      <table width="100%" border="0">
        <tr>
          <td width="50%">
            <?php
            $typeStatue = "";
            if ($donnees['inter_status'] == 'cours') {
              $typeStatue = 'A faire';
            }
            if ($donnees['inter_status'] == 'sav') {
              $typeStatue = 'SAV';
            }
            if ($donnees['inter_status'] == 'commande') {
              $typeStatue = 'Pièce commandée';
            }
            if ($donnees['inter_status'] == 'electro') {
              $typeStatue = 'Chez l\'électronicien';
            }
            if ($donnees['inter_status'] == 'termine') {
              $typeStatue = 'Terminée';
            }
            if ($donnees['inter_status'] == 'livre') {
              $typeStatue = 'Livrée';
            }
            ?>
            Etat intervention : <?php echo $typeStatue; ?><br /><br />
            Date de la commande : <?php echo date("d/m/Y", strtotime($donnees['inter_status_date'])); ?><br /><br />
            Commandée chez <?php echo $donnees['inter_status_gros']; ?><br />
          </td>
          <td>
            Matériel commandé : <?php echo $donnees['inter_status_piece']; ?><br /><br />
            Par : <?php echo $donnees['inter_status_qui']; ?><br /><br />
            Client prévenu :
            <input type="checkbox" />&nbsp;&nbsp;OUI
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" />&nbsp;&nbsp;NON
          </td>
        </tr>
      </table>
    </fieldset>
    <br />

    <fieldset>
      <legend>REMARQUES/INSTRUCTIONS</legend> <!-- Titre du fieldset -->
      <table width="100%" border="0">
        <tr>
          <td id="validate" align="justify">
            Le client certifie que le matériel ci-dessus indiqué n'a pas été ouvert ou modifié par du personnel non qualifié, et que ce matériel n'a subi aucun dommage pouvant annuler une garantie constructeur. Le client s'engage à fournir tout logiciel original, documentation, connectique, et accessoires, codes et mots de passes permettant à la société Abcdépan'pc de remettre son matériel en état de fonctionnement. La société Abcdépan'pc ne saurait être tenue pour responsable de retard en cas de manque ou d'erreur dans les éléments sus-cités ou, dans le cas d'un changement de pièce, d'un retard de livraison ou d'une rupture de stock d'un de ses fournisseurs. Abcdépan'pc ne saurait être tenue pour responsable des éventuelles pertes de données durant la réparation. En cas de réparation atelier, dès que le client a été prévenu, celui-ci s'engage à récupérer ou à demander la remise en place de son matériel dans les 6 mois suivant la date où il aura été prévenu. Passé ce délai, Abcdépan'pc ne pourrait être tenue responsable de l'éventuelle perte ou destruction du matériel. Les frais de livraison ou de retour du matériel restent à la charge du client. Toutes les prestations seront effectuées aux tarifs en vigueur, dont le client reconnait avoir pris connaissance. Si, suite à un devis de réparation refusé, le client ne souhaite pas récupérer son matériel, ou s'il ne souhaite pas, en cas de réparation effectuée, conserver ses anciennes pièces, Abcdépan'pc se réserve le droit de disposer du matériel de n'importe quelle façon. Le client reconnait avoir pris connaissance des conditions sus-mentionnées et les accepte sans réserve.
          </td>
        </tr>
        <tr>
          <td width="50%">
            &nbsp;<br /><br />
            <b style="text-align:right;">
              <font size="+2">Signature</font>
            </b><br /><br />
            &nbsp;<br /><br />
          </td>
        </tr>
      </table>
    </fieldset>
    <br><br><br>

    <center><input type="button" id="printPageButton" onClick="window.print()" value="Imprimer cette page" />&nbsp;&nbsp;&nbsp;<input type="button" onclick="window.location.href = 'intervention_liste.php';" value="Retour" id="printPageButton"></center>
    <br /><br />

  </form>



</body>