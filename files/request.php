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
  <title>Clean Request</title>
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
        <!-- notification  -->
        <?php if (isset($_SESSION['req_sent'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <?php echo $_SESSION['req_sent']; unset($_SESSION['req_sent']); ?>
          </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>

        <!-- notification  -->
        <?php if (isset($_SESSION['req_failed'])) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['req_failed']; unset($_SESSION['req_failed']); ?>
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
              <h3 class="mb-0">Send Clean Request</h3>
            </div>
            <div class="card-body pb-5">
              <form autocomplete="off" method="POST" action="studenthandler.php">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="dateInput">Date <span class="text-danger">*</span></label>
                        <div class="input-group input-group-alternative">
                          <input name="reqDate" id="dateInput" placeholder="Select date" min="" type="date" style="width:100%; height:calc(2.75rem + 2px);color: #8898aa;border-radius: .375rem;padding: .625rem .75rem;box-shadow: 0 1px 3px rgba(50,50,93,.15), 0 1px 0 rgba(0,0,0,.02);border: 0;font-size: .875rem;" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-timein">Available Time <span class="text-danger">*</span></label>
                        <input name="reqTime" type="time" id="input-timein" class="form-control form-control-alternative" required>
                      </div>
                    </div>
                  </div>
                  <button name="reqSubmit" class="btn btn-icon btn-3 btn-primary" type="submit">Submit</button>
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
