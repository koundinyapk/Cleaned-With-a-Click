<?php 
  session_start();
  if (!isset($_SESSION['rollnumber'])) {
  	header("Location: login.php");
  }
  if (isset($_GET['logout'])) {
    unset($_SESSION['rollnumber']);
    session_destroy();
    mysqli_close($db);
  	header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Change Password</title>
  <?php require("meta.php"); ?>
  
</head>
<body>
  <!-- side-nav -->
  <?php require("sidenav.php"); ?>
  <!-- body -->
  <div class="main-content">
      <!-- header -->
      <div class="header bg-background pb-6 pt-5 pt-md-6">
      <div class="container-fluid">
        <!-- notification -->
        <?php if (isset($_SESSION['passUpdS'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <?php echo $_SESSION['passUpdS']; unset($_SESSION['passUpdS']); ?>
          </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>

        <!-- notification -->
        <?php if (isset($_SESSION['passUpdF'])) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['passUpdF']; unset($_SESSION['passUpdF']); ?>
          </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>


        <?php require("headerstats.php"); ?>
      </div>
    </div>
    <!-- content -->
    <div class="container-fluid mt--5 pb-5">
      <div class="row mt-2">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <h3 class="mb-0">Change your Password</h3>
            </div>
            <div class="card-body pb-5">
              <form autocomplete="off" method="POST" action="studenthandler.php">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="oldPass">Old Password <span class="text-danger">*</span></label>
                        <div class="input-group input-group-alternative">
                          <input name="oldPass" id="oldPass" placeholder="Enter your old password" min="" type="password"  class="form-control form-control-alternative" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="newPass">New Password <span class="text-danger">*</span></label>
                        <input name="newPass" type="password" placeholder="Enter your new password" min="" id="newPass" class="form-control form-control-alternative" required>
                      </div>
                    </div>
                  </div>
                  <button name="changePass" class="btn btn-icon btn-3 btn-primary" type="submit">
                      <span class="btn-inner--text">Submit</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="assets/js/argon.min.js"></script>
  <script src="assets/js/date.js"></script>
</body>
</html>
