<?php
session_start();
include 'connection.php';

if($_SESSION['type']==1){
$name = $_POST['name'];
 
$address = $_POST['address'];
$status = $_POST['status'];
//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$id = $_POST['id'];

$checkchurch = "SELECT * FROM churches where  name='".$name."'";
$result = $conn->query($checkchurch);

$checking = 0;
if ($result->num_rows > 0) {
				while($row_church = $result->fetch_assoc()) {
				if($id!=$row_church["id"] && $name==$row_church["name"]){
				$checking = 1;
				}	

				}
			if($checking ==1){
			echo 2;

			}
			else{
			$sql = "UPDATE churches SET name='".$name."',address='".$address."',status='".$status."' WHERE id=".$id;


			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
			echo 0;
			}

			}
}
else{
	
	
	$sql = "UPDATE churches SET name='".$name."',address='".$address."',status='".$status."' WHERE id=".$id;
		

			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
			echo 0;
			}

	
}



}