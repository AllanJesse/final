<?php

include ('includes/header.php');
include ('credentials.php'); 
    $id =$_SESSION['id'];

    if (isset($_POST['changPass'])) {
		$errors = array();
		$Oldpassword = $_POST['password'];
        $newPassword = $_POST['newPassword'];
		$confirm_password = $_POST['conPassword'];


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
 
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($Oldpassword, $row['password'])) {
                    if($newPassword === $confirm_password){
                        $hashPass = password_hash($newPassword, PASSWORD_DEFAULT);
                        $query = "UPDATE `users` SET `password` = '$hashPass' WHERE `users`.`id` = '$id'";
                        $result = mysqli_query($con, $query);
              
                        if ($result) {
                            echo "Password updated successfully!";
                            session_unset();
                            session_destroy();
                            header("location: ../../index.php");
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
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include('includes/nav.php'); ?>

        <div class="app-main">
            <?php include('includes/sidebar.php'); ?>

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <?php include('includes/analytical_dash.php'); ?>

                    <?php include('includes/dashboard_box_depart.php'); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Change Password</h5>
                                    <?php
                                        if (count($errors) > 0) {
                                            foreach ($errors as $error) { ?>
                                                <p class="alert alert-warning text-danger p-2"><?php echo $error; ?></p>
                                            <?php }
                                        }
                                    ?>
                                        <form class="" action="" method="post">
                                            <div class="form-group">
                                                <label for="password">Old Password:</label>
							                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                                            </div>

                                            <div class="form-group">
                                                <label for="classification_number">New Password:</label>
                                                <input type="password" class="form-control" name="newPassword" placeholder="Enter New Password">
                                            </div>

                                            <div class="form-group">
                                                <label for="assertion_number">Comfirm Password:</label>
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

                </div>

                <?php include('includes/footer.php'); ?>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<?php include('includes/end_footer.php'); ?>