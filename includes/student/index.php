<?php include('includes/header.php');

    //accounts
    $query = "SELECT u.firstname as firstname, f.first1 as first1, f.semester1 as semester1, f.first2 as first2, f.semester2 as semester2, f.first3 as first3, f.semester3 as semester3, f.id as id, f.status as status FROM finance f INNER JOIN users u on u.id=f.user_id";
    $result = mysqli_query($con, $query);

    //library
    $query = "SELECT u.firstname as firstname, b.title_of_the_book as title_of_the_book, b.author_of_the_book as author_of_the_book, b.classification_number as classification_number, b.assertion_number as assertion_number, date, return_date, return_book, overdue_balance, receipt, status FROM lending l INNER JOIN users u on u.id=l.user_id INNER JOIN books b on b.id=l.book_id";
    $result = mysqli_query($con, $query);

    //workshop
    $query = "SELECT u.firstname as firstname, d.device_name as device_name, l.id as id, l.role as role, l.no_tools as no_tools, l.date as date, l.status as status, l.returning_date as returning_date FROM lended_devices l INNER JOIN users u ON u.id=l.user_id INNER JOIN devices d ON d.id=l.device_id";
    $result = mysqli_query($con, $query);
    
    //sports
    $query = "SELECT u.firstname as firstname, s.id as id, s.role as role, s.sport_tool as sport_tool, s.no_tools as no_tools, s.date as date, s.returning_date as returning_date, s.status as status FROM sports s INNER JOIN users u on u.id=s.user_id";
    $result = mysqli_query($con, $query);
    
    if(!$result){
        die("QUERY FAILED" . mysqli_error($con));
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
                                <div class="card-header">Clearence Form
                                    <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <button class="active btn btn-focus">This Year</button>
                                            <button class="btn btn-focus">Last Year</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">

                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Department</th>
                                                <th class="text-center">Comments</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>

                                            <tbody>

                                                <tr>
                                                    <td class="text-center text-muted">1.</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Head of Department</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Comments</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center text-muted">2.</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Head of General Department</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Comments</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center text-muted">3.</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Workshop Manager</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Comments</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center text-muted">4.</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Classmaster</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Comments</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center text-muted">5.</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Library</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Comments</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center text-muted">6.</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Sports Master</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Comments</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center text-muted">7.</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Cateress</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Comments</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center text-muted">8.</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Warden/Matron</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Comments</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center text-muted">9.</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Registrar</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Comments</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center text-muted">10.</td>
                                                    <?php
                                                    if(isset($_POST['clear'])){
                                                        $userid= $_SESSION['id'];
                                                        $query = "SELECT u.firstname as firstname, f.first1 as first1, f.semester1 as semester1, f.first2 as first2, f.semester2 as semester2, f.first3 as first3, f.semester3 as semester3, f.id as id, f.status as status FROM finance f INNER JOIN users u on u.id=f.user_id WHERE f.user_id = $userid AND f.status != 'Cleared'";
                                                        $result = mysqli_query($con, $query);
                                                        if($result){
                                                            $accounts = mysqli_fetch_assoc($result);
                                                            if(count($accounts) > 0){
                                                                foreach($accounts as $account){
                                                                    echo $account['first1'] ." " . $account['semester1'];
                                                                }
                                                            }else{
                                                                echo "<button type='button' class='btn btn-success'> Cleared <span class='badge badge-success'>..</span> </button>";
                                                            }
                                                        }else{
                                                            die('QUERY FAILED' . mysqli_error($con));
                                                        }
                                                        
                                                    }
                                                    ?>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Accounts</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Comments</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="" method="post">
                                                            <?php
                                                                $query2= "SELECT * FROM departments";
                                                                $result2= mysqli_query($con, $query2);
                                                                if(!$result2){
                                                                    die('QUERY FAILED' . mysqli_error($con));
                                                                }
                                                            ?>
                                                            <input type="hidden" name="dept_id" value="<?php echo $row['id'];?>">
                                                            <button type="submit" id="PopoverCustomT-1" class="btn btn-primary btn-sm" name="clear">Clear</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                            </tbody>
                                    </table>
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