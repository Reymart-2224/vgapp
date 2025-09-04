<?php
session_start();
include 'connection.php';

$checkleader= "SELECT * FROM users where type=3 and id=".$_POST['id'];
$result_leader = $conn->query($checkleader);

if ($result_leader->num_rows > 0) {
  while($row_leader = $result_leader->fetch_assoc()) {
				 $lname = $row_leader["lname"];
				  $fname= $row_leader["fname"];
				    $status= $row_leader["status"];
					$leader_username= $row_leader["username"];
				$leader_church= $row_leader["church"];

?>
                <div class="modal-body">
					<div class='form-group'>
					<label>First Name</label>
					<input class="form-control update-leader-fname" type="text" value="<?php echo $fname;?>">
					</div>
					<div class='form-group'>
					<label>Last Name</label>
					<input class="form-control update-leader-lname" type="text" value="<?php echo $lname;?>">
					</div>
					<div class='form-group'>
					<label>Username/Email</label>
					<input class="form-control update-leader-username" value="<?php echo $leader_username;?>" type="email">
					</div>
					<div class='form-group'>
					<label>Password</label>
					<input class="form-control update-leader-password" type="password">
					</div>
					<div class='form-group'>
					<label>Church</label><br>
					<select class="form-control update-leader-church" >
					<?php 
					
						$checkchurches= "SELECT * FROM churches where status = 1 and id=".$leader_church;
					$result_churches = $conn->query($checkchurches);
					if ($result_churches->num_rows > 0) {
						while($row_church = $result_churches->fetch_assoc()) {
						$church_name = $row_church["name"];
						$church_id = $row_church["id"];
						 
						
						echo ' <option value="'.$church_id.'">'.$church_name.'</option>';
					
						}
					}
					
					
					$checkchurches= "SELECT * FROM churches where status = 1";
					$result_churches = $conn->query($checkchurches);
					
					if ($result_churches->num_rows > 0) {
						while($row_church = $result_churches->fetch_assoc()) {
						$church_name = $row_church["name"];
						$church_id = $row_church["id"];
						 
						if($church_id  != $leader_church)
						
						{	
						echo ' <option value="'.$church_id.'">'.$church_name.'</option>';
						}
						//echo $pastor_churches[1];
						}
					}
					?>
					</select>
					</div>
					
					
						<div class='form-group'>
					<label>Status</label>
					<select class="form-control update-leader-status">
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
				</div>
				
	
                <div class="modal-footer">
					<?php 
					if($status==0){
						?>
				 <button class="btn btn-danger" type="button" data-dismiss="modal"  onclick="deleteleader(<?php echo $row_leader["id"];?>)">Delete</button>
				 <?php 
				 
				 
					}
					else{
				 ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<?php
						 
					}
					
					?>
                    <a class="btn btn-primary" onclick="updateleader(<?php echo $row_leader["id"];?>)">Update</a>
                </div>
				
				
				<?php 
  }
				
				}
				else{
					
					echo 0;
				}