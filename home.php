<?php
error_reporting(0);
	session_start();
    if(!$_SESSION['username'])
         header("location:index.php");
	include('conn.php');
	
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<title>Student Registration System</title>
	</head>
	
<body>
		<form action="index.php" method="post">
			<div class = "form-group">
			<td><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['std_id']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Logout</button>
			</div>
		</form>

	<div style="height:1px;"></div>
	<div class = "row">	
		<div class = "col-md-3">
		</div>
		<div class = "col-md-6 well">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 class = "text-primary">STUDENT REGISTRATION SYSTEM</h2></center>
					<hr>
				<div>
					<form>
						<div class = "form-group">
							<label>Firstname:</label>
							<input type  = "text" id = "firstname" class = "form-control">

							<label>Lastname:</label>
							<input type  = "text" id = "lastname" class = "form-control">

							<label>Address   :</label>
							<input type  = "text" id = "address" class = "form-control">

							<label>PhoneNo:</label>
							<input type  = "text" id = "phoneno" class = "form-control">
						</div>
						
						<div class = "form-group">
							<button type = "button" id="addnew" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Add</button>
						</div>
					</form>
				</div>
                </div>
            </div><br>
			<div class="row">
			<div id="userTable"></div>
			</div>
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>	
<script src = "js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		showUser();
		//Add New
		$(document).on('click', '#addnew', function(){
			if ($('#firstname').val()=="" || $('#lastname').val()=="" || $('#address').val()=="" || $('#phoneno').val()==""){
				alert('Please input data first');
			}
			else{
			$firstname=$('#firstname').val();
			$lastname=$('#lastname').val();		
			$address=$('#address').val();
			$phoneno=$('#phoneno').val();				
				$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						firstname: $firstname,
						lastname: $lastname,
						address: $address,
						phoneno: $phoneno,
						add: 1,
					},
					success: function(){
						showUser();
					}
				});
			}
		});
		//Delete
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						del: 1,
					},
					success: function(){
						showUser();
					}
				});
		});
		//Update
		$(document).on('click', '.updateuser', function(){
			$uid=$(this).val();
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$ufirstname=$('#ufirstname'+$uid).val();
			$ulastname=$('#ulastname'+$uid).val();
			$uaddress=$('#uaddress'+$uid).val();
			$uphoneno=$('#uphoneno'+$uid).val();
				$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						id: $uid,
						firstname: $ufirstname,
						lastname: $ulastname,
						address: $uaddress,
						phoneno: $uphoneno,
						edit: 1,
					},
					success: function(){
						showUser();
					}
				});
		});
	
	});
	
	//Showing our Table
	function showUser(){
		$.ajax({
			url: 'show_user.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
	
</script>

</html>