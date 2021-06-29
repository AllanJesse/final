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
                                <div class="card-header">View Uploaded Files
                                    <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <button class="active btn btn-focus">This Year</button>
                                            <button class="btn btn-focus">Last Year</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="container">
									<div class="flex align-items-center text-success mb-4">
	        							All Uploaded Documents.
									</div>
										<?php
											$query = "SELECT u.id as id, f.cat as cat, f.file as file, f.user_id as user_id FROM files f INNER JOIN users u ON u.id=f.user_id WHERE f.user_id = '$_SESSION[id]'";
											$result = mysqli_query($con, $query);
											$no = 1;
											if (mysqli_num_rows($result)) { ?>
												<table class="table table-hover table-borderless">
													<tr>
														<th>#</th>
														<th>Category</th>
														<th>View File</th>
													</tr>
													<?php
														while ($row = mysqli_fetch_assoc($result)) { ?>
															<tr>
																<td><?php echo $no++; ?></td>
																<td><?php echo $row['cat']; ?></td>
																<td><a href="view_pdf.php?file=<?php echo $row['file']; ?>">View File</a></td>
															</tr>
														<?php }	?>
												</table>
										<?php } ?>
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