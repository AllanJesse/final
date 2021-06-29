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
                                <div class="card-header">View Returned Books
                                    <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <button class="active btn btn-focus"><a href="view_books.php"> All Books</a></button>
                                            <button class="active btn btn-focus"><a href="borrowed.php"> Borrowed Books</a></button>
                                            <button class="btn btn-focus"><a href="returnedb.php"> Returned Books</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <?php

                                        $query = "SELECT b.title_of_the_book as title_of_the_book, b.author_of_the_book as author_of_the_book, b.classification_number as classification_number, b.assertion_number as assertion_number, date, return_date, return_book, overdue_balance, receipt, status FROM lending l INNER JOIN books b on b.id=l.book_id WHERE status = 'cleared'";
                                        $result = mysqli_query($con, $query);
                                        
                                        if(!$result){
                                            die("QUERY FAILED" . mysqli_error($con));
                                        }
                                        $no = 1;
                                        ?>
                                        <thead>
                                            <tr>
                                            <th class="text-center">#</th>
                                                <th>Title of the Book</th>
                                                <th class="text-center">Author of the Book</th>
                                                <th class="text-center">Classification Number</th>
                                                <th class="text-center">Assertion Number</th>
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
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading"><?php echo $row['title_of_the_book']; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="widget-content-center">
                                                            <div class="widget-heading"><?php echo $row['author_of_the_book']; ?></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><?php echo $row['classification_number']; ?></td>
                                                    <td class="text-center">
                                                        <div class="text-center"><?php echo $row['assertion_number']; ?></div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                    </table>
                                    <div class="d-block text-center card-footer">
                                        <button class="btn-wide btn btn-success"><a href="printReturned.php"><i class="metismenu-icon pe-7s-file"></i>Print</a></button>
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