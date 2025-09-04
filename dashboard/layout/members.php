  <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Members <button class='btn default-button '  data-toggle="modal" data-target="#addmember" > <i class='fa fa-plus'></i></button></h1>
						
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
					    <div class="col-sm-12">
<table class="table table-striped" id="membertable"> 
<thead> 
	<tr> 
		<th>Name</th>
		<th>Contact No.</th>
		<th>VG Attendance</th>
		<th>Church</th>
		<th>Account Status</th>
		
	</tr>
</thead>
      <tbody>              <?php 
					
$checkmember= "SELECT * FROM members where leader=".$user_id." ORDER BY id DESC";
$result_members = $conn->query($checkmember);

if ($result_members->num_rows > 0) {
  while($row_member = $result_members->fetch_assoc()) {
				 $member_fname = ucfirst($row_member["fname"]);
				  $member_lname = ucfirst($row_member["lname"]);
			
				   	$checkchurch =  "SELECT * FROM churches where id=".$row_member["church"];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									$churchname = $row_church['name'];
								}
								}
								
								
				  $member_contact = ucfirst($row_member["contact"]);
				  if($row_member["attendance_status"]==3){
					  $member_attendance= "<span class='text-success'>Active</span>";
				  }
				 else if($row_member["attendance_status"]==2){
					    $member_attendance = "<span class='text-warning'>Reach Out</span>";
				  }
		else{
			
			$member_attendance = "<span class='text-danger'>Inactive</span>";
		}
				  if($row_member["status"]==1){
					  $member_state = "<span class='text-success'>Active</span>";
				  }
				  else{
					    $member_state = "<span class='text-danger'>Inactive</span>";
				  }
				  echo "<tr onclick='viewmember(".$row_member["id"].")'><td>".$member_fname." ".$member_lname."</td>";
			
				  	 				  
				  echo "<td>".$member_contact."</td><td>".$member_attendance."</td><td>".$churchname."</td><td>".$member_state."</td></tr>";
                                   
				   
				 
				
		
  }
  
}

?>
                       
    </tbody>    
       </table>    </div>            
                    </div>

               
                    

                </div>
				
				
   <!-- Logout Modal-->
    <div class="modal fade" id="addmember" tabindex="-1" role="dialog" aria-labelledby="addmembermodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Member Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
			
                <div class="modal-body">
					<div class='form-group'>
					<label>First Name</label>
					<input class="form-control member-fname" type="text">
					</div>
					<div class='form-group'>
					<label>Last Name</label>
					<input class="form-control member-lname" type="text">
					</div>
					<div class='form-group'>
					<label>Contact No.</label>
					<input class="form-control member-contact" type="text">
					</div>
					
					<div class='form-group'>
					<label>Church</label>
								
				<?php 
				
				   $mychurches = json_decode($user_church); 
				if(is_array($mychurches)){
					
					echo "<select class='form-control member-church'>";
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
				
				
					
				</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="savemember()">Save</a>
                </div>
				
            </div>
        </div>
    </div>



    <div class="modal fade" id="viewmember" tabindex="-1" role="dialog" aria-labelledby="viewmembermodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Member Details</h5>
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