<?php
session_start();
include '../functions/connection.php';

$password = $_POST['password'];
 
$username = $_POST['username'];
//$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$checkuser = "SELECT * FROM users where username = '".$username."'";
$result = $conn->query($checkuser);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  $isPasswordCorrect = password_verify($password, $row["password"]);
			if($isPasswordCorrect){
				 $_SESSION['code'] = $row["code"];
				  $_SESSION['id'] = $row["id"];
				 $_SESSION['type'] = $row["type"];
					echo 1;
			}
			else{
			echo 0;
			}
  }
  
}
else{
	
	echo 0;
	
}



