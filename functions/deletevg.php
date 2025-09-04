<?php
session_start();
include 'connection.php';

$checkmember= "SELECT * FROM victory_group where leader=".$_SESSION['id']." and id=".$_POST['id'];
$result_member= $conn->query($checkmember);

if ($result_member->num_rows > 0) {
$id = $_POST['id'];

$checkchurch = "SELECT * FROM victory_group where  id=".$id;
$result = $conn->query($checkchurch);

$checking = 0;
if ($result->num_rows > 0) {
	$sql = "DELETE FROM victory_group WHERE  id=".$id;
			if ($conn->query($sql) === TRUE) {
			echo "Record deleted successfully";
			} else {
			echo "Error deleting record: " . $conn->error;
			}

}
else{
	
			echo 0;
			

	
}


}