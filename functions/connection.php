<?php 
$domain = '/vgtrackingapp';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oesystem_wp"; 

date_default_timezone_set("Asia/Manila");
$date = date('Y-m-d');
$time = date('h:i:s a');

function generateRandomString($length = 4) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$randomcode = generateRandomString();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
