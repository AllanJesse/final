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
                                    <div class="card-body"><h5 class="card-title">Register New Book</h5>
                                    <?php
                                        if (count($errors) > 0) {
                                            foreach ($errors as $error) { ?>
                                                <p class="alert alert-warning text-danger p-2"><?php echo $error; ?></p>
                                            <?php }
                                        }
                                    ?>
                                        <form class="" action="" method="post">
                                            <div class="form-group">
                                                <label for="title_of_the_book">Title of the Book:</label>
                                                <input type="text" class="form-control" name="title_of_the_book" value="<?php echo $title_of_the_book; ?>" placeholder="Enter Title of the Book">
                                            </div>

                                            <div class="form-group">
                                                <label for="author_of_the_book">Author of the Book:</label>
                                                <input type="text" class="form-control" name="author_of_the_book" value="<?php echo $author_of_the_book; ?>" placeholder="Enter Author of the Book">
                                            </div>

                                            <div class="form-group">
                                                <label for="classification_number">Classification Number:</label>
                                                <input type="text" class="form-control" name="classification_number" value="<?php echo $classification_number; ?>" placeholder="Enter Classification Number">
                                            </div>

                                            <div class="form-group">
                                                <label for="assertion_number">Assertion Number:</label>
                                                <input type="text" class="form-control" name="assertion_number" value="<?php echo $assertion_number; ?>" placeholder="Enter Assertion Number">
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block" name="registerBook">Register Book</button>
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
                                            
        if(isset($_POST['registerBook'])){
            $errors = array();
            $title_of_the_book = $_POST['title_of_the_book'];
            $author_of_the_book = $_POST['author_of_the_book'];
            $classification_number = $_POST['classification_number'];
            $assertion_number = $_POST['assertion_number'];

             
        if(empty($title_of_the_book)) {
			array_push($errors, 'Title of the Book should be Field');
		}

        if(empty($author_of_the_book)) {
			array_push($errors, 'Author of the Book should be Field');
		}

        if(empty($classification_number)) {
			array_push($errors, 'Classification Number of the Book should be Field');
		}

        if(empty($assertion_number)) {
			array_push($errors, 'Assertion Number of the Book should be Field');
		}

        if(empty($errors)) {

            $query = "INSERT INTO books(`title_of_the_book`, `author_of_the_book`, `classification_number`, `assertion_number`) VALUES ('{$title_of_the_book}', '{$author_of_the_book}', '{$classification_number}', '{$assertion_number}')";
            $add_book = mysqli_query($con, $query);
                if(!$add_book){
                    die("QUERY FAILED" . mysqli_error($con));
                }
            echo "The Book has been Registered Successful";
        }
        }

    ?>