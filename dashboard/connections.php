<?php 
$domain = '/vgtrackingapp';
$servername = "localhost";
$username = "oesystem_wp";
$password = "qazwsx0421++";
$dbname = "oesystem_wp"; 

date_default_timezone_set("Asia/Manila");
$date = date('Y-m-d');
$time = date('h:i:s a');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
