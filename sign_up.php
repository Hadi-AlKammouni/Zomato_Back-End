<?php
   header('Access-Control-Allow-Origin: *');
   header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
   // if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
   //    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
   //        // may also be using PUT, PATCH, HEAD etc
   //       header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
   //    }

   //    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
   //       header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
   //    }
   //    exit(0);
   // }

   // connect to the db
   include './config/connect_db.php';
      
   if(isset($_POST['name'])){
      $name = $_POST['name'];
      
      $email = $_POST['email'];
      
      $query = $mysqli->prepare("SELECT * FROM users WHERE email= ?");
      $query->bind_param("s", $email);
      $query->execute();
      // fetch the result in array bcz we only return one row
      $user = $query->get_result(); 
      
      if($user){
         echo 'User already exists, Choose another email address';
      } else {
         $type = 'user';
         $password = hash("sha256",mysqli_real_escape_string($mysqli, $_POST['pass']));
         $sql = "INSERT INTO  users(name, email, password, type) VALUES('$name', '$email', '$password', '$type')";
         
         //save to db and check
         if(mysqli_query($mysqli, $sql)){
            $id = mysqli_query($mysqli, "SELECT user_id FROM users WHERE email = '$email'");
            $id = mysqli_fetch_assoc($id); 
            // success
            $id = json_encode($id);
            echo $id;
         }else{
            // error
            echo 'query error: ';
         }
      }
   }
?>