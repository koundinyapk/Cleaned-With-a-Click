<?php
  session_start();
  require("db.php");

    // clean request handler
    if(isset($_POST['allotSubmit']) && isset($_SESSION['username'])){
      $reqId = mysqli_real_escape_string($db, $_POST['allotId']);
      $workerId = mysqli_real_escape_string($db, $_POST['workerId']);
  
      $allot_query = "Update cleanrequest set worker_id = '$workerId', req_status=1 where request_id = '$reqId'";
      $allot_result = mysqli_query($db,$allot_query);
      if ($allot_result) {
        $_SESSION['worker_alloted'] = "Housekeeper successfully alloted";
      }else {
        $_SESSION['allotment_failed'] = "Failed to allot worker, contact site management.";
      }
      header("Location: allot.php");
    }

    // Worker Registration
    if(isset($_POST['regSubmit']) && isset($_SESSION['username'])){
      $name = mysqli_real_escape_string($db, $_POST['regName']);
      //$roomnumber = mysqli_real_escape_string($db, $_POST['regRoom']);
      $age = mysqli_real_escape_string($db, $_POST['regAge']);
      /*$password = '12345';
      $roomnumber = strtolower($roomnumber);*/
      $no_of_workers=mysqli_query($db,"select * from housekeeper");
      $worker_id=mysqli_num_rows($no_of_workers)+1;
      $zero=0;
      $validate=mysqli_query($db,"select * from housekeeper where name='$name'and age='$age'");
      if ($validate === false) {
        die(mysqli_error($db)); // print error message and exit
    }
      $duplicates=mysqli_num_rows($validate);
      //$hostel_name = substr($_SESSION['username'], -1);
      $reg_query = "Insert into housekeeper(worker_id,name,age,floor,rooms_cleaned,complaints,rating) values ('$worker_id', '$name', '$age', '$zero', '$zero','$zero','$zero')";
      $reg_result = mysqli_query($db, $reg_query);
      if($reg_result && $duplicates==0){
        $_SESSION['student_registered_s'] = 'Worker successfully registered. Worker Id is '. $worker_id;
      } else{
        $_SESSION['student_registered_f'] = 'Worker already Registered!';
      }
      header("Location: registerstudent.php");
    }


    // Worker Mapping
    if(isset($_POST['regKeeperSubmit']) && isset($_SESSION['username'])){
      $username=$_SESSION['username'];
      $floor = mysqli_real_escape_string($db, $_POST['regFloor']);
      $worker_id = mysqli_real_escape_string($db, $_POST['workerId']);
      $hostel_name = $username;
      $no_of_workers=mysqli_query($db,"select * from housekeeper");
      //$worker_id=mysqli_num_rows($no_of_workers)+1;
      $avg_rating=mysqli_query($db,'select avg(rating) from feedback fd inner join clean');
      $name = strtolower($name);
      $zero=0;
      $reg_query = "update housekeeper set hostel='$hostel_name', floor= '$floor' where worker_id='$worker_id'";
      $reg_result = mysqli_query($db, $reg_query);
      
      if($reg_result){
        $_SESSION['worker_registered_s'] = 'Housekeeper successfully mapped.';
      } else{
        $_SESSION['worker_registered_f'] = 'Housekeeper not successfully mapped.';// 'Housekeeper not successfully mapped.'
      }
      header("Location: registerworker.php");
    }

?>