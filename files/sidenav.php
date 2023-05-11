<?php   
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
<!-- side-nav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand pt-4" href="index.php">
      <h2><?php echo $_SESSION['rollnumber']; ?></h2>
    </a>
    <ul class="nav align-items-center d-md-none">
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle">
              M
            </span>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">Housekeeper service</h6>
          </div>
          <a href="index.php?logout='1'" class="dropdown-item">
            <i class="ni ni-user-run"></i>
            <span>Logout</span>
          </a>
        </div>
      </li>
    </ul>
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
      <div class="navbar-collapse-header d-md-none">
        <div class="row">
          <div class="col-6 collapse-brand">
            <a href="index.php">
              <h3>Housekeeper</h3>
            </a>
          </div>
          <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="ni ni-tv-2"></i>Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="request.php">
            <i class="ni ni-send"></i>Requests
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="feedback.php">
            <i class="ni ni-archive-2"></i>Feedback
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">
            <i class="ni ni-single-02"></i>Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="changePassword.php">
          <i class="ni ni-archive-2"></i>Change Password  
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?logout='1'">
            <i class="ni ni-user-run"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>