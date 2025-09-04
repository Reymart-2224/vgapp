<?php 

 if($user_type==1){
	include "dashboard/admin.php"; 
	 
 }
 if($user_type==2){
	include "dashboard/pastors.php"; 
	 
 }
 if($user_type==3){
	include "dashboard/leaders.php"; 
	 
 }
?>