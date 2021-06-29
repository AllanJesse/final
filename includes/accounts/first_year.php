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
                                <div class="card-header">View All First Year Receipts
                                    <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <button class="active btn btn-focus"><a href="first_year.php"> First Year</a></button>
                                            <button class="active btn btn-focus"><a href="second_year.php"> Second Year</a></button>
                                            <button class="btn btn-focus"><a href="third_year.php"> Third Year</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <?php

                                        $query = "SELECT u.firstname as firstname, f.first1 as first1, f.semester1 as semester1, f.id as id, f.status as status FROM finance f INNER JOIN users u on u.id=f.user_id";
                                        $result = mysqli_query($con, $query);
                                        
                                        if(!$result){
                                            die("QUERY FAILED" . mysqli_error($con));
                                        }
                                        $no = 1;
                                        ?>
                                        <thead>
                                            <tr>
                                            <th class="text-center">#</th>
                                                <th>Student's Name</th>
                                                <th class="text-center">First Semester</th>
                                                <th class="text-center">Second Semester</th>
                                                <th class="text-center">Status</th>

                                            </tr>
                                        </thead>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tbody>
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
                                                            <div class="widget-heading"><?php echo $row['first1']; ?></div>
                                                        </div>
                                                    </td>

                                                    <td class="text-center">
                                                        <div class="widget-content-center">
                                                            <div class="widget-heading"><?php echo $row['semester1']; ?></div>
                                                        </div>
                                                    </td>

                                                    <td class="text-center">
                                                        <div class="widget-content-center">
                                                            <div class="widget-heading"><?php echo $row['status']; ?></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                    </table>
                                    <div class="d-block text-center card-footer">
                                        <button class="btn-wide btn btn-success"><a href="printFirst.php"><i class="metismenu-icon pe-7s-file"></i>Print</a></button>
                                    </div>
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