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


$checkvg= "SELECT * FROM victory_group where id=".$_POST['id']." and leader=".$_SESSION['id'];
$result_vg = $conn->query($checkvg);

if ($result_vg->num_rows > 0) {
  while($row_vg = $result_vg->fetch_assoc()) {
				 $vg_name = $row_vg["name"];
				  $vg_day= $row_vg["day"];
				  $vg_start= $row_vg["time_start"];
				  $vg_end= $row_vg["time_end"];
				    $vg_members= $row_vg["members"];
					 $vg_church = $row_vg["church"];
					$vg_status= $row_vg["status"];
  $mymembers = json_decode($vg_members); 
?>

 <div class="modal-body"> 
					<div class='form-group'>
					<label>Name</label>
					<input class="form-control update-vg-name" type="text" value="<?php echo $vg_name;?>">
					</div>
					<div class='form-group'>
					<label>Day</label>
					<select class="form-control update-vg-day">
						<option value="<?php echo lcfirst($vg_day);?>" class='bg-primary text-light'><?php echo ucfirst($vg_day);?></option>
						
						
						
						<option value="monday">Monday</option>
						<option value="tuesday">Tuesday</option>
						<option value="wednesday">Wednesday</option>
						<option value="thursday">Thursday</option>
						<option value="friday">Friday</option>
						<option value="saturday">Saturday</option>
					</select>
					
					</div>
				
				<div class='form-group'>
					<label>Start Time</label>
					<input class="form-control update-vg-start" type="time" value="<?php echo $vg_start;?>">
					</div>
					<div class='form-group'>
					<label>End Time</label>
					<input class="form-control update-vg-end" type="time" value="<?php echo $vg_end;?>">
					</div>
					
			
					<div class='form-group'>
					<label>Church</label>
								
				<?php 
				
				   $mychurches = json_decode($user_church);
				   
				   
				if(is_array($mychurches)){
					
					echo "<select class='form-control update-vg-church' onchange='checkmembers(".$row_vg["id"].")'>";
					
					$checkchurch =  "SELECT * FROM churches where id=".$vg_church;
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									echo "<option value='".$row_church['id']."' class='bg-primary text-light'>".$row_church['name']."</option>";
								}
								}
					
					
				  for($i=0;$i < count($mychurches);$i++){
						   //echo $mychurches[$i];
								$checkchurch =  "SELECT * FROM churches where id=".$mychurches[$i];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									
									if($row_church['id']!=$vg_church){
									echo "<option value='".$row_church['id']."'>".$row_church['name']."</option>";
									}
								}
								}
					   }
					   
				}
				else{
					echo "<select class='form-control update-vg-church' disabled>";
					?>
					<option value="<?php echo $user_church;?>" >
					
					<?php 
					
					$checkchurch =  "SELECT * FROM churches where id=".$user_church;
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									echo $row_church['name'];
								}
								}
					
					?></option>
					
					<?php 
					
				}
				
				?>
				</select></div>
			
				<?php 
				
				if($user_type==3){
				?>
					<div class='form-group'>
					<label>Select Members</label><br>
					<?php 
					$checkmembers = "SELECT * FROM members where status=1 and leader=".$user_id." and church=".$user_church;
					$result_members = $conn->query($checkmembers);
					if ($result_members->num_rows > 0) {
						while($row_member = $result_members->fetch_assoc()) {
						$member_name = $row_member["fname"]." ".$row_member["lname"];
						$member_id = $row_member["id"];
						$checked ="";
							if(in_array($member_id,$mymembers)){
								$checked ="checked";	
							}
						echo '<input type="checkbox" class="update-vg-members" name="'.$member_name.'" value="'.$member_id.'" '.$checked.'>
						<label for="members">'.$member_name.'</label><br>';
						}
					}
					   
					?>
					
					</div>
					
					<?php 
					
				}
				else{
					?>
					
					
					
						<div class='update-membersselection'>
					<div class='form-group'>
					<label>Select Members</label><br>
					<?php 
					$checkmembers = "SELECT * FROM members where status=1 and leader=".$user_id." and church=".$vg_church;
					$result_members = $conn->query($checkmembers);
					if ($result_members->num_rows > 0) {
						while($row_member = $result_members->fetch_assoc()) {
						$member_name = $row_member["fname"]." ".$row_member["lname"];
						$member_id = $row_member["id"];
						$checked ="";
							if(in_array($member_id,$mymembers)){
								$checked ="checked";	
							}
						echo '<input type="checkbox" class="vg-members" name="'.$member_name.'" value="'.$member_id.'" '.$checked.'>
						<label for="members">'.$member_name.'</label><br>';
						}
					}
					   
					?>
					
					</div> 
					
				
				</div>
				
				<?php
					
					
				}
					?>
				
				
				
				
				
				<div class='form-group'>
					<label>Status</label>
					<select class="form-control update-vg-status">
					<?php 
					if($vg_status==1){
						?>
						<option value="1">Active</option>
							<option value="0">Deactivate</option>
						<?php
						
					}
					else{ 
						?>
												<option value="0">Inactive</option>
							<option value="1">Activate</option>
						<?php
						
					}
					
					?>
					
					</select>
					
					</div>
				
				
				
				</div>
				
				
				
                <div class="modal-footer">
					<?php 
					if($vg_status==0){
						?>
				 <button class="btn btn-danger" type="button" data-dismiss="modal"  onclick="deletevg(<?php echo $row_vg["id"];?>)">Delete</button>
				 <?php 
				 
				 
					}
					else{
				 ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<?php
						
					}
					
					?>
                    <a class="btn btn-primary" onclick="updatevg(<?php echo $row_vg["id"];?>)">Update</a>
                </div>
				
				
				<?php 
  }
				
				}
				else{
					
					echo 0;
				}