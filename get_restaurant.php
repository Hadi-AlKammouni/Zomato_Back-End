<?php
  header('Access-Control-Allow-Origin: *');


  // connect to the db
  include './config/connect_db.php';
  
  $id = htmlspecialchars($_GET["id"]);
  if(isset($_GET['id'])){
    $sql = $mysqli -> prepare("SELECT * FROM restaurants LEFT JOIN reviews on restaurants.restaurant_id = reviews.restaurant_id WHERE restaurants.restaurant_id = ?");
    $sql -> bind_param("i", $id);
    $sql -> execute();
    $sql = $sql->get_result();
    $restaurant = $sql -> fetch_all(MYSQLI_ASSOC);;
    
    $json = json_encode($restaurant);

    echo $json;
  }
  
  // SELECT * 
  // FROM restaurants 
  // LEFT JOIN reviews on restaurants.restaurant_id = reviews.restaurant_id
  // WHERE restaurants.restaurant_id = 23   
?>

