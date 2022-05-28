<?php

 // connect to db
 $conn = mysqli_connect('localhost', 'jad', 'test123', 'zomato_db');

 //check error
 if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
 }

?>
