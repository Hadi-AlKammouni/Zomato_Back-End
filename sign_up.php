<?php

   // connect to the db
   include './config/connect_db.php';

   if(isset($_POST['submit'])){
      $name = mysqli_real_escape_string($conn, $_POST['name']);

      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $test = mysqli_query($conn, "SELECT * FROM users WHERE email= '$email'");
      
      // fetch the result in array bcz we only return one row
      $user = mysqli_fetch_assoc($test); 

      if($user){
         echo 'User already exists, Choose another email address';
      } else{
         $type = 'user';
         $password = hash("sha256",mysqli_real_escape_string($conn, $_POST['password']));
         $sql = "INSERT INTO  users(name, email, password, type) VALUES('$name', '$email', '$password', '$type')";

         //save to db and check
         if(mysqli_query($conn, $sql)){
            // success
            header('Location: sign-up.php');
         } else{
            // error
            echo 'query error: ' . mysqli_error($conn);
         }
      }
   }
?>

<html>
   <head>
      <title>sign up</title>
   </head>
   <body>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         name:       <input type="text" name="name" placeholder="enter your name">
         email:      <input type="text" name="email" placeholder="enter your name">
         password:   <input type="text" name="password" placeholder="enter your name">
         <input type="submit" name="submit" value="submit">
      </form>
   </body>
</html>