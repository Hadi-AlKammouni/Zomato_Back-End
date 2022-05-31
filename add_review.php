<?php
  header('Access-Control-Allow-Origin: *');

  // connect to the db
  include './config/connect_db.php';


  if(isset($_POST['user_id'])){
    echo 'hi';
    $query = $mysqli -> prepare("INSERT INTO  reviews(review_text, user_id, restaurant_id, rating_value) VALUES(?, ?, ?,?)");
    $query -> bind_param("siii",$_POST['review_text'], $_POST['user_id'], $_POST['restaurant_id'], $_POST['rating_value']);
    $query -> execute();

    echo 'Review added';
  }

?>