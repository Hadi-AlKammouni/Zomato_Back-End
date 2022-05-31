<?php
  header('Access-Control-Allow-Origin: *');

  // connect to the db
  include './config/connect_db.php';

  if(isset($_POST['name'])){
    echo 'name';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = $mysqli -> prepare("UPDATE users  SET name = ?  WHERE email = ?");
    $query -> bind_param("ss",$name, $email);
    $query -> execute();
    
    
    $user = $mysqli -> prepare("SELECT * FROM users WHERE name = ? AND email = ? ");
    $user -> bind_param("ss",$name, $email);
    $user -> execute();
    $user = $user->get_result();
    $user = $user -> fetch_all(MYSQLI_ASSOC);
    echo json_encode($user);
  }

  if(isset($_POST['password'])){
    
    $email = $_POST['email'];
    $password = hash("sha256", $_POST['password']);
    $query = $mysqli -> prepare("UPDATE users  SET password = ?  WHERE email = ?");
    $query -> bind_param("ss",$password, $email);
    $query -> execute();
    
    
    $user = $mysqli -> prepare("SELECT * FROM users WHERE email = ? ");
    $user -> bind_param("s", $email);
    $user -> execute();
    $user = $user->get_result();
    $user = $user -> fetch_all(MYSQLI_ASSOC);
    echo json_encode($user);
  }


?>