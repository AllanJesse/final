<?php include('includes/header.php');
if(isset($_GET['balance'])){
    $id = $_GET['id'];
    $balance = $_GET['balance'];
    $query = "UPDATE `lending` SET `return_book`=1,`overdue_balance`= '{$balance}',`status`=$status WHERE id = $id";
    $result = mysqli_query($con, $query);
    // header('location: lending_view.php');
}

if(isset($_POST['clear'])){
    $newreceipt = $_POST['receipt'];
    $id = $_POST['id'];
    $query = "UPDATE `lending` SET `receipt`= '{$newreceipt}', `status` = 'Cleared' WHERE id = $id";
    $receipt = mysqli_query($con, $query);
    
    echo "Your Now Cleared Successful";
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
                                <div class="card-header">Returning System
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

                                        $query = "SELECT u.firstname as firstname, b.title_of_the_book as title_of_the_book, date, return_date, return_book, overdue_balance, receipt, l.id FROM lending l INNER JOIN users u on u.id=l.user_id INNER JOIN books b on b.id=l.book_id";
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
                                                <th class="text-center">Receipt</th>
                                                <th class="text-center">Submit</th>
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
                                                        $now = time();
                                                        $date = time() - strtotime($row['date']);
                                                        $days = round( $date / (60 * 60 * 24));
                                                        $overdue_balance = $days > 7 ? ($days-7) * 500 : $days * 0;
                                                        if($row['return_book']==0){
                                                        
                                                        echo $overdue_balance;
                                                        }
                                                        else{
                                                            if($row['receipt']!= null){
                                                                echo "Paid";
                                                            }
                                                            else{
                                                                echo $overdue_balance;
                                                            }
                                                            
                                                        }
                                                        ?>
                                                        </div>
                                                    </td>
                                                    <form action="" method="post">
                                                    <td class="text-center">
                                                        <?php
                                                            if($overdue_balance && $row['return_book']==1 && $row['receipt'] == null){
                                                                ?>
                                                                    <form action="" method="POST">
                                                                        <div class="input-group mb-3">
                                                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                            <input type="text" class="form-control" name='receipt' placeholder="Receipt Number" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                                                            <div class="input-group-append">
                                                                                <button class="btn btn-outline-secondary" type="submit" name="clear" id="button-addon2">submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                <?php
                                                            }?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php 
                                                            if($row['return_book']==0){ ?>
                                                            <button type="submit" class="btn btn-outline-primary" name="clear"><a href="lending_view.php?id=<?php echo $row['id']; ?>&&balance=<?php echo $overdue_balance; ?>">Clear</a></button>
                                                        <?php } ?>
                                                    </td>
                                                    </form>
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