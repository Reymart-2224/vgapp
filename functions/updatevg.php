<?php
session_start();
include 'connection.php';
$user_id = $_SESSION['id'];
 
$user_code = $_SESSION['code'];
$checkuser = "SELECT * FROM users where id = ".$user_id." and code = '".$user_code."'";
$result = $conn->query($checkuser);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
				 $user_type = $row["type"];
				  $user_church= $row["church"];
				   $user_status= $row["status"];
				   $user_fname = $row["fname"];
				   $user_lname = $row["lname"];
				
		 
  } 
  
}
if(isset($_SESSION['type'])){
$name = $_POST['name'];
 $members = $_POST['members'];
$day = $_POST['day'];
$start = $_POST['start'];
$end = $_POST['end'];
$church = $_POST['church'];
$status = $_POST['status'];
$id = $_POST['id'];

$checkvg = "SELECT * FROM victory_group where  name='".$name."' and leader=".$user_id." and church=".$church;
$result = $conn->query($checkvg);

$checking = 0;
if ($result->num_rows <= 1) {
				while($row_vg = $result->fetch_assoc()) {
				if($id!=$row_vg["id"] && $name==$row_vg["name"]){
				$checking = 1;
				}	

				}
			if($checking >0){ 
			echo $checking;
 
			}
			else{
			$sql = "UPDATE victory_group SET name='".$name."',day='".$day."',time_start='".$start."',time_end='".$end."',members='".$members."',church=".$church.",status=".$status." WHERE id=".$id;


			if ($conn->query($sql) === TRUE) {
			echo 1;
			} else {
				echo $sql;
		echo "Error updating record: " . $conn->error;
			}

			}
}
else{
	
echo 2;



}
}