<?php
  // No Of Requests for a Particular Student
  function getRequestCount($db){
    $hostel_name = $_SESSION['username'];
    $query_request_count = "Select count(*) from cleanrequest cr inner join student s on cr.rollnumber=s.rollnumber where s.hostel='$hostel_name'";
    $result_request_count = mysqli_query($db, $query_request_count);
    if (mysqli_num_rows($result_request_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_request_count);
    }
    return $countRow;
  }

  //No Of Complaints for a Particular Student
  function getComplantCount($db){
    $hostel_name = $_SESSION['username'];
    $query_complaint_count = "Select count(*) from complaints cr inner join student s on cr.rollnumber=s.rollnumber where s.hostel='$hostel_name'";
    $result_complaint_count = mysqli_query($db, $query_complaint_count);
    if (mysqli_num_rows($result_complaint_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_complaint_count);
    }
    return $countRow;
  }

  // No Of Suggestions for a Particular Student
  function getSuggestionCount($db){
    $hostel_name = $_SESSION['username'];
    $query_suggestion_count = "Select count(*) from suggestions cr inner join student s on cr.rollnumber=s.rollnumber where s.hostel='$hostel_name'";
    $result_suggestion_count = mysqli_query($db, $query_suggestion_count);
    if (mysqli_num_rows($result_suggestion_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_suggestion_count);
    }
    return $countRow;
  }

  // No Of Request, Housekeeper & Feedback Info
  function getRequests($username, $db){
    $hostel = $username;

    $query_request = "select cr.worker_id as wid, cr.date, cr.cleaningtime, cr.req_status, cr.request_id, hk.name, fd.rating, fd.timein, fd.timeout, s.room, s.hostel from 
    student s Inner Join cleanrequest cr on s.rollnumber = cr.rollnumber 
    Left Join housekeeper hk on cr.worker_id = hk.worker_id 
    Left Join feedback fd on fd.request_id = cr.request_id
    where s.hostel = '$hostel'
    Order by cr.date asc";
    $result_request = mysqli_query($db, $query_request);
    return $result_request;
  }


    //Workers list ordered by rating
  function getWorkers($username, $db){
    $query_request = "select worker_id as wid,name,rooms_cleaned,complaints,rating from housekeeper order by rating desc";
    $result_request = mysqli_query($db, $query_request);
    return $result_request;
  }

    // All Complaints in detail
    function getComplaints($username, $db){
      $hostel = $username;
  
      $query_request = "select c.complaint, fb.rating, cr.date, hk.name, s.room from
      complaints c Inner Join feedback fb on c.feedback_id = fb.feedback_id
      Inner Join cleanrequest cr on fb.request_id = cr.request_id
      Inner Join housekeeper hk on cr.worker_id = hk.worker_id
      Inner Join student s on c.rollnumber = s.rollnumber
      where s.hostel = '$hostel'
      Order by cr.date desc";
      $result_request = mysqli_query($db, $query_request);
      return $result_request;
    }

    // All Suggestions in detail
    function getSuggestions($username, $db){
      $hostel = $username;
  
      $query_request = "select sg.suggestion, fb.rating, cr.date, hk.name, s.room from
      suggestions sg Inner Join feedback fb on sg.feedback_id = fb.feedback_id
      Inner Join cleanrequest cr on fb.request_id = cr.request_id
      Inner Join housekeeper hk on cr.worker_id = hk.worker_id
      Inner Join student s on sg.rollnumber = s.rollnumber
      where s.hostel = '$hostel'
      Order by cr.date desc";
      $result_request = mysqli_query($db, $query_request);
      return $result_request;
    }

  

?>