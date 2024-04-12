<?php
$host = 'localhost';
$db = 'dskillzgestion';
$user = 'dskillz';
$pwd = 'root';

$conn = new mysqli("localhost", "dskillz", "root", "dskillzgestion");

// Check connection
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
} else {
  echo "Connection to database succes !";
}
?>