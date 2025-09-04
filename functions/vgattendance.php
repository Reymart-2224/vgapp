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


$checkvg= "SELECT * FROM victory_group where id=".$_POST['id']." and status=1 and leader=".$_SESSION['id'];
$result_vg = $conn->query($checkvg);

if ($result_vg->num_rows > 0) {
  while($row_vg = $result_vg->fetch_assoc()) {
				 $vg_name = $row_vg["name"];

 $vg_members= $row_vg["members"];
	$vg_church= $row_vg["church"];				 
  $mymembers = json_decode($vg_members); 

?>

				 <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel"><?php echo $vg_name;?></h5>
			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
			</button>
			</div>

			<div class="modal-body"> 
<label>My Group</label><br>
	<?php 
					$checkmembers = "SELECT * FROM members where status=1 and leader=".$user_id." and church=".$vg_church;
					$result_members = $conn->query($checkmembers);
					if ($result_members->num_rows > 0) {
						while($row_member = $result_members->fetch_assoc()) {
						$member_name = $row_member["fname"]." ".$row_member["lname"];
						$member_id = $row_member["id"];
						$checked ="";
						
						echo '<input type="checkbox" class="vg-members" name="'.$member_name.'" value="'.$member_id.'" '.$checked.'>
						<label for="members">'.$member_name.'</label><br>';
						}
					}
					   
					?>
					
					
					
					<?php 
					 
			$referrals = "SELECT * FROM referrals where status=1 and type=1 and leader=".$user_id." and indicator=0";
			$result_referrals = $conn->query($referrals);
			if ($result_referrals->num_rows > 0) {
				
				echo "<label>Referrals</label><br>";
					while($row_referrals = $result_referrals->fetch_assoc()) {
					$checkmembers = "SELECT * FROM members where status=1 and id=".$row_referrals['member'];
					$result_members = $conn->query($checkmembers);
					if ($result_members->num_rows > 0) {
						while($row_member = $result_members->fetch_assoc()) {
						$member_name = $row_member["fname"]." ".$row_member["lname"];
						$member_id = $row_member["id"];
						
						echo '<input type="checkbox" class="vg-referrals" name="'.$member_name.'"   dataid="'.$row_referrals['id'].'" value="'.$member_id.'" '.$checked.'>
						<label for="members">'.$member_name.'</label><br>';
						}
					}
					   
					} 
			}
					?>

			</div>


			<div class="modal-footer">
			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			<a class="btn btn-primary" onclick="saveattendance(<?php echo $row_vg["id"];?>)">Save Attendance</a>


			</div>
			
			<?php 
			
  }
  
}
else{
	
	echo 0;
	
}

?>