  <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Victory Churches <button class='btn default-button '  data-toggle="modal" data-target="#addchurch" > <i class='fa fa-plus'></i></button></h1>
						
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <?php 
					
$checkchurches= "SELECT * FROM churches";
$result_churches = $conn->query($checkchurches);

if ($result_churches->num_rows > 0) {
  while($row_church = $result_churches->fetch_assoc()) {
				 $church_name = $row_church["name"];
				  $church_status= $row_church["status"];
				  
				  if($church_status==1){
					  $church_state = "<span class='text-success'>Active</span>";
				  }
				  else{
					    $church_state = "<span class='text-danger'>Inactive</span>";
				  }
				  ?>
				   <div class="col-xl-3 col-md-6 mb-4" onclick="viewchurch(<?php echo $row_church["id"];?>)" style='cursor:pointer'>
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                                                <?php echo $church_name;?> </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $church_state;?> </div>
                                        </div>
                                  
                                    </div>
                                </div>
                            </div>  
                        </div>
				  
				  
				  <?php
				
		
  }
  
}

?>
                       

                       
                    </div>

               
                    

                </div>
				
				
   <!-- Logout Modal-->
    <div class="modal fade" id="addchurch" tabindex="-1" role="dialog" aria-labelledby="addchurchmodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Church Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
			
                <div class="modal-body">
					<div class='form-group'>
					<label>Church Name</label>
					<input class="form-control church-name" type="text">
					</div>
					<div class='form-group'>
					<label>Address</label>
					<input class="form-control church-address" type="text">
					</div>
				</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="savechurch()">Save</a>
                </div>
				
            </div>
        </div>
    </div>



    <div class="modal fade" id="viewchurch" tabindex="-1" role="dialog" aria-labelledby="viewchurchmodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Church Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
				<div class='church-content'>
              
				</div>
            </div>
        </div>
    </div>
	
                <!-- /.container-fluid -->