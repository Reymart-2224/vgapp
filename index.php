<?php 
session_start();

if(!isset($_SESSION['usercode']) || !isset($_SESSION['usertype'])){
	
	
	header("Location: login");
}
else{
	
	
	
}



?>