<?php
include("../connection.php");

$id=$_SESSION['moviemin_id'];

if(isset($_SESSION['moviemin_id']))
{
session_unset(); 
session_destroy();
header('location:index.php');
}
else
header('location:index.php');
?>