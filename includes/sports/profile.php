<?php include('includes/header.php');
?>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include('includes/nav.php'); ?>

        <div class="app-main">
            <?php include('includes/sidebar.php'); ?>

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <?php include('includes/analytical_dash.php'); ?>

                    <?php include('includes/dashboard_box.php'); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">
                                    <i class="metismenu-icon pe-7s-user fa-2x"> Personal Details</i>    
                                </div>

                                <div class="table-responsive">
                                    <div class="row">
                                    <?php

                                        $query = "SELECT * FROM `users`";
                                        $result = mysqli_query($con, $query);

                                        if(!$result){
                                            die("QUERY FAILED" . mysqli_error($con));
                                        }
                                    ?>
                                        <div class="col-lg-6 col-xl-4">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">First Name</div>
                                                            <div class="widget-subheading"><?php  echo $_SESSION['firstname']; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Last Name</div>
                                                            <div class="widget-subheading"><?php echo $_SESSION['lastname']; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Email</div>
                                                            <div class="widget-subheading"><?php echo $_SESSION['email']; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Gender</div>
                                                            <div class="widget-subheading"><?php echo $_SESSION['gender']; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Level</div>
                                                            <div class="widget-subheading"><?php echo $_SESSION['level']; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Role</div>
                                                            <div class="widget-subheading"><?php echo $_SESSION['role']; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Status</div>
                                                            <div class="widget-subheading"><?php echo $_SESSION['status']; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-block text-center card-footer">
                                    <a title="View user" class="btn btn-outline-info btn-sm" href="./profilePhoto.php?id=<?php echo $_SESSION['id']; ?>"><i class="fas fa-user">  Profile Picture</i></a>
                                    <a title="View user" class="btn btn-outline-info btn-sm" href="./profile.php?id=<?php echo $_SESSION['id']; ?>"><i class="fas fa-eye">  View</i></a>
                                    <a title="Edit user" class="btn btn-outline-warning btn-sm" href="./edit_user.php?id=<?php echo $_SESSION['id']; ?>"><i class="fas fa-edit">  Edit</i></a>
                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><a href="changepass.php?id=<?php echo $_SESSION['id'];?>"><i class="fas fa-lock">  Password</i></a></button>
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