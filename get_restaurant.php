<?php
  header('Access-Control-Allow-Origin: *');


  // connect to the db
  include './config/connect_db.php';
  
  $id = htmlspecialchars($_GET["id"]);
  if(isset($_GET['id'])){
    $sql = $mysqli -> prepare("SELECT * FROM restaurants LEFT JOIN reviews on restaurants.restaurant_id = reviews.restaurant_id LEFT JOIN users on users.user_id = reviews.user_id WHERE restaurants.restaurant_id = ?");
    $sql -> bind_param("i", $id);
    $sql -> execute();
    $sql = $sql->get_result();
    $restaurant = $sql -> fetch_all(MYSQLI_ASSOC);;
    
    $json = json_encode($restaurant);

    // =============================Insufficient Time and Brain Power To continue this =============================

  //   $query = $mysqli -> prepare("SELECT * FROM ratings WHERE restaurant_id = ?");
  //   $query -> bind_param("i", $id);
  //   $query -> execute();
  //   $query = $query->get_result();
  //   $resto = $query -> fetch_all(MYSQLI_ASSOC);;

  //   $total_rating = 0;
  //   foreach($resto as $restaurant){
  //     $total_rating = $total_rating + $restaurant['rating_value'];
  //   }
  
  // $restaurant['overall_rating'] = $total_rating;
  
  

    echo $json;
  // $total_rating = $total_rating / count($restaurants);
  // echo $total_rating;
}  
  // SELECT * 
  // FROM restaurants 
  // LEFT JOIN reviews on restaurants.restaurant_id = reviews.restaurant_id
  // WHERE restaurants.restaurant_id = 23   
?>

