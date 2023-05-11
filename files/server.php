<?php
session_start();
require("db.php");

$errors = array();

// student login
if(isset($_POST['studentLogin'])){
  $rollnumber = mysqli_real_escape_string($db, $_POST['studentRoll']);
  $password = mysqli_real_escape_string($db, $_POST['studentPass']);
  $rollnumber = (int)$rollnumber;
  $query_find_student = "select * from student where rollnumber='$rollnumber'";
  $result_find_student = mysqli_query($db,$query_find_student);
  if (mysqli_num_rows($result_find_student) == 1) {
    $row = mysqli_fetch_assoc($result_find_student);
    if($password == $row['password']){
      $_SESSION['rollnumber'] = $rollnumber;
      $_SESSION['student_logged'] = "Logged in as student";
      header("Location: index.php");
    }else{
      array_push($errors, "Incorrect password! Please re-enter your password correctly.");
    }
  }else {
    array_push($errors, "Student not found! Register to avail the portal.");
  }
}

//admin login
if(isset($_POST['adminLogin'])){
  $adminUsername = mysqli_real_escape_string($db, $_POST['adminUsername']);
  $adminPassword = mysqli_real_escape_string($db, $_POST['adminPassword']);
  $query_find_admin = "select * from admin where username='$adminUsername'";
  $result_find_admin = mysqli_query($db,$query_find_admin);
  if (mysqli_num_rows($result_find_admin) == 1) {
    $row = mysqli_fetch_assoc($result_find_admin);
    if($adminPassword == $row['password']){
      $_SESSION['username'] = $adminUsername;
      $_SESSION['admin_logged'] = "Logged in as admin";
      header("Location: allot.php");
    }else{
      array_push($errors, "Incorrect password! Please re-enter your password correctly.");
    }
  }else {
    array_push($errors, "Admin not found!Please enter correct credentials.");
  }
}

?>