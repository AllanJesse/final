<?php include('includes/header.php');

// $id = $_GET['user_id'];
if(isset($_POST['profilePhoto'])){

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $id = $_POST['user_id'];

    move_uploaded_file($post_image_temp, "assets/images/$post_image" );

    $query = "INSERT INTO `images` (`user_id`, `post_image`) VALUES ('{$id}', '{$post_image}')";
    $result = mysqli_query($con, $query);
    if(!$result){
        die ("QUERY FAILED . mysqli_error('$con')");
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
                                    <i class="metismenu-icon pe-7s-user fa-2x"> Profile Photo</i>    
                                </div>

                                <div class="container">
				                    <form action="" method="post" enctype="multipart/form-data">

                                        <div class="position-relative row form-group">
                                            <div class="col-md-12">
                                                <label for="exampleFile" class="col-sm-2 col-form-label">Profile Picture</label>
                                                <input name="image" id="exampleFile" type="file" class="form-control">
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
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-primary btn-lg" name="profilePhoto">Upload Profile Photo</button>
                                        </div>

				                    </form>
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