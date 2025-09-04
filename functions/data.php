<?php
session_start();
include 'connection.php';
$user_id = $_SESSION['id'];
 
$user_code = $_SESSION['code'];
$checkuser = "SELECT * FROM users where id = ".$user_id." and code = '".$user_code."'";
$result = $conn->query($checkuser);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
				 $user_type = $row["type"];
				  $user_church= $row["church"];
				   $user_status= $row["status"];
				   $user_fname = $row["fname"];
				   $user_lname = $row["lname"];
				$user_id = $row["id"];
		
  }
  
}
else{
	
	header('Location: ../functions/logout.php');
	
}



