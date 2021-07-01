<?php include('includes/header.php');
 
?>
<?php
    $cleared = 0;
    $queryfetch = mysqli_query($con, 'SELECT status,title_of_the_book FROM lending INNER JOIN books ON lending.book_id=books.id where user_id='.$_SESSION['id'].'');
    // echo mysqli_num_rows($queryfetch);
    $books = [];
    if (mysqli_num_rows($queryfetch)!=0) {
        while($lend =mysqli_fetch_array($queryfetch)){
            
            if ($lend['status']==='Borrowed') {
                array_push($books,$lend['title_of_the_book']);
                $cleared = 1;
                
            }
        }
    }

        #workshop
    $cleared_manager = 0;
    $queryfetch_ws = mysqli_query($con, 'SELECT status,device_name FROM lended_devices INNER JOIN devices ON lended_devices.device_id=devices.id where user_id='.$_SESSION['id'].'');
    // echo mysqli_num_rows($queryfetch);
    $devices = [];
    if (mysqli_num_rows($queryfetch_ws)!=0) {
        while($lend_ws=mysqli_fetch_array($queryfetch_ws)){
            
            if ($lend_ws['status']==='Borrowed') {
                array_push($devices,$lend_ws['device_name']);
                $cleared_manager = 1;
            }
        }
    }


         #wsports
         $cleared_sports = 0;
         $queryfetch_sp= mysqli_query($con, 'SELECT status,sport_tool FROM sports where user_id='.$_SESSION['id'].'');
         // echo mysqli_num_rows($queryfetch);
         $sport = [];
         if (mysqli_num_rows($queryfetch_sp)!=0) {
             while($lend_sp=mysqli_fetch_array($queryfetch_sp)){
                 
                 if ($lend_sp['status']==='Borrowed') {
                     array_push($sport,$lend_sp['sport_tool']);
                     $cleared_sports = 1;
                 }
             }
         }

         #acccounts
         $cleared_account = 0;
         $queryfetch_acc= mysqli_query($con, 'SELECT status FROM finance where user_id='.$_SESSION['id'].'');
         // echo mysqli_num_rows($queryfetch);
        //  $accounts = [];
         if (mysqli_num_rows($queryfetch_acc)!=0) {
             while($lend_acc=mysqli_fetch_array($queryfetch_acc)){
                 
                 if ($lend_acc['status']==='Borrowed') {
                    //  array_push($accounts,$lend_acc['sport_tool']);
                     $cleared_account = 1;
                 }
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
                                                    <td class="text-center">None</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-success" type="button" disabled>
                                                            <!-- <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> -->
                                                            <span class="visually-hidden">Cleared  <i class="fa fa-check"></i></span>
                                                        </button>
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
                                                    <td class="text-center">None</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-success" type="button" disabled>
                                                            <!-- <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> -->
                                                            <span class="visually-hidden">Cleared  <i class="fa fa-check"></i></span>
                                                        </button>
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
                                                    <td class="text-center"><?php if($cleared_manager==0){
                                                        echo "None";
                                                    }else{
                                                        foreach ($devices as $bk => $value) {
                                                            echo $value."<br/>";
                                                        }
                                                    }?></td>
                                                    <td class="text-center">
                                                    
                                                    <?php
                                                        if ($cleared_manager==1) {?>
                                                    
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                        <?php
                                                        } else{?>
                                                     <button class="btn btn-success" type="button" disabled>
                                                            <!-- <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> -->
                                                            <span class="visually-hidden">Cleared  <i class="fa fa-check"></i></span>
                                                        </button>
                                                    <?php
                                                        }
                                                    ?>
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
                                                    <td class="text-center">None</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-success" type="button" disabled>
                                                            <!-- <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> -->
                                                            <span class="visually-hidden">Cleared  <i class="fa fa-check"></i></span>
                                                        </button>
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
                                                    <td class="text-center"><?php if($cleared==0){
                                                        echo "None";
                                                    }else{
                                                        foreach ($books as $bk => $value) {
                                                            echo $value."<br/>";
                                                        }
                                                    }?></td>
                                                    <td class="text-center">
                                                    
                                                    <?php
                                                        if ($cleared ==1) {?>
                                                    
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                        <?php
                                                        } else{?>
                                                     <button class="btn btn-success" type="button" disabled>
                                                            <!-- <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> -->
                                                            <span class="visually-hidden">Cleared  <i class="fa fa-check"></i></span>
                                                        </button>
                                                    <?php
                                                        }
                                                    ?>
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
                                                    <td class="text-center"><?php if($cleared_sports==0){
                                                        echo "None";
                                                    }else{
                                                        foreach ($sport as $bk => $value) {
                                                            echo $value."<br/>";
                                                        }
                                                    }?></td>
                                                    <td class="text-center">
                                                    
                                                    <?php
                                                        if ($cleared_sports==1) {?>
                                                    
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                        <?php
                                                        } else{?>
                                                     <button class="btn btn-success" type="button" disabled>
                                                            <!-- <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> -->
                                                            <span class="visually-hidden">Cleared  <i class="fa fa-check"></i></span>
                                                        </button>
                                                    <?php
                                                        }
                                                    ?>
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
                                                    <td class="text-center">None</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-success" type="button" disabled>
                                                            <!-- <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> -->
                                                            <span class="visually-hidden">Cleared  <i class="fa fa-check"></i></span>
                                                        </button>
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
                                                    <td class="text-center">None</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-success" type="button" disabled>
                                                            <!-- <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> -->
                                                            <span class="visually-hidden">Cleared  <i class="fa fa-check"></i></span>
                                                        </button>
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
                                                    <td class="text-center">None</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-success" type="button" disabled>
                                                            <!-- <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> -->
                                                            <span class="visually-hidden">Cleared  <i class="fa fa-check"></i></span>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center text-muted">10.</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Accounts</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><?php if($cleared_account==0){
                                                        echo "None";
                                                    }else{
                                                        echo "Check with Account Office";
                                                    }?></td>
                                                    <td class="text-center">
                                                    
                                                    <?php
                                                        if ($cleared_account==1) {?>
                                                    
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Pending...</span>
                                                        </button>
                                                        <?php
                                                        } else{?>
                                                     <button class="btn btn-success" type="button" disabled>
                                                            <!-- <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> -->
                                                            <span class="visually-hidden">Cleared  <i class="fa fa-check"></i></span>
                                                        </button>
                                                    <?php
                                                        }
                                                    ?>
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