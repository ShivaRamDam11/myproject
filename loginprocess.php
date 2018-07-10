<?php

	$username=$_POST['username'];
	$password=$_POST['password'];


	//include('conn.php');
	mysql_connect("localhost","root","");
	mysql_select_db("srs_database");
	
	$result=mysql_query("select * from user_info where username='$username' and password='$password'") or die("Failed t query database".mysql_error());
	

	$row=mysql_fetch_array($result);
	if(($row['username']==$username) && ($row['password']==$password))
	{
		echo"Welcome $username ";
        session_start();
        $_SESSION['username']=$username;
		header('location:home.php');
	}
	else
	{
		echo"Invalid Username or Password";
		header('location:index.php');
	}

?>