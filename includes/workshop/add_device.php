<?php include('includes/header.php');
?>

<?php
                                        
    if(isset($_POST['registerDevice'])){
        $errors = array();
        $device_name = $_POST['device_name'];
        $device_type = $_POST['device_type'];
        $serial_number = $_POST['serial_number'];
            
    if(empty($device_name)) {
        array_push($errors, 'Device Name should be Field');
    }

    if(empty($device_type)) {
        array_push($errors, 'Device Type should be Field');
    }

    if(empty($serial_number)) {
        array_push($errors, 'Device Serial Number should be Field');
    }

    if(empty($errors)) {

        $query = "INSERT INTO `devices`(`device_name`, `device_type`, `serial_number`) VALUES ('{$device_name}', '{$device_type}', '{$serial_number}')";
        $add_device = mysqli_query($con, $query);
            if(!$add_device){
                die("QUERY FAILED" . mysqli_error($con));
            }
    echo "The Device has been Registered Successful";
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
                                    <div class="card-body"><h5 class="card-title">Register New Device</h5>
                                    <?php
                                        if (count($errors) > 0) {
                                            foreach ($errors as $error) { ?>
                                                <p class="alert alert-warning text-danger p-2"><?php echo $error; ?></p>
                                            <?php }
                                        }
                                    ?>
                                        <form class="" action="" method="post">
                                            <div class="form-group">
                                                <label for="title_of_the_book">Device Name:</label>
                                                <input type="text" class="form-control" name="device_name" value="<?php echo $device_name; ?>" placeholder="Enter Device Name">
                                            </div>

                                            <div class="form-group">
                                                <label for="author_of_the_book">Device Type:</label>
                                                <input type="text" class="form-control" name="device_type" value="<?php echo $device_type; ?>" placeholder="Enter Device Type">
                                            </div>

                                            <div class="form-group">
                                                <label for="classification_number">Serial Number:</label>
                                                <input type="text" class="form-control" name="serial_number" value="<?php echo $serial_number; ?>" placeholder="Enter Device's Serial Number">
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block" name="registerDevice">Register Device</button>
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