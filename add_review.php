<?php
  header('Access-Control-Allow-Origin: *');

  // connect to the db
  include './config/connect_db.php';



  if(isset($_POST['password'])){
    
    $password = $_POST['password'];
    $email =  $_POST['email'];

    $sql = $mysqli -> prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $sql -> bind_param("ss", $email, $password);
    $sql -> execute();
    $sql = $sql -> get_result();
    $sql = $sql -> fetch_all(MYSQLI_ASSOC);


    if($sql){
      $query = $mysqli -> prepare("INSERT INTO  reviews(review_text, user_id, restaurant_id, rating_value) VALUES(?, ?, ?,?)");
      $query -> bind_param("siii",$_POST['review_text'], $_POST['user_id'], $_POST['restaurant_id'], $_POST['rating_value']);
      $query -> execute();
    } else{
      echo 'Please Sign up';
    }
  }

?>