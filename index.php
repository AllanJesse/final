<?php
	include ('includes/header.php');
	include ('credentials.php');
?>
<div class="container" style="margin-bottom: 50px;">
		<div class="row justify-content-center">
			<div class="col-lg-5 m-auto">
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
						<p class="h3 font-weight-bold text-center">CFS<br><small class="text-muted">Students Clearance System</small></p>
					</div>
					<form class="" action="" method="post">

						<div class="input-group mb-3 input-group-lg">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fas fa-envelope"></i></span>
							</div>
							<input type="text" class="form-control" name="email" placeholder="Email">
						</div>

						<div class="input-group mb-3 input-group-lg">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-lock"></i></span>
							</div>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
						</div>
					</form>
					<div class="form-group">
						<p>Forgot password?<a href="./password_reset.php">Click here to reset password</a></p>
						<p>Don't have an account yet? <a href="./register.php"> Create an account</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('includes/footer.php'); ?>