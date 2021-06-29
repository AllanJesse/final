<?php
	include ('includes/header.php');
	include ('credentials.php');
?>

<div class="container" style="margin-bottom: 50px;">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<?php
					if (count($errors) > 0) {
						foreach ($errors as $error) { ?>
							<p class="alert alert-warning text-danger p-2"><?php echo $error; ?></p>
						<?php }
					}
				?>
					<div class="card-title text-center mt-3">
						<img src="includes/public/imgs/atclogo.png" width="100px" height="100px">
						<p class="h3 font-weight-bold text-center">CFS Registration Form<br><small class="text-muted"></small></p>
					</div>
				<form class="" action="" method="post">

					<div class="form-group">
						<label for="name">Firstname:</label>
						<input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>" placeholder="Enter firstname">
					</div>

					<div class="form-group">
						<label for="name">Lastname:</label>
						<input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>" placeholder="Enter lastname">
					</div>

					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Enter email">
					</div>

					<div class="form-group">
						<label for="gender">Gender:</label>
						<br>
						<select name="gender" class="form-control" id="">
						<option value="" selected disabled>Choose Your Gender</option>
						<option>Male</option>
						<option>Female</option>
						<option>Others</option>
						</select>
					</div>

                    <div class="form-group">
                    <label for="cheo">Designation:</label>
                    <select name="cheo" id="cheo" class="form-control" required>
                        <option value="" selected disabled>Choose Your Designation</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                    </div>

					<div class="form-group" id="lev_dept">
						<div id="lev">
						<label>Choose Your Department:</label>
						<?php
                    
							$query = "SELECT * FROM departments";
							$result = mysqli_query($con, $query);
							if(!$result){
								die("QUERY FAILED" . mysqli_error($con));
							}
						?>
						<select name="dept_id" class="form-control" id="">
							<option value="" selected disabled id="gen">Choose Your Department</option>
							<?php
                            	while ($row = mysqli_fetch_assoc($result)) { ?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['depart_name']; ?></option>
							<?php } ?>
						</select>
						</div>
					</div>


					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" name="password" value="" placeholder="Enter password">
					</div>

					<div class="form-group">
						<label for="confirm_password">Confirm Password:</label>
						<input type="password" class="form-control" name="confirm_password" value="" placeholder="Enter confirm_password">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
					</div>
					<div class="form-group">
						<p>Already a member? Please: <a href="./index.php"> Login</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php'); ?>

<script src="public/js/jquery.min.js"></script>

<script>
    $(document).ready(function () {
		let lev = $('#lev')
		lev.remove()
        $('#cheo').on('change', function () {
            let cheo = this.value;
            if(cheo === 'teacher'){
				$('#lev_dept').html(lev)
                // $('#lev_dept').html('<label>Choose Your Department:</label><select name="dept" class="form-control" id=""><option value="" selected disabled id="gen">Choose Your Department</option><option>ICT</option><option>Electrical</option></select>');
            }else {
                $('#lev_dept').html('<label>Choose Your Level:</label><select name="level" class="form-control" id=""><option value="" selected disabled id="gen">Choose Your Level</option><option>NTA Level 06</option><option>NTA Level 08</option></select>');
						
						
            }
            
        })
    })

</script>