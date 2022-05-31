<?php
   header('Access-Control-Allow-Origin: *');
   // header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
   
   // connect to the db
   include './config/connect_db.php';

   if(isset($_POST['restaurant_name'])){
      $restaurant_name = $_POST['restaurant_name'];
      $query = $mysqli -> prepare("SELECT restaurant_name FROM restaurants WHERE restaurant_name = ?");
      $query -> bind_param("s", $restaurant_name);
      $query -> execute();
      $query = $query->get_result();
      $restaurant = mysqli_fetch_assoc($query); 
      if(isset($restaurant['restaurant_name'])) {
         echo 'Restaurant name already in use, Please choose another name';
      }else{
         $category = $_POST['category'];
         $description = $_POST['description'];
         $location = $_POST['location'];
         $number =$_POST['number'];

         $sql = $mysqli -> prepare("INSERT INTO  restaurants(restaurant_name, category ,description ,location ,number) VALUES(?, ?, ?, ?, ?)");
         $sql -> bind_param("ssssi",$restaurant_name, $category, $description, $location, $number);
         $sql -> execute();

         $returned_restaurant = $mysqli -> prepare("SELECT * FROM restaurants WHERE restaurant_name = '$restaurant_name'");
         $returned_restaurant -> execute();
         $returned_restaurant = $returned_restaurant -> get_result();
         $returned_restaurant = $returned_restaurant -> fetch_assoc();
         echo json_encode($returned_restaurant);
         
      }
   }
?>