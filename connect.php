<?php
$host = 'db5007388847.hosting-data.io';
$db = 'dbs6088556';
$user = 'dbu398613';
$pwd = 'Tech1337db(#-/+&1337db)';
$conn = null;
  try {
    $conn = new PDO("mysql:host=$host; dbname=$db;", $user, $pwd);
    console_log("Connected to $db at $host successfully !");
  } catch (PDOException $e) {
    echo "Erreur!:" . $e->getMessage() . "<br/>";
    die();
  }
?>