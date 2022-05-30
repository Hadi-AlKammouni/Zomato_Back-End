<?php
  header('Access-Control-Allow-Origin: *');


  // connect to the db
  include './connect_db.php';

  $data = htmlspecialchars($_GET["id"]);

  $sql = "SELECT * FROM restaurants WHERE restaurant_id = '$data'";

  $result = mysqli_query($conn, $sql);

  $restaurant = mysqli_fetch_assoc($result); 

  $json = json_encode($restaurant);

  echo $json;

?>
