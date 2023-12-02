<?php
$host = "localhost";
$username ="root";
$dbpassword = "";
$dbname="antrelic";
//connecton to databases

$conn = mysqli_connect($host, $username, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  ?>