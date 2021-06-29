<?php include('includes/header.php');
if(isset($_GET['balance'])){
    $id = $_GET['id'];
    $balance = $_GET['balance'];

    $query = "UPDATE `lending` SET `return_book`=1,`overdue_balance`= '{$balance}' WHERE id = $id";
    $result = mysqli_query($con, $query);
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
                                <div class="card-header">View Registered Books
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

                                        $query = "SELECT * FROM lending INNER JOIN books ON lending.title_of_the_book = books.book_id";
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
                                                <th class="text-center">Title of the Book</th>
                                                <th class="text-center">Borrowing Date</th>
                                                <th class="text-center">Returning Date</th>
                                                <th class="text-center">Overdue Balance</th>
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
                                                            <div class="widget-heading"><?php echo $row['title_of_the_book']; ?></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="text-center"><?php echo $row['date']; ?></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="text-center"><?php echo $row['return_date']; ?></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="text-center"><?php 
                                                        if($row['return_book']==0){
                                                        $now = time();
                                                        $date = time() - strtotime($row['date']);
                                                        $days = round( $date / (60 * 60 * 24));
                                                        $overdue_balance = $days > 7 ? ($days-7) * 500 : $days * 0;
                                                        echo $overdue_balance;
                                                        }
                                                        else{
                                                            echo "Paid";
                                                        }
                                                        ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                        if($row['return_book']==0){ ?>
                                                        <a href="lending_view.php?id=<?php echo $row['id'] ?>&&balance=<?php echo $overdue_balance ?>" class="btn btn-outline-primary"><i class="metismenu-icon pe-7s-display2"></i></a>
                                                        <?php } ?>
                                                    </td>
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