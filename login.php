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
      // echo "Wrong Username or Password";
      // $response = [];
      // $response['message'] = false;
    }
    // // fetch the result in array bcz we only return one row
    // $user = mysqli_fetch_assoc($test); 

    // if($user){
    //   echo 'User already exists, Choose another email address';
    // } else {
    //   $type = 'user';
      
    //   $sql = "INSERT INTO  users(name, email, password, type) VALUES('$name', '$email', '$password', '$type')";

    //     //save to db and check
    //   if(mysqli_query($conn, $sql)){
    //     // success
    //     header('Location: sign_up.php');
    //   } else{
    //     // error
    //     echo 'query error: ' . mysqli_error($conn);
    //   }
    //   echo "User has been added"
    // }
  }
?>