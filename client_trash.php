<?php
require('connect.php');
require('consolelog.php');

// Move to Trash in BDD
if (isset($_POST['indexes'])) {

    $str_indexes = $_POST['indexes'];

    console_log($str_indexes);

    // On créé la requête

    $integerIDs = array_map('intval', explode(',', $str_indexes));

    console_log($integerIDs);

    $req = "UPDATE clients SET inTrash = 1 WHERE WHERE cli_id IN (' . implode(',', array_map('intval', $integerIDs)) . ')";

    // on exécute la requête
    $marklientsToTrash = $conn->query($req);
};

?>