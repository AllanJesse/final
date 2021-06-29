<?php
	include ('includes/header.php');
  include ('credentials.php');
?>
<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
              <?php
                  if (count($errors) > 0) {
                    foreach ($errors as $error) { ?>
                      <p class="alert alert-warning text-danger p-2"><?php echo $error; ?></p>
                    <?php }
                  }
              ?>
              <div class="flex align-items-center">
                  <div class="card-title text-center mt-3">
                    <img src="includes/public/imgs/atclogo.png" width="100px" height="100px">
                    <p class="h3 font-weight-bold text-center">CFS<br><small class="text-muted">Password Recovery</small></p>
                  </div>
              </div>
              <br>
              <br>
                <form action="" method="post">
                <div class="input-group mb-3 input-group-lg">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-outline-primary btn-lg" name="recPass">Recover Password</button>
                </div>
						        <p>Already a member! Please: <a href="./index.php"> Login</a></p>
                </form>  
          </div> 
        </div>                      
      </div>
</div>
<?php include('includes/footer.php'); ?>