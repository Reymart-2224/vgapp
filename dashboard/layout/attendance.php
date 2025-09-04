  <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Attendance</h1>
						
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
					    <div class="col-sm-12">
<table class="table table-striped" id="membertable"> 
<thead> 
	<tr> 
		<th>VG Name</th>
		<th>Attended</th>
		<th>Referrals</th>
		<th>Absent</th>
		<th>Church</th>
		<th>Date</th>
	</tr>
</thead>
      <tbody>              <?php 
	$checkattendance= "SELECT * FROM attendance where leader=".$_SESSION['id']." ORDER BY id DESC";
$result_attendance = $conn->query($checkattendance);
if ($result_attendance->num_rows > 0) {
  while($row_attendance = $result_attendance->fetch_assoc()) {

	   	$vg_referrals= count(json_decode($row_attendance['referrals'])); 
 	$vg_attendees = count(json_decode($row_attendance['attendees'])); 
		$checkvg= "SELECT * FROM victory_group where id=".$row_attendance['vg_id']." ORDER BY id DESC";
		$result_checkvg= $conn->query($checkvg);
		if ($result_checkvg->num_rows > 0) {
		while($row_checkvg = $result_checkvg->fetch_assoc()) {
	$vg_name= ucfirst($row_checkvg['name']); 
$church= ucfirst($row_checkvg['church']); 
$vg_day= ucfirst($row_checkvg['day']); 
	$members= $row_checkvg['members']; 
		$members = json_decode($members); 
		}
		}
		
		
		$checkvg= "SELECT * FROM churches where id=".$church." ORDER BY id DESC";
		$result_checkvg= $conn->query($checkvg);
		if ($result_checkvg->num_rows > 0) {
		while($row_checkvg = $result_checkvg->fetch_assoc()) {
	$vg_church= ucfirst($row_checkvg['name']); 

		}
		}
		
		$a =0;
		if(is_array($members)){
					
					  for($i=0;$i < count($members);$i++){
						  if(!(in_array($members[$i],json_decode($row_attendance['attendees'])))){
							  $a = $a+1;
						  }
						  
					  }
		}
		

				  echo "<tr onclick='viewattendance(".$row_attendance['id'].")'><td>".$vg_name."</td>";
			
				  	 				  
				  echo "<td>".$vg_attendees."</td><td>".$vg_referrals."</td>";
				  echo "<td>".$a."</td><td>".$vg_church."</td><td>".$vg_day." ".$row_attendance['date']." ".$row_attendance['time']."</td>";
				 
				  
                                   
				   
				 
				
		
  }
  
}



?>
                       
    </tbody>    
       </table>    </div>            
                    </div>

               
                    

                </div>
				



    <div class="modal fade" id="viewattendance" tabindex="-1" role="dialog" aria-labelledby="viewattendancemodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">VG Attendance Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
				<div class='viewattendance-content'>
              
				</div>
            </div>
        </div>
    </div>
	
                <!-- /.container-fluid -->