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
 $church = $_POST['id'];
 
  $vgid = $_POST['vgid'];
   
  
  
$checkvg= "SELECT * FROM victory_group where id=".$vgid." and leader=".$_SESSION['id'];
$result_vg = $conn->query($checkvg);

if ($result_vg->num_rows > 0) {
  while($row_vg = $result_vg->fetch_assoc()) {
	   $vg_members = $row_vg["members"];
  }
  
}
$mymembers = json_decode($vg_members); 
 	$mychurches = json_decode($user_church); 
				
	
	if(is_array($mychurches)){
		if(in_array($church,$mychurches)){
			
		
			
			$checkmembers = "SELECT * FROM members where status=1 and leader=".$user_id." and church=".$church;
					$result_members = $conn->query($checkmembers);
$churchcount =0;

					if ($result_members->num_rows > 0) {
						while($row_member = $result_members->fetch_assoc()) {
							$checked ="";
							if(in_array($row_member["id"],$mymembers)){
								$checked ="checked";	
							}
							
								$churchcount =1;
						$member_name = $row_member["fname"]." ".$row_member["lname"];
						$member_id = $row_member["id"];
						echo '<input type="checkbox" class="update-vg-members" name="'.$member_name.'" value="'.$member_id.'" '.$checked.'>
						<label for="members">'.$member_name.'</label><br>';
						
							
						}
					}
					
					if($churchcount==0){
						echo "Please add a vg member";
					}
					
			
					   
				}
							 
			
		
		else{
			echo 0;
		}
		
	}
	else{
		
		if($church==$user_church){
				$checkmembers = "SELECT * FROM members where status = 1 and leader=".$user_id." and church=".$church;
					$result_members = $conn->query($checkmembers);

					if ($result_members->num_rows > 0) {
						while($row_member = $result_members->fetch_assoc()) {
						$member_name = $row_member["fname"]." ".$row_member["lname"];
						$member_id = $row_member["id"];
						echo '<input type="checkbox" class="update-vg-members" name="'.$member_name.'" value="'.$member_id.'">
						<label for="members">'.$member_name.'</label><br>';
						}
					}
					   
			
		}
		
		else{
			echo 0;
		}
		
	}