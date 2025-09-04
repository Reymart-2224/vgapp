  <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Victory Groups <button class='btn default-button '  data-toggle="modal" data-target="#addvg" > <i class='fa fa-plus'></i></button></h1>
						
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
					    <div class="col-sm-12">
<table class="table table-striped" id="vgtable"> 
<thead> 
	<tr> 
		<th>Name</th>
		<th>Day</th>
		<th>Time</th>
		
		<th>Church</th>
		
		<th>Status</th>
	</tr>
</thead>
      <tbody>              <?php 
					
$checkvg= "SELECT * FROM victory_group where leader=".$user_id." ORDER BY id DESC";
$result_vg = $conn->query($checkvg);

if ($result_vg->num_rows > 0) {
  while($row_vg = $result_vg->fetch_assoc()) {
				 $vg_name = ucfirst($row_vg["name"]);
				  $vg_day = ucfirst($row_vg["day"]);
			
				   	  
					  
					  	$checkchurch =  "SELECT * FROM churches where id=".$row_vg["church"];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									$churchname = $row_church['name'];
								}
								}
								
						 
						 $vg_start  = date("g:i a", strtotime($row_vg["time_start"]));
						 
						  $vg_end  = date("g:i a", strtotime($row_vg["time_end"]));
			
				  if($row_vg["status"]==1){
					  $vg_state = "<span class='text-success'>Active</span>";
				  }
				  else{
					    $vg_state = "<span class='text-danger'>Inactive</span>";
				  }
				  echo "<tr onclick='viewvg(".$row_vg["id"].")'><td>".$vg_name."</td><td>".$vg_day."</td>";
			
				  	 				  
				  echo "<td>".$vg_start." to ".$vg_end."</td><td>".$churchname."</td><td>".$vg_state."</td></tr>";
                                   
				  
				 
				
		
  }
  
}

?>
                       
    </tbody>    
       </table>    </div>            
                    </div>

               
                    

                </div>
				
				
   <!-- Logout Modal-->
    <div class="modal fade" id="addvg" tabindex="-1" role="dialog" aria-labelledby="addvgmodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">VG Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
			
                <div class="modal-body">
					<div class='form-group'>
					<label>Name</label>
					<input class="form-control vg-name" type="text">
					</div>
					<div class='form-group'>
					<label>Day</label>
					<select class="form-control vg-day">
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
					<input class="form-control vg-start" type="time">
					</div>
					<div class='form-group'>
					<label>End Time</label>
					<input class="form-control vg-end" type="time">
					</div>
					
			
					<div class='form-group'>
					<label>Church</label>
								
				<?php 
				
				   $mychurches = json_decode($user_church); 
				if(is_array($mychurches)){
					
					echo "<select class='form-control vg-church'>";
					echo "<option value='0'>Select church</option>";
				  for($i=0;$i < count($mychurches);$i++){
						   //echo $mychurches[$i];
								$checkchurch =  "SELECT * FROM churches where id=".$mychurches[$i];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									echo "<option value='".$row_church['id']."'>".$row_church['name']."</option>";
								}
								}
					   }
					   
				}
				else{
					echo "<select class='form-control vg-church' disabled>";
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
				<div class='form-group membersselection'>
					
				
				</div>
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
						echo '<input type="checkbox" class="vg-members" name="'.$member_name.'" value="'.$member_id.'">
						<label for="members">'.$member_name.'</label><br>';
						}
					}
					   
					?>
					
					</div>
					
					<?php 
					
				}
					?>
				
				
				
				
				
				
				
				
				
				</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="savevg()">Save</a>
                </div>
				
            </div>
        </div>
    </div>
 


    <div class="modal fade" id="viewvg" tabindex="-1" role="dialog" aria-labelledby="viewvgmodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">VG Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
				<div class='member-content'>
              
				</div>
            </div>
        </div>
    </div>
	
                <!-- /.container-fluid -->