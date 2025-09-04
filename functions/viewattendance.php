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

  $checkattendance= "SELECT * FROM attendance where leader=".$_SESSION['id']." and id=".$_POST['id']." ORDER BY id DESC";
$result_attendance = $conn->query($checkattendance);
if ($result_attendance->num_rows > 0) {
  while($row_attendance = $result_attendance->fetch_assoc()) {
	  	$referrals= json_decode($row_attendance['referrals']); 
	  	   	$vg_referrals= count(json_decode($row_attendance['referrals'])); 
 	$vg_attendees = count(json_decode($row_attendance['attendees'])); 
	  
$checkvg= "SELECT * FROM victory_group where id=".$row_attendance['vg_id']." and leader=".$_SESSION['id'];
$result_vg = $conn->query($checkvg);

if ($result_vg->num_rows > 0) {
  while($row_vg = $result_vg->fetch_assoc()) {
				 $vg_name = $row_vg["name"];
				  $vg_day= $row_vg["day"]; 
				  $vg_start= $row_vg["time_start"];
				  $vg_end= $row_vg["time_end"];
				    $vg_members= $row_vg["members"];
					 $church = $row_vg["church"];
					$vg_status= $row_vg["status"];
  $members = json_decode($vg_members); 
  



		
  }
}
	
	
		$checkvg= "SELECT * FROM churches where id=".$church." ORDER BY id DESC";
		$result_checkvg= $conn->query($checkvg);
		if ($result_checkvg->num_rows > 0) {
		while($row_checkvg = $result_checkvg->fetch_assoc()) {
	$vg_church= ucfirst($row_checkvg['name']); 

		}
		}

		
			
		$a =0;
		if(is_array($members)){
					
					  for($i=0;$i < count($members);$i++){
						  if(!(in_array($members[$i],json_decode($row_attendance['attendees'])))){
							  $a = $a+1;
						  }
						  
					  }
		}
		
		
		
  
  echo " <div class='modal-body'> ";
  echo "<span class='vgname'>VG Name : ".ucfirst($vg_name)."</span><br>";
    echo "<span class='vgname'>VG Church : ".ucfirst($vg_church)."</span><br>";
	    echo "<span class='vgname'>Date : ".ucfirst($vg_day)." ".$row_attendance['date']." ".$row_attendance['time']."</span><br>";
  echo "<span class='vgname'>Attended : ".ucfirst($vg_attendees)."</span><br>";
  echo "<span class='vgname'>Referrals : ".ucfirst($vg_referrals)."</span><br>";
  echo "<span class='vgname'>Absent: ".ucfirst($a)."</span><hr>";
  
    echo "<span class='vgname'>Attended :</span><br><ul>";
			
		 for($i=0;$i < count($members);$i++){
		$checkattendee= "SELECT * FROM members where id=".$members[$i]." ORDER BY id DESC";
		$result_checkattendee= $conn->query($checkattendee);
		if ($result_checkattendee->num_rows > 0) {
		while($row_attendee = $result_checkattendee->fetch_assoc()) {
			if(in_array($row_attendee['id'],json_decode($row_attendance['attendees']))){
							 echo "<li>".ucfirst($row_attendee['fname'])." ".ucfirst($row_attendee['lname'])."</li>";
						  }
	

		} 
		}
		 } 
		 
		 
		 for($i=0;$i < count($referrals);$i++){
		$checkattendee= "SELECT * FROM members where id=".$referrals[$i]." ORDER BY id DESC";
		$result_checkattendee= $conn->query($checkattendee);
		if ($result_checkattendee->num_rows > 0) {
		while($row_attendee = $result_checkattendee->fetch_assoc()) {
			if(in_array($row_attendee['id'],json_decode($row_attendance['referrals']))){
							 echo "<li>".ucfirst($row_attendee['fname'])." ".ucfirst($row_attendee['lname'])."</li>";
						  }
	

		} 
		}
		 }
		
		
		
					  
			if($a!=0){
	echo "</ul><hr>Absent<ul>";
		 for($i=0;$i < count($members);$i++){
		$checkattendee= "SELECT * FROM members where id=".$members[$i]." ORDER BY id DESC";
		$result_checkattendee= $conn->query($checkattendee);
		if ($result_checkattendee->num_rows > 0) {
		while($row_attendee = $result_checkattendee->fetch_assoc()) {
			if(!(in_array($row_attendee['id'],json_decode($row_attendance['attendees'])))){
							 echo "<li>".ucfirst($row_attendee['fname'])." ".ucfirst($row_attendee['lname'])."</li>";
						  }
	

		} 
		}
		
		 }
		 
			}
		
	    echo "</ul>";
  echo "</div>";
  }
}

  else{
	  
	  
	  
	  echo 0;
  }