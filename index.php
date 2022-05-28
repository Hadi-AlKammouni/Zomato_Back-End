<?php

   // connect to the db
   include './config/connect_db.php';

   // get users
   $sql = 'SELECT * FROM users';

   $result = mysqli_query($conn, $sql);

   $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

   foreach($users as $user){
      echo $user['user_id'] . '<br>';
      echo $user['name'] . '<br>';
      echo $user['type'] . '<br>';
      echo $user['email'] . '<br>';
   }

   mysqli_free_result($result);


   // get restaurants
   $sql_1 = 'SELECT * FROM restaurants';

   $result_2 = mysqli_query($conn, $sql_1);

   $restaurants = mysqli_fetch_all($result_2, MYSQLI_ASSOC);

   foreach($restaurants as $restaurant){
      echo $restaurant['restaurant_id'] . '<br>';
      echo $restaurant['restaurant_name'] . '<br>';
      echo $restaurant['location'] . '<br>';
      echo $restaurant['number'] . '<br>';
      echo $restaurant['description'] . '<br>';
   }

   mysqli_free_result($result_2);

   mysqli_close($conn);
?>


