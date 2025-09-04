<?php
session_start();
include 'connection.php';

if($_SESSION['type']==1){
$fname = $_POST['fname'];
 
$lname = $_POST['lname'];
$username = $_POST['username'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$churchIds =$_POST['churchIds'];

$checkuser = "SELECT * FROM users where username = '".$username."'";
$result = $conn->query($checkuser);


if ($result->num_rows > 0) {
echo 2;

}
else{
	
	
			$sql = "INSERT INTO users (fname, lname, username,password,type,code,date,church,status)
			VALUES ('".$fname."', '".$lname."','".$username."','".$hashed_password."',3,'".$randomcode."','".$date."','".$churchIds."',1)";

			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
			echo 0;
			}

	
}


}
