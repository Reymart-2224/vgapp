<?php
session_start();
include 'connection.php';
$user_id = $_SESSION['id'];
 
$user_code = $_SESSION['code'];
$checkuser = "SELECT * FROM users where id = ".$user_id." and code = '".$user_code."'";
$result = $conn->query($checkuser);

if ($result->num_rows > 0) {

$id = $_POST['id'];
$type = $_POST['type'];
$checkreferral = "SELECT * FROM referrals where  id=".$id." and leader=".$user_id." and status=0";
$result = $conn->query($checkreferral);
$referral_type = 1;
if ($result->num_rows > 0) {
	
	if($type == 1){
				while($row_referral = $result->fetch_assoc()) {
					$memberid = $row_referral['member'];
					$referral_type = $row_referral['type'];
				}
		
		if($referral_type == 2){
			$sql = "UPDATE members SET leader=".$user_id." WHERE id=".$memberid;


			if ($conn->query($sql) === TRUE) {
						$sql = "UPDATE referrals SET status=".$type." WHERE id=".$id;


						if ($conn->query($sql) === TRUE) {
						echo 1;
						} else {
						echo 0;
						}
			} else {
			echo 0;
			}
			
		}
		else{
			$sql = "UPDATE referrals SET status=".$type." WHERE id=".$id;


			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
			echo 0;
			}
			
		}
		
	}
		
	else{
			$sql = "UPDATE referrals SET status=".$type." WHERE id=".$id;


			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
			echo 0;
			}
			
	}
 
			
}
else{
	
		echo 0;

	
}



}