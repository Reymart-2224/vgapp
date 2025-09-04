  <style>
  
  span.bg-success.accept {
    color: white;
    padding: 3px 5px 1px 5px;
    border-radius: 100px;
	cursor:pointer;
}
 span.bg-danger.reject {
    color: white;
    padding: 3px 8px 1px 7px;
    border-radius: 100px;
	cursor:pointer;
}

</style>
  
  <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Referrals</h1>
						
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
		<th>Details</th>
		<th>Action</th>
		
	</tr>
</thead>
      <tbody>              <?php 
	$checkreferral= "SELECT * FROM referrals where leader=".$_SESSION['id']." ORDER BY id DESC";
$result_referral = $conn->query($checkreferral);
if ($result_referral->num_rows > 0) {
  while($row_referral = $result_referral->fetch_assoc()) {

	  
$checkmember= "SELECT * FROM members where id=".$row_referral['member'];
$result_members = $conn->query($checkmember);
 $member_fname ="";
 $member_lname ="";
 $member_contact ="";
if ($result_members->num_rows > 0) {
  while($row_member = $result_members->fetch_assoc()) {
				 $member_fname = ucfirst($row_member["fname"]);
				  $member_lname = ucfirst($row_member["lname"]);
			
				   
				  $member_contact = ucfirst($row_member["contact"]);
				
  }
  
}

$checkmember= "SELECT * FROM users where id=".$row_referral['from_leader'];
$result_members = $conn->query($checkmember);
 $leader_fname ="";
 $leader_lname ="";
if ($result_members->num_rows > 0) {
  while($row_member = $result_members->fetch_assoc()) {
				 $leader_fname = ucfirst($row_member["fname"]);
				  $leader_lname = ucfirst($row_member["lname"]);
			
				
  }
  
}
if($row_referral["type"]==1){
	$type="Temporary";
}
else{
	$type="Permanent";
	
}

				  echo "<tr ><td>".$member_fname." ".$member_lname."</td>";
			
				  	 				  
				  echo "<td>".$member_contact."</td><td>From: ".$leader_fname." ".$leader_lname."<br>Type: " .$type."<br>Notes: ".$row_referral['notes']."</td>";
				  
				  
				  if($row_referral['status']==0){
					   echo "<td><span class='bg-success accept' onclick='accept(".$row_referral['id'].")'><i class='fa fa-check'></i></span> <span class='bg-danger reject' onclick='reject(".$row_referral['id'].")'><i class='fa fa-times'></i></span></td></tr>"; 
				  }
				  else{
					  if($row_referral['status']==1){
					    echo "<td><span class='text-success'>Accepted</span></td></tr>"; 
					  }
					  else{
						 echo "<td><span class='text-danger'>Rejected</span></td></tr>"; 
						  
					  }
					  
				  }
				 
                                   
				   
				 
				
		
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