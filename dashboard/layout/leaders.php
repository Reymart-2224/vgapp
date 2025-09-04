  <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Leaders <button class='btn default-button '  data-toggle="modal" data-target="#addleader" > <i class='fa fa-plus'></i></button></h1>
						
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
					    <div class="col-sm-12">
<table class="table table-striped" id="leadertable"> 
<thead>
	<tr>
		<th>Name</th>
		<th>Username/Email</th> 
		<th>Church </th>
		<th>Status</th>
	</tr>
</thead>
      <tbody>              <?php 


	
$checkusers= "SELECT * FROM users where type=3";	

$result_users = $conn->query($checkusers);

if ($result_users->num_rows > 0) {
  while($row_users = $result_users->fetch_assoc()) {
				 $leader_fname = ucfirst($row_users["fname"]);
				  $leader_lname = ucfirst($row_users["lname"]);
				  $leader_status= $row_users["status"];
				   $leader_church= $row_users["church"];
				   $leader_username= $row_users["username"]; 
				   
				  $mychurches = json_decode($user_church); 
				  
				  if($_SESSION['type']==2){
				if(in_array($leader_church,$mychurches)){

				   
			
				  if($leader_status==1){
					  $leader_state = "<span class='text-success'>Active</span>";
				  }
				  else{
					    $leader_state = "<span class='text-danger'>Deactivated</span>";
				  }
				  echo "<tr onclick='viewleader(".$row_users["id"].")'><td>".$leader_fname." ".$leader_lname."</td><td>".$leader_username."</td><td>";
			
				  	 
						   //echo $mychurches[$i];
								$checkchurch =  "SELECT * FROM churches where id=".$leader_church[$i];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									echo "<span>".$row_church['name']."</span><br>";
								}
								}
					   
				  
				  echo "</td><td>".$leader_state."</td></tr>";
                                   
				}
  }
  else{
	    
			
				  if($leader_status==1){
					  $leader_state = "<span class='text-success'>Active</span>";
				  }
				  else{
					    $leader_state = "<span class='text-danger'>Deactivated</span>";
				  }
				  echo "<tr onclick='viewleader(".$row_users["id"].")'><td>".$leader_fname." ".$leader_lname."</td><td>".$leader_username."</td><td>";
			
				  	 
						   //echo $mychurches[$i];
								$checkchurch =  "SELECT * FROM churches where id=".$leader_church[$i];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									echo "<span>".$row_church['name']."</span><br>";
								}
								}
					   
				  
				  echo "</td><td>".$leader_state."</td></tr>";
                             
	  
  }
}
				 
				
		
  }
  


?>
                       
    </tbody>    
       </table>    </div>            
                    </div>

               
                    

                </div>
				
				
   <!-- Logout Modal-->
    <div class="modal fade" id="addleader" tabindex="-1" role="dialog" aria-labelledby="addpastormodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leader Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
			
                <div class="modal-body">
					<div class='form-group'>
					<label>First Name</label>
					<input class="form-control leader-fname" type="text">
					</div>
					<div class='form-group'>
					<label>Last Name</label>
					<input class="form-control leader-lname" type="text">
					</div>
					<div class='form-group'>
					<label>Username/Email</label>
					<input class="form-control leader-username" type="email">
					</div>
					<div class='form-group'>
					<label>Password</label>
					<input class="form-control leader-password" type="password">
					</div>
					<div class='form-group'>
					<label>Church</label><br>
					<select class="form-control leader-church"  >
					
					<option value="0">Select a church</option>
					<?php 
					$checkchurches= "SELECT * FROM churches where status = 1";
					$result_churches = $conn->query($checkchurches);
				 $mychurches = json_decode($user_church); 
					if ($result_churches->num_rows > 0) {
						while($row_church = $result_churches->fetch_assoc()) {
						$church_name = $row_church["name"];
						$church_id = $row_church["id"];
						
						
						
						  if($_SESSION['type']==2){
				if(in_array($church_id,$mychurches)){
						echo ' <option value="'.$church_id.'">'.$church_name.'</option>';
				}
						  }
						  else{
							  echo ' <option value="'.$church_id.'">'.$church_name.'</option>';
							  
						  }
						}
					}
					
					?>
					</select>
					</div>
				</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="saveleader()">Save</a>
                </div>
				
            </div>
        </div>
    </div>



    <div class="modal fade" id="viewleader" tabindex="-1" role="dialog" aria-labelledby="viewleadermodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leader Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
				<div class='leader-content'>
              
				</div>
            </div>
        </div>
    </div>
	
                <!-- /.container-fluid -->