<div class="modal fade" id="edit<?php echo $urow['std_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php
		$n=mysqli_query($conn,"select * from `student_info` where std_id='".$urow['std_id']."'");
		$nrow=mysqli_fetch_array($n);
	?>
	
	
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class = "modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<center><h3 class = "text-success modal-title">Update Student</h3></center>
		</div>
		
		<form>
			<div class="modal-body">
				Firstname: <input type="text" value="<?php echo $nrow['firstname']; ?>" id="ufirstname<?php echo $urow['std_id']; ?>" class="form-control">
				Lastname: <input type="text" value="<?php echo $nrow['lastname']; ?>" id="ulastname<?php echo $urow['std_id']; ?>" class="form-control">
				Address: <input type="text" value="<?php echo $nrow['address']; ?>" id="uaddress<?php echo $urow['std_id']; ?>" class="form-control">
				PhoneNo: <input type="text" value="<?php echo $nrow['phoneno']; ?>" id="uphoneno<?php echo $urow['std_id']; ?>" class="form-control">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="updateuser btn btn-success" value="<?php echo $urow['std_id']; ?>"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
			</div>
		</form>
    </div>
  </div>
</div>