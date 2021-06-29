<?php
// session_start();
// if (!isset($_SESSION['id'])) {
//     header('location: login.php');
// }
include ('includes/header.php');
include ('credentials.php'); 
    $id =$_SESSION['id'];

    if (isset($_POST['changPass'])) {
		$errors = array();
		$Oldpassword = mysqli_real_escape_string($con, trim(strip_tags($_POST['password'])));
        $newPassword = mysqli_real_escape_string($con, trim(strip_tags($_POST['newPassword'])));
		$confirm_password = mysqli_real_escape_string($con, trim(strip_tags($_POST['conPassword'])));


		if(empty($Oldpassword)) {
			array_push($errors, 'Old Password field should not be empty');
		}

        if(empty($newPassword)){
            array_push($errors, 'New Password field can not be empty');
        }

		if(empty($confirm_password)) {
			array_push($errors, 'Comfirm Password field should not be empty');
		}

        if(empty($errors)){
            $query = "SELECT * FROM users WHERE id = '$id'";
            $result = mysqli_query($con, $query);
            // var_dump($result);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($Oldpassword, $row['password'])) {
                    if($newPassword === $confirm_password){
                        $hashPass = password_hash($newPassword, PASSWORD_DEFAULT);
                        $query = "UPDATE users SET password = '$hashPass' WHERE id = '$id'";
                        $result = mysqli_query($con, $query);
                        // var_dump($result);
                        if ($result) {
                            echo "Password updated successfully!";
                            session_unset();
                            session_destroy();
                            header("location: login.php");
                        }
                        else {
                            echo "Failed updating your password!";
                        }
                    }
                    else {
                        echo "The new password provided does not match with the cormfirm password!";
                    }
                }
                else{
                    echo "The old password provided does not match the existing password!";
                }
            }
        }

	}
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
                    <div class="flex align-items-center">
                        <div class="card-title text-center mt-3">
                            <img src="includes/public/imgs/atclogo.png" width="100px" height="100px">
                            <p class="h3 font-weight-bold text-center">CFS<br><small class="text-muted">Change Password</small></p>
                        </div>
                    </div>
					<form class="" action="" method="post">

						<div class="form-group">
							<label for="password">Old Password:</label>
							<input type="password" class="form-control" name="password" placeholder="Enter password">
						</div>

                        <div class="form-group">
							<label for="password">New Password:</label>
							<input type="password" class="form-control" name="newPassword" placeholder="Enter New Password">
						</div>

                        <div class="form-group">
							<label for="password">Comfirm Password:</label>
							<input type="password" class="form-control" name="conPassword" placeholder="Comfirm Password">
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block" name="changPass">Change Password</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
<?php include('includes/footer.php'); ?>