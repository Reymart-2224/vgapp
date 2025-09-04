<?php
session_start();
include 'connection.php';

$checkmember= "SELECT * FROM members where leader=".$_SESSION['id']." and id=".$_POST['id'];
$result_member= $conn->query($checkmember);

if ($result_member->num_rows > 0) {

 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$contact = $_POST['contact'];
$status = $_POST['status'];
$id = $_POST['id'];
 $church = $_POST['church'];

	
	
 $mychurches = json_decode($user_church); 
				
	
	if(is_array($mychurches)){
				if(in_array($church,$mychurches)){
					
	$sql = "UPDATE members SET fname='".$fname."',lname='".$lname."',contact='".$contact."',status=".$status.",church=".$church." WHERE id=".$id;
			
				
					
			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
			echo 0;
			}

				}
				else{
					
						echo 0;
				}
				
	}
	else{
		
		$sql = "UPDATE members SET fname='".$fname."',lname='".$lname."',contact='".$contact."',status=".$status.",church=".$church." WHERE id=".$id;
			
				
					
			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
			echo 0;
			}
		
		
	}
	


 


}