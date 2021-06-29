<?php include('includes/header.php');

if (isset($_POST['user_settings'])) {
    $firstname = mysqli_real_escape_string($con, trim(strip_tags($_POST['firstname'])));
    $lastname = mysqli_real_escape_string($con, trim(strip_tags($_POST['lastname'])));
    $email = mysqli_real_escape_string($con, trim(strip_tags($_POST['email'])));
    
    $updatequery = "UPDATE `users` SET `firstname` = '{$firstname}', `lastname` = '{$lastname}', `email` = '{$email}' WHERE `users`.`id` = '$_SESSION[id]'";
    $updateresult = mysqli_query($con, $updatequery);
    if ($updateresult) {
        $update_user = "<span class='alert alert-success text-success'>User Update Setting is Complete</span>";
    }
    else {
       $update_user_error = "<span class='alert alert-danger text-danger'>Error in Updating User Settings</span>";
    }
}
if (isset($_POST['contact_settings'])) {
    $gender = mysqli_real_escape_string($con, trim(strip_tags($_POST['gender'])));
    $level = mysqli_real_escape_string($con, trim(strip_tags($_POST['level'])));
    
    $update_query = "UPDATE `users` SET `gender` = '{$gender}', `level` = '{$level}' WHERE `users`.`id` = '$_SESSION[id]'";
    $update_result = mysqli_query($con, $update_query);
    if ($update_result) {
        $update_contact = "<span class='alert alert-success text-success'>Contacts has been Updated Successfully</span>";
    }
    else {
        $update_contact_error = "<span class='alert alert-danger text-danger'>Contacts Didn't Updated</span>";
    }
}

if (isset($_POST['profileBtn'])) {
    $image = mysqli_real_escape_string($con, trim(strip_tags($_FILES['image']['name'])));
    
    $update_query = "UPDATE `images` SET `post_image` = '{$image}' WHERE `images`.`user_id` = '$_SESSION[id]'";
    $update_result = mysqli_query($con, $update_query);
    if ($update_result) {
        $update_contact = "<span class='alert alert-success text-success'>Profile Picture has been Updated Successfully</span>";
    }
    else {
        $update_contact_error = "<span class='alert alert-danger text-danger'>Profile Picture Didn't Updated</span>";
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

                    <?php include('includes/dashboard_box.php'); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">
                                    <i class="metismenu-icon pe-7s-user fa-2x"> Edit Profile</i>    
                                </div>

                                <div class="container-fluid">
                                    <h3 class="text-dark mb-4">Profile</h3>
                                    <?php
                                    $query = "SELECT u.id as id, i.post_image as post_image, i.user_id as user_id FROM images i INNER JOIN users u ON u.id=i.user_id WHERE i.user_id = '$_SESSION[id]'";
                                    $rsl= mysqli_query($con, $query);
                                    if(!$rsl){
                                        die("QUERY FAILED . mysqli_error('$con')");
                                    }
                                    else {
                                        $imgrow = mysqli_fetch_assoc($rsl);
                                    }
                                    ?>
                                    <div class="row mb-3">
                                        <div class="col-lg-4">
                                            <div class="card mb-3">
                                                <div class="card-body text-center shadow">
                                                    <div class="widget-content-left">
                                                        <img width="150" class="rounded-circle" src="assets/images/<?php echo $imgrow['post_image']; ?>" alt="">
                                                    </div>
                                                    <div class="mb-3">
				                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="col-md-12">
                                                                <input name="image" id="exampleFile" type="file" class="form-control-sm mt-3">
                                                                <?php
                                                                $queryid= "SELECT * FROM users WHERE id = '$_SESSION[id]'";
                                                                $resultid= mysqli_query($con, $queryid);
                                                                if(!$resultid){
                                                                    die("QUERY FAILED . mysqli_error('$con')");
                                                                }
                                                                else{
                                                                    $rowid = mysqli_fetch_assoc($resultid);
                                                                }
                                                                ?>
                                                                <input type="hidden" name="user_id" value="<?php echo $rowid['id']; ?>">
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <button type="submit" class="btn btn-outline-primary btn-sm" name="profileBtn">Change Photo</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card shadow mb-3">
                                                        <div class="card-header py-3">
                                                            <p class="text-primary m-0 font-weight-bold">User Settings</p>
                                                        </div>
                                                        <div class="card-body">
                                                            <form method="post">
                                                            <?php
                                                                $queryid= "SELECT * FROM users WHERE id = '$_SESSION[id]'";
                                                                $resultid= mysqli_query($con, $queryid);
                                                                if(!$resultid){
                                                                    die("QUERY FAILED . mysqli_error('$con')");
                                                                }
                                                                else{
                                                                    $rowid = mysqli_fetch_assoc($resultid);
                                                                }
                                                            ?>
                                                                <div class="form-row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label for="first_name"><strong>First Name</strong></label>
                                                                            <input class="form-control form-control-sm" type="text" value="<?php echo $rowid['firstname']; ?>" name="firstname">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label for="first_name"><strong>Last Name</strong></label>
                                                                            <input class="form-control form-control-sm" type="text" value="<?php echo $rowid['lastname']; ?>" name="lastname">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label for="first_name"><strong>Email</strong></label>
                                                                            <input class="form-control form-control-sm" type="text" value="<?php echo $rowid['email']; ?>" name="email">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input class="btn btn-info btn-sm" type="submit" value="save settings" name="user_settings">
                                                                </div>
                                                                <div class="form-group">
                                                                <?php 
                                                                echo (isset($update_user))? $update_user : "";
                                                                echo (isset($update_user_error))? $update_user_error : "";
                                                                ?>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div class="card shadow">
                                                        <div class="card-header py-3">
                                                            <p class="text-primary m-0 font-weight-bold">Contact Settings</p>
                                                        </div>
                                                        <div class="card-body">
                                                            <form method="post">
                                                                <div class="form-row">
                                                                <div class="col">
                                                                        <div class="form-group">
                                                                            <label for="first_name"><strong> Gender</strong></label>
                                                                            <select name="gender" class="form-control form-control-sm" id="">
                                                                                <option value="" selected disabled>Choose Your Gender</option>
                                                                                <option>Male</option>
                                                                                <option>Female</option>
                                                                                <option>Others</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label for="first_name"><strong> Level</strong></label>
                                                                            <select name="level" class="form-control form-control-sm" id="">
                                                                                <option value="" selected disabled>Choose Your Level</option>
                                                                                <option>NTA Level 06</option>
                                                                                <option>NTA Level 08</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input class="btn btn-info btn-sm" type="submit" value="save settings" name="contact_settings">
                                                                </div>
                                                                <div class="form-group">
                                                                <?php
                                                                echo (isset($update_contact))? $update_contact : "";
                                                                echo (isset($update_contact_error))? $update_contact_error : "";
                                                                ?>
                                                                </div>
                                                            </form>
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