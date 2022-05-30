<?php
   header('Access-Control-Allow-Origin: *');
   // header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
   
   // connect to the db
   include './config/connect_db.php';

   if(isset($_POST['restaurant_name'])){
      $restaurant_name = mysqli_real_escape_string($conn, $_POST['restaurant_name']);
      $test = mysqli_query($conn, "SELECT restaurant_name FROM restaurants WHERE restaurant_name = '$restaurant_name'");
      $restaurant = mysqli_fetch_assoc($test); 
      if(isset($restaurant['restaurant_name'])) {
         echo 'Restaurant name already in use, Please choose another name';
      }else{
         $category = mysqli_real_escape_string($conn, $_POST['category']);
         $description = mysqli_real_escape_string($conn, $_POST['description']);
         $location = mysqli_real_escape_string($conn, $_POST['location']);
         $number = mysqli_real_escape_string($conn, $_POST['number']);


         $sql = "INSERT INTO  restaurants(restaurant_name, category ,description ,location ,number) VALUES('$restaurant_name', '$category', '$description', '$location', '$number')";
         
         if(mysqli_query($conn, $sql)){
            $id = mysqli_query($conn, "SELECT restaurant_id FROM restaurants WHERE restaurant_name = '$restaurant_name'");
            $id = mysqli_fetch_assoc($id);
            echo json_encode($id);
         }
      }
   }
?>