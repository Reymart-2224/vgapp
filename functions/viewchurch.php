<?php
session_start();
include 'connection.php';

$checkchurches= "SELECT * FROM churches where id=".$_POST['id'];
$result_churches = $conn->query($checkchurches);

if ($result_churches->num_rows > 0) {
  while($row_church = $result_churches->fetch_assoc()) {
				 $church_name = $row_church["name"];
				  $church_status= $row_church["status"];
				    $church_address= $row_church["address"];

?>

<div class="modal-body">
					<div class='form-group'>
					<label>Church Name</label>
					<input class="form-control update-church-name" type="text" value="<?php echo $church_name;?>">
					</div>
					<div class='form-group'>
					<label>Address</label>
					<input class="form-control update-church-address" type="text" value="<?php echo $church_address;?>">
					</div>
					<div class='form-group'>
					<label>Status</label>
					<select class="form-control update-church-status">
					<?php 
					if($church_status==1){
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
					if($church_status==0){
						?>
				 <button class="btn btn-danger" type="button" data-dismiss="modal"  onclick="deletechurch(<?php echo $row_church["id"];?>)">Delete</button>
				 <?php 
				 
				 
					}
					else{
				 ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<?php
						
					}
					
					?>
                    <a class="btn btn-primary" onclick="updatechurch(<?php echo $row_church["id"];?>)">Update</a>
                </div>
				
				
				<?php 
  }
				
				}
				else{
					
					echo 0;
				}