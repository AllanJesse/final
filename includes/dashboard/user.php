<?php include('includes/header.php'); ?>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include('includes/nav.php');?>        
                 
        <div class="app-main">
            <?php include('includes/sidebar.php');?>    
                
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <?php include('includes/analytical_dash.php');?>
                        
                        <?php include('includes/dashboard_box_user.php'); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header"><i class="metismenu-icon fas fa-users fa-2x"> All Active Users</i>
                                        <div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button class="active btn btn-focus"><a href="user.php">All Users</a></button>
                                                <button class="active btn btn-focus"><a href="user_students.php"> Students</a></button>
                                                <button class="btn btn-focus"><a href="user_staffs.php">Staffs</a></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                    <?php
                                        if (isset($_SESSION['error_msg'])) { ?>
                                            <div class="alert alert-warning text-danger"><?php echo $_SESSION['error_msg']; ?></div>
                                            <?php unset($_SESSION['error_msg']); ?>
                                        <?php }
                                    ?>
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <?php

                                        $query = "SELECT * FROM `users`";
                                        $result = mysqli_query($con, $query);
                                        
                                        if(!$result){
                                            die("QUERY FAILED" . mysqli_error($con));
                                        }
                                        $no = 1;
                                        ?>
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Fist Name</th>
                                                <th class="text-center">Last Name</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Gender</th>
                                                <th class="text-center">Role</th>
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
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="widget-content-left">
                                                                        <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading"><?php echo $row['firstname']; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="widget-content-center">
                                                            <div class="widget-heading"><?php echo $row['lastname']; ?></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><?php echo $row['email']; ?></td>
                                                    <td class="text-center">
                                                        <div class="text-center"><?php echo $row['gender']; ?></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="text-center"><?php echo $row['role']; ?></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="text-center"><a href="../switch.php?id=<?php echo $row['id']; ?>"><?php echo $row['status']; ?></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a title="View user" class="btn btn-outline-info btn-sm" href="./profile.php?id=<?php echo $row['id']; ?>"><i class="fas fa-eye"></i></a>
                                                        <a title="Edit user" class="btn btn-outline-warning btn-sm" href="../edit_user.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                                        <a title="Delete user" class="btn btn-outline-danger btn-sm" href="../delete_user.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                        <button class="btn-wide btn btn-success"><a href="printUser.php"><i class="metismenu-icon pe-7s-file"></i>Print User</a></button>
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