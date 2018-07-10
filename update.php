<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$address=$_POST['address'];
		$phoneno=$_POST['phoneno'];
		
		mysqli_query($conn,"update `student_info` set firstname='$firstname', lastname='$lastname', address='$address', phoneno='$phoneno' where std_id='$id'");
	}
?>