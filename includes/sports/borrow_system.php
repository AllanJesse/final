<?php include('includes/header.php');
?>

<?php
                                            
    if(isset($_POST['sportSubmit'])){
        
        $firstname = $_POST['user_id'];
        $role = $_POST['role'];
        $sport_tool = $_POST['sport_tool'];
        $no_tool = $_POST['no_tools'];
        $date = $_POST['date'];

        $query = "INSERT INTO `sports`(`user_id`, `role`, `sport_tool`, `no_tools`, `date`) VALUES ('{$firstname}', '{$role}', '{$sport_tool}', '{$no_tool}', '{$date}')";
        $sport_system = mysqli_query($con, $query);
            if(!$sport_system){
                die("QUERY FAILED" . mysqli_error($con));
            }
        echo "The Sport Tool has been Registered Successful";
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
                            <?php

                                $query = "SELECT * FROM users WHERE role = 'student' ";
                                $result = mysqli_query($con, $query);

                                if(!$result){
                                    die("QUERY FAILED" . mysqli_error($con));
                                }
                            ?>
                                    <div class="card-body"><h5 class="card-title">Sports Lending System</h5>
                                                <div>
                                                    <form action="" method="POST" class="form-inline">
                                                        <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group"><label for="firstname" class="mr-sm-2">Player's First Name</label>
                                                            <select name="user_id" class="form-control" id="">
                                                                <option value="" selected disabled>Select Student's Name</option>
                                                                <?php
                                                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['firstname']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                            <label for="role" class="mr-sm-2">Role</label>
                                                            <input type="text" class="form-control" name="role" placeholder="Enter your role">
                                                        </div>

                                                        <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                            <label for="sport_tool" class="mr-sm-2">Sport's Tool</label>
                                                            <input type="text" class="form-control" name="sport_tool" placeholder="Enter sport's tool">
                                                        </div>

                                                        <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                            <label for="no_tools" class="mr-sm-2">Number of tools</label>
                                                            <input type="text" class="form-control" name="no_tools" placeholder="Enter number of tools">
                                                        </div>

                                                        <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                            <label for="date" class="mr-sm-2">Date</label>
                                                            <input type="date" class="form-control" name="date">
                                                        </div>

                                                        <button class="btn btn-primary" type="submit" name="sportSubmit">Submit</button>
                                                    </form>
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

