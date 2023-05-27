<?php

// Create connection
  global $con;
  global $web;

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "cinema_db"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
$web="http://localhost/OnlineTicketSystem/";
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>  