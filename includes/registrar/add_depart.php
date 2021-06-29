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

                    <?php include('includes/dashboard_box_depart.php'); ?>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Add Department</h5>
                                        <form action="" method="post">
                                            <?php
                                            
                                            if(isset($_POST['uploadBtn'])){

                                                $depart_name = $_POST['depart_name'];
                                                $comments = 'none';
                                                $status = 'Pending...';

                                                $query = "INSERT INTO `departments`(`depart_name`, `comments`, `status`) VALUES ('{$depart_name}', '{$comments}', '{$status}')";
                                                $add_dpt = mysqli_query($con, $query);

                                                if(!$add_dpt){
                                                    die("QUERY FAILED" . mysqli_error($con));
                                                }

                                                echo "Department Added Successful";
                                            }

                                            ?>
                                            <div class="input-group mb-3 input-group-lg">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">Department Name</span>
                                                </div>
                                                <input type="text" class="form-control" name="depart_name">
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-outline-primary btn-lg" name="uploadBtn">Add Department</button>
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