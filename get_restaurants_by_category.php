<?php
   header('Access-Control-Allow-Origin: *');
   // connect to the db
   include './config/connect_db.php';

   // get restaurants
   if(isset($_GET['category']))
      $category = $_GET['category'];
      $query = $mysqli -> prepare('SELECT * FROM restaurants WHERE category = ?');
      $query -> bind_param("s", $category);
      $query -> execute();
      $array = $query -> get_result();
      
      $response = [];

      while($restaurant = $array -> fetch_assoc()){
         $response[] = $restaurant;
      }
      $result =  json_encode($response);
      echo $result;
?>


