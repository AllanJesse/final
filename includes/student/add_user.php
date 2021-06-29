<?php include('includes/header.php');
      include('/Applications/MAMP/htdocs/final/credentials.php');
?>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include('includes/nav.php'); ?>

        <div class="app-main">
            <?php include('includes/sidebar.php'); ?>

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <?php include('includes/analytical_dash.php'); ?>

                    <?php include('includes/dashboard_add_user.php'); ?>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="main-card mb-3 card">
                        <?php
                                if (count($errors) > 0) {
                                    foreach ($errors as $error) { ?>
                                        <p class="alert alert-warning text-danger p-2"><?php echo $error; ?></p>
                                    <?php }
                                }
                        ?>
                                    <div class="card-body"><h5 class="card-title">Add Department</h5>
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
                                                <label for="level">Level:</label>
                                                <br>
                                                <select name="level" class="form-control" id="">
                                                <option value="" selected disabled>Choose Your Level</option>
                                                <option>NTA Level 06</option>
                                                <option>NTA Level 08</option>
                                                </select>
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