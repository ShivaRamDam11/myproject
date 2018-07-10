<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$address=$_POST['address'];
		$phoneno=$_POST['phoneno'];
		
		mysqli_query($conn,"insert into `student_info` (firstname, lastname,address,phoneno) values ('$firstname', '$lastname','$address','$phoneno')");
	}
?>