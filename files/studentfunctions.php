<?php
  // student profile
  function getStudent($roll, $db){
    $query_find_student = "select * from student where rollnumber='$roll'";
    $result_find_student = mysqli_query($db,$query_find_student);
    if (mysqli_num_rows($result_find_student) == 1) {
      $student = mysqli_fetch_assoc($result_find_student);
    }
    return $student;
  }

  // No Of requests for a student
  function getRequestCount($roll, $db){
    $query_request_count = "Select count(*) from cleanrequest where rollnumber='$roll'";
    $result_request_count = mysqli_query($db, $query_request_count);
    if (mysqli_num_rows($result_request_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_request_count);
    }
    return $countRow;
  }

  // No Of complaints for a student
  function getComplantCount($roll, $db){
    $query_complaint_count = "Select count(*) from complaints where rollnumber='$roll'";
    $result_complaint_count = mysqli_query($db, $query_complaint_count);
    if (mysqli_num_rows($result_complaint_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_complaint_count);
    }
    return $countRow;
  }

  // No Of suggestions for a student
  function getSuggestionCount($roll, $db){
    $query_suggestion_count = "Select count(*) from suggestions where rollnumber='$roll'";
    $result_suggestion_count = mysqli_query($db, $query_suggestion_count);
    if (mysqli_num_rows($result_suggestion_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_suggestion_count);
    }
    return $countRow; 
  }

  // No Of request,housekeeper & feedback info
  function getRequests($roll, $db){
    $query_request = "Select cr.request_id as reqid, hk.worker_id,cr.req_status,hk.name,cr.date, cr.cleaningtime, fd.timein, fd.timeout from cleanrequest cr Left Join housekeeper hk on cr.worker_id=hk.worker_id Left Join feedback fd on cr.request_id = fd.request_id where cr.rollnumber='$roll' order by cr.date";
    $result_request = mysqli_query($db, $query_request);
    return $result_request;
  }

?>