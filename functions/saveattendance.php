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

 $id = $_POST['id'];
$checkuser = "SELECT * FROM victory_group where leader = ".$user_id." and id=".$id;
$result = $conn->query($checkuser);

if ($result->num_rows > 0) {
	
	  while($row = $result->fetch_assoc()) {
		  $vgmembers = $row["members"];
		  
	  }
 $attendees = $_POST['members'];
  $members = json_decode($vgmembers); 
   $attendees = $_POST['members'];
    $attendees2 = json_decode($attendees); 
  $referrals = $_POST['referrals'];
    $referralsid = $_POST['referralsid'];
   $referralsid = json_decode($referralsid); 
  $sql = "INSERT INTO attendance (vg_id, attendees,referrals,date, time,leader)
			VALUES (".$id.", '".$attendees."','".$referrals."','".$date."','".$time."',".$user_id.")";

			if ($conn->query($sql) === TRUE) {
			
				if(is_array($referralsid)){
					  for($i=0;$i < count($referralsid);$i++){
								$sql = "UPDATE referrals SET indicator=1 WHERE id=".$referralsid[$i];


								if ($conn->query($sql) === TRUE) {
								
								}
						  
					  }
			
					
				}
				
		 		if(is_array($members)){
					
					  for($i=0;$i < count($members);$i++){
						  
						  if(!(in_array($members[$i],$attendees2))){
							 
						  $checkuser2 = "SELECT * FROM members where leader = ".$user_id." and id=".$members[$i];
$result2 = $conn->query($checkuser2);

if ($result2->num_rows > 0) {
		
	  while($row2 = $result2->fetch_assoc()) {
	
		   $attendance_status = $row2['attendance_status'];
		   if($attendance_status!=0){
		   $attendance_status = $attendance_status-1;
							  $sql = "UPDATE members SET attendance_status=".$attendance_status." WHERE id=".$members[$i];


								if ($conn->query($sql) === TRUE) {
									 
								}
								}
	  }
						  }
						  
						  
							  	  $checkuser2 = "SELECT * FROM members where leader = ".$user_id." and id=".$members[$i];
$result2 = $conn->query($checkuser2);

if ($result2->num_rows > 0) {
	
	  while($row2 = $result2->fetch_assoc()) {
		  
		   $indicator = $row2['indicator'];
		   if($indicator!=2){
		   $indicator = $indicator+1;
		   
							  $sql = "UPDATE members SET indicator=".$indicator." WHERE id=".$members[$i];


								if ($conn->query($sql) === TRUE) {
								
								}
								
		   }
	  }
						  }
						  
						  
						  }else{
							  
							  
							  			  $checkuser2 = "SELECT * FROM members where leader = ".$user_id." and id=".$members[$i];
$result2 = $conn->query($checkuser2);

if ($result2->num_rows > 0) {
		
	  while($row2 = $result2->fetch_assoc()) {
	
		   $attendance_status = $row2['attendance_status'];
		   if($attendance_status!=3){
		   $attendance_status = $attendance_status+1;
							  $sql = "UPDATE members SET attendance_status=".$attendance_status." WHERE id=".$members[$i];


								if ($conn->query($sql) === TRUE) {
									 
								}
								}
	  }
						  }
						  
						  
							  
							  	  $checkuser2 = "SELECT * FROM members where leader = ".$user_id." and id=".$members[$i];
$result2 = $conn->query($checkuser2);

if ($result2->num_rows > 0) {
	
	  while($row2 = $result2->fetch_assoc()) {
		  
		   $indicator = $row2['indicator'];
		   if($indicator!=0){
		   $indicator = $indicator-1;
		   
							  $sql = "UPDATE members SET indicator=".$indicator." WHERE id=".$members[$i];


								if ($conn->query($sql) === TRUE) {
								
								}
								
		   }
	  }
						  }
						  
						  
							  
						  }
								
						  
					  }
			
					
				}
				
				
				
				
					echo 1;
					
				
					   

					   
			} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
			}
			


}

	
	