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

                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="main-card mb-4 card">
                                <div class="card-header">
                                    File Upload
                                </div>

                                <div class="container">
				                    <form action="uploaded.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="category">File Category</label>
                                            <select class="form-control" name="cat">
                                                <option value="" selected disabled>Choose Your File Category</option>
                                                <option>Final Report</option>
                                                <option>Examination Transcripts</option>
                                                <option>Office Document</option>
                                                <option>Scanned Image</option>
                                            </select>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <div class="col-md-12">
                                                <label for="exampleFile" class="col-sm-2 col-form-label">Upload Your File</label>
                                                <input name="file" id="exampleFile" type="file" class="form-control">
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
                                            <button type="submit" class="btn btn-outline-primary btn-lg" name="uploadBtn">Upload File</button>
                                        </div>
                                        <div class="form-group">
                                            <?php 
                                            echo (isset($update_user))? $update_user : "";
                                            echo (isset($update_user_error))? $update_user_error : "";
                                            ?>
                                        </div>
				                    </form>
                                </div>

                                <div class="d-block text-center card-footer">
                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                    <button class="btn-wide btn btn-success">Save</button>
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