<?php
include 'data.php';
$checkmember= "SELECT * FROM members where leader=".$_SESSION['id']." and id=".$_POST['id'];
$result_member= $conn->query($checkmember);

if ($result_member->num_rows > 0) {
  while($row_member = $result_member->fetch_assoc()) {
				 $lname = $row_member["lname"];
				  $fname= $row_member["fname"];
				   $church= $row_member["church"];
				    $status= $row_member["status"];
					$contact= $row_member["contact"];
			

?>
                <div class="modal-body">
					<div class='form-group'>
					<label>First Name</label>
					<input class="form-control update-member-fname" type="text" value="<?php echo $fname;?>">
					</div>
					<div class='form-group'>
					<label>Last Name</label>
					<input class="form-control update-member-lname" type="text" value="<?php echo $lname;?>">
					</div>
					<div class='form-group'>
					<label>Contact</label>
					<input class="form-control update-member-contact" value="<?php echo $contact;?>" type="text">
					</div>
				
					
					
					
						<div class='form-group'>
					<label>Status</label>
					<select class="form-control update-member-status">
					<?php 
					if($status==1){
						?>
						<option value="1">Active</option>
							<option value="0">Deactivate</option>
						<?php
						
					}
					else{ 
						?>
												<option value="0">Deactivated</option>
							<option value="1">Activate</option>
						<?php
						
					}
					
					?>
					
					</select>
					
					</div>
					
					
					<div class='form-group'>
					<label>Church</label>
								
				<?php 
				
				

								
								
				   $mychurches = json_decode($user_church); 
				if(is_array($mychurches)){
					
					echo "<select class='form-control update-member-church'>";
									$checkchurch =  "SELECT * FROM churches where id=".$church;
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									echo "<option value='".$row_church['id']."'>".$row_church['name']."</option>";
								}
								}
								
								
				  for($i=0;$i < count($mychurches);$i++){
						   //echo $mychurches[$i];
								$checkchurch =  "SELECT * FROM churches where id=".$mychurches[$i];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									if($row_church['id']!=$church){
									echo "<option value='".$row_church['id']."'>".$row_church['name']."</option>";
									}
								}
								}
					   }
					   
				}
				else{
					echo "<select class='form-control member-church' disabled>";
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
					if($status==0){
						?>
				 <button class="btn btn-danger" type="button"   onclick="deletemember(<?php echo $row_member["id"];?>)">Delete</button>
				 <?php 
				 
				 
					}
					
					?>
					
					   <a class="btn btn-primary" onclick="updatemember(<?php echo $row_member["id"];?>)">Update</a>
				
				<hr>
				
				<?php
				
						$checkreferral= "SELECT * FROM referrals where member=".$row_member["id"]; 
					$result_referral= $conn->query($checkreferral);
					
					$request ="";
					
						$req_state ="";
					if($result_referral->num_rows > 0) {
						
								while($row_ref = $result_referral->fetch_assoc()) {
								$req_state  = $row_ref['status'];
								if($row_ref['leader']!=$_SESSION['id']){
									$checkleader= "SELECT * FROM users where id=".$row_ref['leader']; 
									$result_leader= $conn->query($checkleader);

										if ($result_leader->num_rows > 0) {
										while($row_refdata = $result_leader->fetch_assoc()) {
											
											if($row_ref['status']==0){
										$request = "Referral request to ".$row_refdata['fname']."  ".$row_refdata['lname']." is still <span class='text-warning'>Pending</span>";
											}
											else if($row_ref['status']==1){
												$request = "Recent referral request to ".$row_refdata['fname']."  ".$row_refdata['lname']." is <span class='text-success'>Accepted</span>";
										
											}
											else{
												
												$request = "Recent referral request to ".$row_refdata['fname']."  ".$row_refdata['lname']." is <span class='text-danger'>Rejected</span>";
											}
										}

									}
								}
									
								}
								echo $request;
					}
					
					
					if($req_state!=0 || $req_state==""){
						
					
					?>
				<div class='form-group'>
					<label>Refer to:</label>
					<select class="form-control refer-leader">
					
					<?php 
					$checkleader= "SELECT * FROM users"; 
					$result_leader= $conn->query($checkleader);

					if ($result_leader->num_rows > 0) {
					while($row_leader= $result_leader->fetch_assoc()) {
						 $mychurches = json_decode($row_leader['church']); 
						if(is_array($mychurches)){
							
							
										if (in_array($row_member["church"], $mychurches, TRUE))
										{
												if($row_leader['id']!=$_SESSION['id']){
											echo '<option value="'.$row_leader['id'].'">'.$row_leader['fname'].' '.$row_leader['lname'].'</option>';
												}
										}
						}
						else{
						 if($row_member["church"] == $row_leader['church']){
							if($row_leader['id']!=$_SESSION['id']){
								echo '<option value="'.$row_leader['id'].'">'.$row_leader['fname'].' '.$row_leader['lname'].'</option>';
							}
							
						 } 
							
						}
					}

					}
					?>
					</select>
				</div>
				<div class='form-group'>
					<label>Referral Type</label>
					<select class="form-control refer-type">
						<option value='1'>Temporary</option>
						<option value='2'>Permanent</option>
					</select>
					</div>
					
					<div class='form-group'>
					<label>Note</label>
					<textarea class='form-control refer-notes'></textarea>
					
					</div>
					 
					 <button class="btn btn-success" type="button" onclick='sendreferral(<?php echo $row_member["id"];?>)'>Send Request</button>
				<?php 
				
					}
					
					?>
				
				
				</div>
	
                <div class="modal-footer">
				
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					
                </div>
				
				
				<?php 
  }
				
				}
				else{
					
					echo 0;
				}