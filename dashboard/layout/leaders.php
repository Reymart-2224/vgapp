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
   <tbody>
<?php
// Ensure session
if (session_status() === PHP_SESSION_NONE) { session_start(); }

// Build allowed-church list for pastors (type 2)
$mychurches = json_decode($user_church ?? '[]', true);
if (!is_array($mychurches)) $mychurches = [];

// Cast all church ids to integers (safety)
$allowedIds = array_values(array_filter(array_map('intval', $mychurches), fn($v) => $v > 0));

// Base query: leaders + their church name (JOIN avoids N+1 queries)
$sql = "
  SELECT 
    u.id,
    u.fname,
    u.lname,
    u.username,
    u.status,
    u.church   AS church_id,
    COALESCE(c.name, '') AS church_name
  FROM users u
  LEFT JOIN churches c ON c.id = u.church
  WHERE u.type = 3
";

// If logged-in user is a pastor, restrict to their churches
if (($_SESSION['type'] ?? 0) == 2) {
  if (!empty($allowedIds)) {
    // Safe IN clause
    $in = implode(',', array_fill(0, count($allowedIds), '?'));
    $sql .= " AND u.church IN ($in)";
    $stmt = $conn->prepare($sql);
    // dynamic bind
    $types = str_repeat('i', count($allowedIds));
    $stmt->bind_param($types, ...$allowedIds);
    $stmt->execute();
    $result_users = $stmt->get_result();
  } else {
    // Pastor has no allowed churches → show none
    $result_users = false;
  }
} else {
  // Admin/leaders: no restriction
  $result_users = $conn->query($sql);
}

if ($result_users && $result_users->num_rows > 0):
  while ($row = $result_users->fetch_assoc()):
    $leader_id       = (int)$row['id'];
    $leader_fname    = ucfirst((string)$row['fname']);
    $leader_lname    = ucfirst((string)$row['lname']);
    $leader_username = (string)$row['username'];
    $leader_status   = (int)$row['status'];
    $leader_state    = $leader_status === 1 
                        ? "<span class='text-success'>Active</span>"
                        : "<span class='text-danger'>Deactivated</span>";
    $church_name     = $row['church_name'] !== '' ? $row['church_name'] : '—';
?>
  <tr onclick="viewleader(<?= $leader_id ?>)">
    <td><?= htmlspecialchars("$leader_fname $leader_lname", ENT_QUOTES) ?></td>
    <td><?= htmlspecialchars($leader_username, ENT_QUOTES) ?></td>
    <td><?= htmlspecialchars($church_name, ENT_QUOTES) ?></td>
    <td><?= $leader_state ?></td>
  </tr>
<?php
  endwhile;
else:
?>
  <tr><td colspan="4" class="text-center">No leaders found.</td></tr>
<?php
endif;

// Close statement if used
if (isset($stmt) && $stmt instanceof mysqli_stmt) { $stmt->close(); }
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