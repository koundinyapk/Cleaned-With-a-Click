<?php 
  session_start();
  if (!isset($_SESSION['username'])) {
  	header("Location: alogin.php");
  }
  if (isset($_GET['logout'])) {
    unset($_SESSION['username']);
    session_destroy();
  	header("Location: alogin.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register Worker</title>
  <?php require("meta.php"); ?>
</head>
<body>
  <!-- side-nav -->
  <?php require("allotsidenav.php"); ?>
  <!-- body -->
  <div class="main-content">
      <!-- header -->
      <div class="header bg-background pb-6 pt-5 pt-md-6">
      <div class="container-fluid">
        <!-- notification -->
        <?php if (isset($_SESSION['student_registered_s'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <?php echo $_SESSION['student_registered_s']; unset($_SESSION['student_registered_s']); ?>
          </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>
        <?php if (isset($_SESSION['student_registered_f'])) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>
            <?php echo $_SESSION['student_registered_f']; unset($_SESSION['student_registered_f']); ?>
          </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>
        <?php require("allotheader.php"); ?>
      </div>
    </div>
    <!-- content -->
    <div class="container-fluid mt--5 pb-6">
      <div class="row mt-2">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <h3 class="mb-0">Register New Housekeeper</h3>
            </div>
            <div class="card-body pb-5">
              <form method="POST" autocomplete="off" action="allothandler.php">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-id">Name <span class="text-danger">*</span></label>
                        <input type="text" name="regName" id="input-name" class="form-control" required placeholder="Enter name of the worker.">
                      </div>
                    </div>
                    <!--<div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-room">Room Number <span class="text-danger">*</span></label>
                        <input type="text" name="regRoom" id="input-room" class="form-control" required placeholder="Ex : C202">
                      </div>
                    </div>-->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-age">Age <span class="text-danger">*</span></label>
                        <input type="number" name="regAge" id="input-age" class="form-control" required placeholder="Enter Age of the worker.">
                      </div>
                    </div>
                  </div>
                  <button name="regSubmit" class="btn btn-icon btn-3 btn-primary" type="submit">
                    <span class="btn-inner--text">Register</span>
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
</body>
</html>
