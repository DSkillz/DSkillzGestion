<?php
$host = 'localhost';
$db = 'dskillz';
$user = 'root';
$pwd = 'Tech1337DSkillz';
$conn = null;
  try {
    $conn =  new mysqli($host, $user, $pwd, $db);
    // $pdo = new PDO("mysql:host=$host; dbname=$db;", $user, $pwd);
    // console_log("Connected to $db at $host successfully !");
  } catch (mysqli_sql_exception $e) {
    echo "Erreur!:" . $e->getMessage() . "<br/>";
    die();
  }
?>