<?php
session_start();
include 'connection.php';

$checkpastor= "SELECT * FROM users where type=2 and id=".$_POST['id'];
$result_pastor = $conn->query($checkpastor);

if ($result_pastor->num_rows > 0) {
  while($row_pastor = $result_pastor->fetch_assoc()) {
				 $lname = $row_pastor["lname"];
				  $fname= $row_pastor["fname"];
				    $status= $row_pastor["status"];
					$pastor_username= $row_pastor["username"];
				$pastor_churches= $row_pastor["church"];
 $mychurches = json_decode($pastor_churches); 
?>
                <div class="modal-body">
					<div class='form-group'>
					<label>First Name</label>
					<input class="form-control update-pastor-fname" type="text" value="<?php echo $fname;?>">
					</div>
					<div class='form-group'>
					<label>Last Name</label>
					<input class="form-control update-pastor-lname" type="text" value="<?php echo $lname;?>">
					</div>
					<div class='form-group'>
					<label>Username/Email</label>
					<input class="form-control update-pastor-username" value="<?php echo $pastor_username;?>" type="email">
					</div>
					<div class='form-group'>
					<label>Password</label>
					<input class="form-control update-pastor-password" type="password">
					</div>
					<div class='form-group'>
					<label>Church Assignment</label><br>
					<?php 
					$checkchurches= "SELECT * FROM churches where status = 1";
					$result_churches = $conn->query($checkchurches);

					if ($result_churches->num_rows > 0) {
						while($row_church = $result_churches->fetch_assoc()) {
						$church_name = $row_church["name"];
						$church_id = $row_church["id"];
						$checked ="";
						if (in_array($church_id, $mychurches, TRUE))
						{	
							$checked ="checked";
						}
						echo '<input type="checkbox" class="update-churches" name="'.$church_name.'" value="'.$church_id.'" '.$checked.'>
						<label for="churches">'.$church_name.'</label><br>';
						
						//echo $pastor_churches[1];
						}
					}
					?>
					
					</div>
					
					
						<div class='form-group'>
					<label>Status</label>
					<select class="form-control update-pastor-status">
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
				 <button class="btn btn-danger" type="button" data-dismiss="modal"  onclick="deletepastor(<?php echo $row_pastor["id"];?>)">Delete</button>
				 <?php 
				 
				 
					}
					else{
				 ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<?php
						 
					}
					
					?>
                    <a class="btn btn-primary" onclick="updatepastor(<?php echo $row_pastor["id"];?>)">Update</a>
                </div>
				
				
				<?php 
  }
				
				}
				else{
					
					echo 0;
				}