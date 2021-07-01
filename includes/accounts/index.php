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
                                    <div class="card-body"><h5 class="card-title">Register Student's Receipt</h5>
                                    <?php
                                        if (count($errors) > 0) {
                                            foreach ($errors as $error) { ?>
                                                <p class="alert alert-warning text-danger p-2"><?php echo $error; ?></p>
                                            <?php }
                                        }
                                    ?>
                                        <form class="" action="" method="post">
                                        <?php

                                            $query = "SELECT * FROM users WHERE role = 'student' ";
                                            $result = mysqli_query($con, $query);

                                            if(!$result){
                                                die("QUERY FAILED" . mysqli_error($con));
                                            }
                                        ?>
                                            <div class="form-group">
                                                <label for="firstname">Student's Firstname:</label>
                                                <br>
                                                <select name="user_id" class="form-control" id="">
                                                    <option value="" selected disabled>Select Student's Name</option>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['firstname']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="author_of_the_book">First Year:</label>
                                                <div class="form-group">
                                                    <label for="author_of_the_book">First Semester:</label>
                                                    <input type="text" class="form-control" name="first1" placeholder="Enter First Semester's Receipt">
                                                </div>
                                                <div class="form-group">
                                                    <label for="author_of_the_book">Second Semester:</label>
                                                    <input type="text" class="form-control" name="semester1" placeholder="Enter Second Semester's Receipt">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="author_of_the_book">Second Year:</label>
                                                <div class="form-group">
                                                    <label for="author_of_the_book">First Semester:</label>
                                                    <input type="text" class="form-control" name="first2" placeholder="Enter First Semester's Receipt">
                                                </div>
                                                <div class="form-group">
                                                    <label for="author_of_the_book">Second Semester:</label>
                                                    <input type="text" class="form-control" name="semester2" placeholder="Enter Second Semester's Receipt">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="author_of_the_book">Third Year:</label>
                                                <div class="form-group">
                                                    <label for="author_of_the_book">First Semester:</label>
                                                    <input type="text" class="form-control" name="first3" placeholder="Enter First Semester's Receipt">
                                                </div>
                                                <div class="form-group">
                                                    <label for="author_of_the_book">Second Semester:</label>
                                                    <input type="text" class="form-control" name="semester3" placeholder="Enter Second Semester's Receipt">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block" name="recordReceipt">Record Receipt</button>
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



<?php
                                            
                                            if(isset($_POST['recordReceipt'])){
                                                $errors = array();
                                                $firstname = $_POST['user_id'];
                                                $first1 = $_POST['first1'];
                                                $semester1 = $_POST['semester1'];
                                                $first2 = $_POST['first2'];
                                                $semester2 = $_POST['semester2'];
                                                $first3 = $_POST['first3'];
                                                $semester3 = $_POST['semester3'];
                                                $status = "Cleared";
                                                
                                    
                                            if(empty($firstname)) {
                                                array_push($errors, 'Firstname Field can not be Empty');
                                            }

                                            if(empty($first1)) {
                                                array_push($errors, 'First Semester Receipt should be Field');
                                            }
                                    
                                            if(empty($semester1)) {
                                                array_push($errors, 'Second Semester Receipt should be Field');
                                            }
                                    
                                            if(empty($first2)) {
                                                array_push($errors, 'First Semester Receipt should be Field');
                                            }
                                    
                                            if(empty($semester2)) {
                                                array_push($errors, 'Second Semester Receipt should be Field');
                                            }

                                            if(empty($first3)) {
                                                array_push($errors, 'First Semester Receipt should be Field');
                                            }

                                            if(empty($semester3)) {
                                                array_push($errors, 'First Semester Receipt should be Field');
                                            }
                                    
                                            if(empty($errors)) {
                                    
                                                $query = "INSERT INTO `finance`(`user_id`, `first1`, `semester1`, `first2`, `semester2`, `first3`, `semester3`, `status`) VALUES('{$firstname}', '{$first1}', '{$semester1}', '{$first2}', '{$semester2}', '{$first3}', '{$semester3}', 'Borrowed')";
                                                $records = mysqli_query($con, $query);
                                                    if(!$records){
                                                        die("QUERY FAILED" . mysqli_error($con));
                                                    }
                                                echo "Receipt has been Registered Successful";

                                            }
                                            }
                                    
                                        ?>