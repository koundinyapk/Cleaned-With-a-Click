<?php require("server.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Student Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">  

  <link rel="stylesheet" href="assets/css/main.min.css">

  <!--<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="favicon/site.webmanifest">-->
</head>
<body>
  <header>
    <div class="row parent-row">
      <div class="col s1 l7 hide-on-med-and-down">
        <div class="flex-v-center">
          <h2>Cleaned with a Click</h2>
          <p>
            <span id="day_today"></span>
            <span id="date_today"></span>
            <span id="month_today"></span>
            <span id="circle">.</span>
            <span id="year_today"></span>
          </p>
          <p class="support-text">Get Your Rooms Cleaned at your convenient time <br>with ease.</p>
        </div>
      </div>
      <!-- Form -->
      <div class="col s12 l5">
        <div class="center-align form-align">
          <h4>Sign In</h4>
          <p class="hide-on-large-only">Sit back &amp; relax! Get your room cleaned <br>with just few clicks.</p>
          <div class="row">
            <form action="" method="POST" autocomplete="off" class="col s12">
              <?php include("errors.php") ?>
              <div class="row flex-h-center mb-0">
                <div class="input-field col s8">
                  <input name="studentRoll" type="number" id="rollnumber" class="validate" required>
                  <label for="rollnumber">Roll number*</label>
                </div>
              </div>
              <div class="row flex-h-center">
                <div class="input-field col s8">
                  <input name="studentPass" type="password" id="password" class="validate" required>
                  <label for="password">Password*</label>
                </div>
              </div>
              <button name="studentLogin" type="submit" class="waves-effect waves-light btn">Log in</button>
            </form>
            <a class="link" href="alogin.php">Are you an Admin? Then Login here.</a>
          </div>
        </div>
      </div>
    </div>
  </header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>