<?php
  header('Access-Control-Allow-Origin: *');


  // connect to the db
  include './connect_db.php';
  
  $id = htmlspecialchars($_GET["id"]);
  if(isset($_GET['id'])){
    $sql = $mysqli -> prepare("SELECT * FROM restaurants WHERE restaurant_id = ?");
    $sql -> bind_param("i", $id);
    $sql -> execute();
    $sql = $sql->get_result();
    $restaurant = $sql -> fetch_assoc();

    $json = json_encode($restaurant);

    echo $json;
  }
?>
