<?php include('includes/header.php');
?>

<body>
<?php
                                            
    if(isset($_POST['registerBook'])){

        $firstname = $_POST['user_id'];
        $title_of_the_book = $_POST['book_id'];
        
        $query = "INSERT INTO lending (`user_id`, `book_id`, `date`,`return_date`) VALUES ('{$firstname}', '{$title_of_the_book}', now(), now() + INTERVAL + 7 DAY)";
        // echo $query;
        // die();
        $lending_system = mysqli_query($con, $query);
            if(!$lending_system){
                die("QUERY FAILED" . mysqli_error($con));
            }
        echo "The Book has been Registered Successful";
    }
                                    
?>
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
                            <?php

                                $query = "SELECT * FROM users WHERE role = 'student' ";
                                $result = mysqli_query($con, $query);

                                if(!$result){
                                    die("QUERY FAILED" . mysqli_error($con));
                                }
                            ?>
                                    <div class="card-body"><h5 class="card-title">Lend a Book</h5>
                                        <form class="" action="" method="post">
                                            <div class="form-group">
                                                <label for="firstname">Firstname:</label>
                                                <br>
                                                <select name="user_id" class="form-control" id="">
                                                    <option value="" selected disabled>Select Student's Name</option>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['firstname']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <?php

                                                $query = "SELECT * FROM books ";
                                                $result = mysqli_query($con, $query);

                                                if(!$result){
                                                    die("QUERY FAILED" . mysqli_error($con));
                                                }
                                            ?>

                                            <div class="form-group">
                                                <label for="title_of_the_book">Title of the Book:</label>
                                                <br>
                                                <select name="book_id" class="form-control" id="">
                                                <option value="" selected disabled>Select Name of the Book</option>
                                                <?php
                                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['title_of_the_book']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block" name="registerBook">Lend Book</button>
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