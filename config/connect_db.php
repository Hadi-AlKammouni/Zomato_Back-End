<?php
   
   // connect to db
   $conn = mysqli_connect('localhost', 'jad', 'test123', 'zomato_db');
   //$mysqli = new mysqli($host, $db_user, $db_pass, $db_name);

   //check error
   if(!$conn){
      echo 'Connection error: ' . mysqli_connect_error();
   }

?>
