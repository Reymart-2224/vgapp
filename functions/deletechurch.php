<?php
session_start();
include 'connection.php';
if($_SESSION['type']==1){
$id = $_POST['id'];

$checkchurch = "SELECT * FROM churches where  id=".$id;
$result = $conn->query($checkchurch);

$checking = 0;
if ($result->num_rows > 0) {
	$sql = "DELETE FROM churches WHERE  id=".$id;
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
