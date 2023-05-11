<?php
  session_start();
  require("db.php");

  // clean request handler
  if(isset($_POST['reqSubmit']) && isset($_SESSION['rollnumber'])){
    $rollnumber = $_SESSION['rollnumber'];
    $reqDate = mysqli_real_escape_string($db, $_POST['reqDate']);
    $reqTime = mysqli_real_escape_string($db, $_POST['reqTime']);
    if($reqTime>='09:00:00' && $reqTime<='17:00:00'){
    
          $reqdate = date('Y-m-d', strtotime($reqDate));
          $no_of_requests_query=mysqli_query($db,"select * from cleanrequest where rollnumber='$rollnumber'");
          $no_of_requests=mysqli_num_rows($no_of_requests_query);
          $room=mysqli_query($db,"select room from student where rollnumber='$rollnumber'");
          $row = mysqli_fetch_assoc($room);
          $room_no=$row['room'];
          $request_id=strval($rollnumber).strval($room_no).strval($no_of_requests);
          $request_id=(int)$request_id;
          //request_id=rollno+roomno+no of requests previously registered
          $req_query = "INSERT into cleanrequest(request_id,rollnumber,date,cleaningtime) values ('$request_id','$rollnumber','$reqdate','$reqTime')";
          $req_result = mysqli_query($db,$req_query);
          if ($req_result) {
            $_SESSION['req_sent'] = "Cleaning Request is sent for ".$reqdate." ".$reqTime;
          }else {
            //$_SESSION['req_failed'] = mysqli_error($db);
            //printf("Error message: %s\n", mysqli_error($db));
            $_SESSION['req_failed'] = "Request not sent. Contact Admin.";
          }
          header("Location: request.php");
    }
    else{
      $_SESSION['req_failed'] = "Request not sent. Please enter time between 9:00AM and 5:00PM.";
      header("Location: request.php");
    }
  }
  // feedback handler
  if(isset($_POST['feedSubmit'])  && isset($_SESSION['rollnumber']) ){

    $rollnumber = $_SESSION['rollnumber'];
    $feedreqid = mysqli_real_escape_string($db, $_POST['feedReqid']);
    $feedrating = mysqli_real_escape_string($db, $_POST['feedRating']);
    $feedtimein = mysqli_real_escape_string($db, $_POST['feedTimein']);
    $feedtimeout = mysqli_real_escape_string($db, $_POST['feedTimeout']);
    $feedsuggestion = mysqli_real_escape_string($db, $_POST['feedSuggestion']);
    $feedcomplaints = mysqli_real_escape_string($db, $_POST['feedComplaints']);

    $feed_query = "INSERT into feedback(feedback_id,rollnumber,request_id,rating,timein,timeout) values ('$feedreqid','$rollnumber','$feedreqid','$feedrating','$feedtimein','$feedtimeout')";

    // submit feedback
    $feed_result = mysqli_query($db, $feed_query);

    // Increment Rooms Cleaned and req status
    $workerid = mysqli_query($db, "SELECT worker_id from cleanrequest where request_id='$feedreqid'");
    $workerid2 = mysqli_fetch_assoc($workerid);
    $workerid3 = $workerid2['worker_id'];
    mysqli_query($db, "Update housekeeper set rooms_cleaned = rooms_cleaned + 1 where worker_id = '$workerid3'");
    mysqli_query($db, "Update cleanrequest set req_status = 2 where request_id = '$feedreqid'");
    mysqli_query($db,"Update housekeeper set rating = (SELECT FLOOR(AVG(rating)) FROM feedback fd INNER JOIN cleanrequest cr ON fd.feedback_id = cr.request_id WHERE worker_id = (SELECT worker_id FROM cleanrequest cr INNER JOIN feedback fd ON cr.request_id = fd.feedback_id WHERE feedback_id = '$feedreqid')) WHERE worker_id = (SELECT worker_id FROM cleanrequest cr INNER JOIN feedback fd ON cr.request_id = fd.feedback_id WHERE feedback_id = '$feedreqid')");
    if ($feed_result) {
      $_SESSION['feed_sent'] = "Feedback is sent for request id - ".$feedreqid;
    }

    $feedid = mysqli_query($db, "SELECT feedback_id from feedback where request_id='$feedreqid'");
    $feedid2 = mysqli_fetch_assoc($feedid);
    $feedid3 = $feedid2['feedback_id'];

    if($feedsuggestion != ""){
      $suggest_query = "INSERT into suggestions(suggestion_id,feedback_id,rollnumber,suggestion) values ('$feedid3','$feedid3','$rollnumber','$feedsuggestion')";
      $suggest_result = mysqli_query($db, $suggest_query);
    }

    if($feedcomplaints != ""){
      $complaint_query = "INSERT into complaints(complaint_id,feedback_id,rollnumber,complaint) values ('$feedid3','$feedid3','$rollnumber','$feedcomplaints')";
      $complaint_result = mysqli_query($db, $complaint_query);
      
      mysqli_query($db, "Update housekeeper set complaints = complaints + 1 where worker_id = '$workerid3'");
    }
    header("Location: feedback.php");
  }

  //Change Password
  if(isset($_POST['changePass']) && isset($_SESSION['rollnumber']) ){
    $oldPass=mysqli_real_escape_string($db,$_POST['oldPass']);
    $newPass=mysqli_real_escape_string($db,$_POST['newPass']);
    $oldInDb = mysqli_query($db, "SELECT password FROM student WHERE rollnumber={$_SESSION['rollnumber']}");
    if($oldInDb){
      if($oldPass==$newPass){
        $_SESSION['passUpdF']="Password not updated. Old password and New password can't be the same.";
        header("Location: changePassword.php");
      }
      elseif(mysqli_fetch_assoc($oldInDb)['password']==$oldPass){
        $newPassUpd = mysqli_query($db, "UPDATE student SET password='$newPass' WHERE rollnumber={$_SESSION['rollnumber']}");
        if($newPassUpd){
          $_SESSION['passUpdS']="Password updated successfully.";
        }
        else{
          $_SESSION['passUpdF']="Password not updated. Try again!!";
        }
      }
      else{
        $_SESSION['passUpdF']="Password not updated. Enter your old password correctly!!";
      }
      header("Location: changePassword.php");
    }
    else{
      $_SESSION['passUpdF']="Password not updated. Try again!!";
      header("Location: changePassword.php");
    }  
  }
?>