<?php
   header('Access-Control-Allow-Origin: *');
   // connect to the db
   include './config/connect_db.php';

   // get restaurants
   $sql_1 = 'SELECT * FROM restaurants';

   $result_2 = mysqli_query($mysqli, $sql_1);

   $restaurants = mysqli_fetch_all($result_2, MYSQLI_ASSOC);

   foreach($restaurants as $restaurant){
      echo json_encode($restaurant);
      // echo $restaurant['restaurant_id'] . '<br>';
      // echo $restaurant['restaurant_name'] . '<br>';
      // echo $restaurant['location'] . '<br>';
      // echo $restaurant['number'] . '<br>';
      // echo $restaurant['description'] . '<br>';
   }

   mysqli_free_result($result_2);

   mysqli_close($mysqli);
?>


