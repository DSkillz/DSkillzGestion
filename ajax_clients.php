<?php
if(isset($_GET['gettxt'])) {
        // Mot tapé par l'utilisateur
        $txtCli = $_GET['gettxt']; 
		$txtiso = htmlentities($txtCli, ENT_QUOTES,'ISO-8859-15',true);
        include('connect.php');
 
        // Requête SQL
        $requete = mysqli_query($conn, "SELECT * FROM clients WHERE cli_nom LIKE '%$txtCli%' LIMIT 15") or die('Erreur SQL !'.$requete.'<br>'.mysqli_error());
		
 		$array = array();
		//$array = array('<foo>',"'bar'",'"baz"','&blong&', "\xc3\xa9");
        // On parcourt les résultats de la requête SQL
        while($donnees = mysqli_fetch_array($requete)) {
            // On ajoute les données dans un tableau
			$data = " | " .$donnees['cli_id']. " | " .htmlentities($donnees['cli_nom'], ENT_QUOTES,'ISO-8859-15',true). " | " .$donnees['cli_tel1']. " | " .$donnees['cli_tel2']. " | ".$donnees['cli_tel3']. " | ";
			array_push($array, $data);            
			
        }
 
        // On renvoie le données au format JSON pour le plugin
        echo html_entity_decode(json_encode($array) ,ENT_COMPAT,'UTF-8');

}

?>