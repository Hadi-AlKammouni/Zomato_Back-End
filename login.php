<?php
   header('Access-Control-Allow-Origin: *');

  // connect to the db
  include './config/connect_db.php';

  if(isset($_POST['email'])){
    
    $email = $_POST['email'];
    $password = hash("sha256",mysqli_real_escape_string($mysqli, $_POST['password']));

    $sql = $mysqli -> prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $sql -> bind_param("ss", $email, $password);
    $sql -> execute();
    $sql = $sql -> get_result();
    $user = $sql -> fetch_all(MYSQLI_ASSOC);
    if($user){
      $json = json_encode($user);
      echo $json;
    } else{
      die('bye');
    }
  }
?>