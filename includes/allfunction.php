<?php
session_start();
include("../connection.php");

date_default_timezone_set('Asia/Kolkata');
  
switch($_REQUEST['action'])
{
	case "signin":
		login();
		break;
	case "signout":
		logout();
		break;
	case "seat_process":
		seat_process();
		break;
	case "seat_reserved":
		seat_reserved();
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
function logout(){
	global $web;

	$id=$_SESSION['moviemin_id'];
	if(isset($_SESSION['moviemin_name']))
	{
		session_unset(); 
		session_destroy();
		header('location:'.$web);
	}
	else
		header('location:'.$web);

}

function seat_process()
{
	global $con;

	$seats = explode(',', $_POST['selectedSeats']);

	$err = [];
	/*foreach ($seats as $key => $value)
	{*/
		$query = mysqli_query($con,"INSERT INTO seats_booking (`seat_no`) VALUES('".$_POST['selectedSeats']."')");
	    if ($query)
	    {
	        $err = mysqli_error($con);
	    }
	/*}*/
	$arr = [];
	if ($err === $arr)
	{
	    echo ('Successfully Inserted.');
	}
	else
	{
	    echo $err;
	}
}

function seat_reserved(){
	global $con;

	
}

?>
