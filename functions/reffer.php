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
				
		
  }
  
}

$type = $_POST['type'];
 
$leader = $_POST['leader'];
$id = $_POST['id'];
$notes = $_POST['notes'];
$checkuser = "SELECT * FROM referrals where member = ".$id."  and status = 0";
$result = $conn->query($checkuser);


if ($result->num_rows > 0) {
echo 2;

}
else{
	
	
			$sql = "INSERT INTO referrals (member, leader,from_leader,notes,date,type)
			VALUES (".$id.", ".$leader.",".$user_id.",'".$notes."','".$date."','".$type."')";

			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
			echo 0;
			}

	
}



