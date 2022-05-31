<?php
   
   // connect to db
   $mysqli = new mysqli('localhost', 'jad', 'test123', 'zomato_db');

   //check error
   if(!$mysqli){
      echo 'Connection error: ' . mysqli_connect_error();
   }

?>
