<?php
session_start();
include 'connection.php';
$user_id = $_SESSION['id'];
 
$user_code = $_SESSION['code'];
$checkuser = "SELECT * FROM users where id = ".$user_id." and code = '".$user_code."'";
$result = $conn->query($checkuser);

if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
				 $user_type = $row["type"];
				  $user_church= $row["church"];
				   $user_status= $row["status"];
				   $user_fname = $row["fname"];
				   $user_lname = $row["lname"];
					 $user_type = $row["type"];
		 
  } 
  
}


	
	
if(isset($_SESSION['type'])){
$name = $_POST['name'];
 $members = $_POST['members'];
$day = $_POST['day'];
$start = $_POST['start'];
$end = $_POST['end'];
$church = $_POST['church']; 
//$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$checkvg = "SELECT * FROM victory_group where  name='".$name."' and leader=".$user_id." and church=".$church;
$result = $conn->query($checkvg);


if ($result->num_rows > 0) {
echo 2;

}
else{
	
	   $mychurches = json_decode($user_church); 
				
	
	if(is_array($mychurches)){
		
		if(in_array($church,$mychurches)){
			$sql = "INSERT INTO victory_group (name, day,time_start,time_end, created,leader,church,members)
			VALUES ('".$name."', '".$day."','".$start."','".$end."','".$date."',".$user_id.",".$church.",'".$members."')";

			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
		}
		
	else{
		
			echo 3;
	}
		
	}
	
else{
	
		if($church==$user_church){
			$sql = "INSERT INTO victory_group (name, day,time_start,time_end, created,leader,church,members)
			VALUES ('".$name."', '".$day."','".$start."','".$end."','".$date."',".$user_id.",".$church.",'".$members."')";
			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		else {
			echo 0;
			}
}
	
}


}
