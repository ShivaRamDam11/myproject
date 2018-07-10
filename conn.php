<?php
 
//database connection string

$conn = mysqli_connect("localhost","root","","srs_database");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>