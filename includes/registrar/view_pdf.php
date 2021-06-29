<?php
session_start();
	if (!isset($_SESSION['id'])) {
		header('location: login.php');
	}

include ('./partials/connection.php'); ?>
<?php include ('./partials/header.php'); ?>
<?php include ('./partials/navbar.php'); ?>

<link rel="stylesheet" href="./partials/public/css/styles.css">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
			<?php
				if (isset($_SESSION['error_msg'])) { ?>
					<div class="alert alert-warning text-danger"><?php echo $_SESSION['error_msg']; ?></div>
					<?php unset($_SESSION['error_msg']); ?>
			<?php } ?>
      <div class="card">
      <div class="flex align-items-center text-success">
        <!-- Content
        <div class="float-right">
          <a class="btn btn-outline-secondary btn-sm" href="#"><i class="far fa-file-pdf"></i> Print Users</a>
        </div> -->
      </div>
				<?php
					$file = $_GET['file'];
				 ?>
				<iframe src="<?php echo $file; ?>" width="100%" height="700px"></iframe>
      </div>
    </div>
  </div>
</div>
<?php include('./partials/footer.php') ?>
