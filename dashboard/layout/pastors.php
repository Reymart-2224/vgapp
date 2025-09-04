  <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pastors <button class='btn default-button '  data-toggle="modal" data-target="#addpastor" > <i class='fa fa-plus'></i></button></h1>
						
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
					    <div class="col-sm-12">
<table class="table table-striped" id="pastortable"> 
<thead>
	<tr>
		<th>Name</th>
		<th>Username/Email</th> 
		<th>Church Assignment</th>
		<th>Status</th>
	</tr>
</thead>
      <tbody>              <?php 
					
$checkusers= "SELECT * FROM users where type=2 ORDER BY id DESC";
$result_users = $conn->query($checkusers);

if ($result_users->num_rows > 0) {
  while($row_users = $result_users->fetch_assoc()) {
				 $pastor_fname = ucfirst($row_users["fname"]);
				  $pastor_lname = ucfirst($row_users["lname"]);
				  $pastor_status= $row_users["status"];
				   $pastor_churches= $row_users["church"];
				   $pastor_username= $row_users["username"]; 
				   
				   $mychurches = json_decode($pastor_churches); 
				   
			
				  if($pastor_status==1){
					  $pastor_state = "<span class='text-success'>Active</span>";
				  }
				  else{
					    $pastor_state = "<span class='text-danger'>Deactivated</span>";
				  }
				  echo "<tr onclick='viewpastor(".$row_users["id"].")'><td>".$pastor_fname." ".$pastor_lname."</td><td>".$pastor_username."</td><td>";
			
				  	   for($i=0;$i < count($mychurches);$i++){
						   //echo $mychurches[$i];
								$checkchurch =  "SELECT * FROM churches where id=".$mychurches[$i];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									echo "<span>".$row_church['name']."</span><br>";
								}
								}
					   }
				  
				  echo "</td><td>".$pastor_state."</td></tr>";
                                   
				  
				 
				
		
  }
  
}

?>
                       
    </tbody>    
       </table>    </div>            
                    </div>

               
                    

                </div>
				
				
   <!-- Logout Modal-->
    <div class="modal fade" id="addpastor" tabindex="-1" role="dialog" aria-labelledby="addpastormodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pastor Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
			
                <div class="modal-body">
					<div class='form-group'>
					<label>First Name</label>
					<input class="form-control pastor-fname" type="text">
					</div>
					<div class='form-group'>
					<label>Last Name</label>
					<input class="form-control pastor-lname" type="text">
					</div>
					<div class='form-group'>
					<label>Username/Email</label>
					<input class="form-control pastor-username" type="email">
					</div>
					<div class='form-group'>
					<label>Password</label>
					<input class="form-control pastor-password" type="password">
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
						echo '<input type="checkbox" class="churches" name="'.$church_name.'" value="'.$church_id.'">
						<label for="churches">'.$church_name.'</label><br>';
						}
					}
					
					?>
					
					</div>
				</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="savepastor()">Save</a>
                </div>
				
            </div>
        </div>
    </div>



    <div class="modal fade" id="viewpastor" tabindex="-1" role="dialog" aria-labelledby="viewpastormodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pastor Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
				<div class='pastor-content'>
              
				</div>
            </div>
        </div>
    </div>
	
                <!-- /.container-fluid -->