<?php
session_start();
include("../connection.php");

date_default_timezone_set('Asia/Kolkata');

switch($_REQUEST['action'])
{
	case "signin":
		login();
		break;


	
}

function login(){
	global $con;

	date_default_timezone_set('Europe/London');
	$sTime = date("d-m-Y H:i:s");  

	$query = mysqli_query($con,"select * from users where email ='".$_POST['eMail']."' and password='".$_POST['password']."'");
	
	//check if data null or not

	if(mysqli_num_rows($query) > 0){
		
		$row = mysqli_fetch_assoc($query);
	
		$_SESSION['moviemin_id']=$row['id'];
		$_SESSION['moviemin_name']=$row['name'];

		echo "1";
	}
	else{
		echo "0";
	}
}
?>