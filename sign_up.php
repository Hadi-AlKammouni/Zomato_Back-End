<?php
   header('Access-Control-Allow-Origin: *');
   header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
   // if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
   //    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
   //        // may also be using PUT, PATCH, HEAD etc
   //       header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
   //    }

   //    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
   //       header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
   //    }
   //    exit(0);
   // }

   // connect to the db
   include './config/connect_db.php';
      
   if(isset($_POST['name'])){
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      
      $test = mysqli_query($conn, "SELECT * FROM users WHERE email= '$email'");
      
      // fetch the result in array bcz we only return one row
      $user = mysqli_fetch_assoc($test); 
      
      if($user){
         echo 'User already exists, Choose another email address';
      } else {
         $type = 'user';
         $password = hash("sha256",mysqli_real_escape_string($conn, $_POST['pass']));
         $sql = "INSERT INTO  users(name, email, password, type) VALUES('$name', '$email', '$password', '$type')";
         
         //save to db and check
         if(mysqli_query($conn, $sql)){
            // success
            echo "new user created";
         }else{
            // error
            echo 'query error: ';
         }
      }
   }
?>