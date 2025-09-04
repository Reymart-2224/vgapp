<?php 

if($_GET['m']=='churches'){
	include "layout/churches.php";
	
}
	
else if($_GET['m']=='pastors'){
	include "layout/pastors.php";
	
}
else if($_GET['m']=='leaders'){
	include "layout/leaders.php";
	
}

else if($_GET['m']=='vg'){
	include "layout/myvg.php";
	
}
else if($_GET['m']=='referrals'){
	include "layout/referrals.php";
}
else if($_GET['m']=='members'){
	include "layout/members.php";
	 
}
else if($_GET['m']=='attendance'){
	include "layout/attendance.php";
	
}
else if($_GET['m']=='reports'){
	include "layout/reports.php";
	
}
else{
	
include "layout/dashboard.php";
}
?>