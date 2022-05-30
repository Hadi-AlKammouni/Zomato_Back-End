<?php
   header('Access-Control-Allow-Origin: *');

  // connect to the db
  include './config/connect_db.php';

  if(isset($_POST['email'])){
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = hash("sha256",mysqli_real_escape_string($conn, $_POST['password']));

    $test = mysqli_query($conn, "SELECT * FROM users WHERE email= '$email' AND password='$password'");
    $user = mysqli_fetch_assoc($test); 
    if($user){
      $json = json_encode($user);
      echo $json;
    } else{
      die('bye');
    }
  }
?>