<?php include('includes/header.php');

?>

<?php
$id = $_GET['id'];
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $returning_date = $_POST['returning_date'];
        $status = $_POST['status'];

        $work = "UPDATE `lended_devices` SET `returning_date` = '{$returning_date}', `status` = '{$status}' WHERE `lended_devices`.`id` = $id;";
        $result = mysqli_query($con, $work);
        header('location: lending_view.php');
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

                    <?php include('includes/dashboard_box.php'); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">View Retuned Devices
                                    <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <button class="active btn btn-focus"><a href="borrow_system.php"> Borrowing System</a></button>
                                            <button class="active btn btn-focus"><a href="return_system.php"> Returning System</a></button>
                                            <button class="btn btn-focus"><a href="lending_view.php"> View </a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <?php

                                        $query = "SELECT u.firstname as firstname, d.device_name as device_name, l.id as id, l.role as role, l.no_tools as no_tools, l.date as date FROM lended_devices l INNER JOIN users u ON u.id=l.user_id INNER JOIN devices d ON d.id=l.device_id WHERE l.status='Borrowed'";
                                        $result = mysqli_query($con, $query);
                                        
                                        if(!$result){
                                            die("QUERY FAILED" . mysqli_error($con));
                                        }
                                        $no = 1;
                                        ?>
                                        <thead>
                                            <tr>
                                            <th class="text-center">#</th>
                                                <th>Firstname</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Device Name</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Returning Date</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Submit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) { 
                                            ?>
                                            
                                            
                                                <tr>
                                                    <td class="text-center text-muted"><?php echo $no++; ?></td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading"><?php echo $row['firstname']; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="widget-content-center">
                                                            <div class="widget-heading"><?php echo $row['role']; ?></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="text-center"><?php echo $row['device_name']; ?></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="text-center"><?php echo $row['date']; ?></div>
                                                    </td>
                                                    <form action="" method="post" class="form-inline">
                                                    
                                                        <td class="text-center">
                                                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                                <input type="date" class="form-control" name="returning_date">
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                                <input type="text" class="form-control" name="status">
                                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="submit" name="submit" class="btn btn-primary">Clear</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                    </table>
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