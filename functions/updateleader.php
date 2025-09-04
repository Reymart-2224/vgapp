<?php
session_start();
include 'connection.php';

if($_SESSION['type']==1){
$username = $_POST['username'];
 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password = $_POST['password'];
$status = $_POST['status'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$id = $_POST['id'];
$churchIds =$_POST['churchIds'];
$checkleader = "SELECT * FROM users where  username='".$username."'";
$result = $conn->query($checkleader);

$checking = 0;
if ($result->num_rows > 0) {
				while($row_leader = $result->fetch_assoc()) {
				if($id!=$row_leader["id"] && $username==$row_leader["username"]){
				$checking = 1;
				}	

				}
			if($checking ==1){
			echo 2;

			}
			else{ 
				
				if(strlen($password)==0){
									$sql = "UPDATE users SET fname='".$fname."',lname='".$lname."',username='".$username."',church='".$churchIds."',status='".$status."' WHERE id=".$id;
			
				}
				else{
							$sql = "UPDATE users SET fname='".$fname."',lname='".$lname."',username='".$username."',password='".$password."',church='".$churchIds."',status='".$status."' WHERE id=".$id;
				}
	


			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
			echo 0;
			}

			}
}
else{
	
	
		if(strlen($password)==0){
									$sql = "UPDATE users SET fname='".$fname."',lname='".$lname."',username='".$username."',church='".$churchIds."',status='".$status."' WHERE id=".$id;
			
				}
				else{
							$sql = "UPDATE users SET fname='".$fname."',lname='".$lname."',username='".$username."',password='".$password."',church='".$churchIds."',status='".$status."' WHERE id=".$id;
				}

			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
			echo 0;
			}

	
}



}