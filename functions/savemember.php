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

$fname = $_POST['fname'];
 $church = $_POST['church'];
$lname = $_POST['lname'];
$contact = $_POST['contact'];
$checkuser = "SELECT * FROM members where fname = '".$fname."' and lname = '".$lname."' and leader = ".$_SESSION['id'];
$result = $conn->query($checkuser);


if ($result->num_rows > 0) {
echo 2;

}
else{
		   $mychurches = json_decode($user_church); 
				
	
	if(is_array($mychurches)){
				if(in_array($church,$mychurches)){
			$sql = "INSERT INTO members (fname, lname,date,church,leader,contact)
			VALUES ('".$fname."', '".$lname."','".$date."',".$church.",".$_SESSION['id'].",'".$contact."')";

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
			$sql = "INSERT INTO members (fname, lname,date,church,leader,contact)
			VALUES ('".$fname."', '".$lname."','".$date."',".$church.",".$_SESSION['id'].",'".$contact."')";

			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else { 
		  echo "Error: " . $sql . "<br>" . $conn->error;
			
			}
		}
		else{
			
			echo 0;
		}
		
		
	}

	
}



