<?php
session_start();
include 'connection.php';
if($_SESSION['type']==1){
$name = $_POST['name'];
 
$address = $_POST['address'];
//$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$checkchurch = "SELECT * FROM churches where name = '".$name."'";
$result = $conn->query($checkchurch);


if ($result->num_rows > 0) {
echo 2;

}
else{
			$sql = "INSERT INTO churches (name, address, date,time)
			VALUES ('".$name."', '".$address."','".$date."','".$time."')";

			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
			echo 0;
			}

	
}


}
