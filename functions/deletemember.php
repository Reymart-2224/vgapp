<?php
session_start();
include 'connection.php';

$checkmember= "SELECT * FROM members where leader=".$_SESSION['id']." and id=".$_POST['id'];
$result_member= $conn->query($checkmember);

if ($result_member->num_rows > 0) {
$id = $_POST['id'];

$checkchurch = "SELECT * FROM members where  id=".$id;
$result = $conn->query($checkchurch);

$checking = 0;
if ($result->num_rows > 0) {
	$sql = "DELETE FROM members WHERE  id=".$id;
			if ($conn->query($sql) === TRUE) {
			1;
			} else {
			echo "Error deleting record: " . $conn->error;
			}

}
else{
	
			echo 0;
			

	
}


}