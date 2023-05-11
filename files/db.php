<?php
   $dbhost = //default port in your local system ;
   $dbuser = //user in your local system ;
   $dbpass = //password of your user;
   $dbname = //database that was created to store the data. ;
   $db = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if (!$db) {
      die("Connection failed: " . mysqli_connect_error());
    }

?>