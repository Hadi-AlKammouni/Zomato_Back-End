<?php

   // connect to the db
   include './config/connect_db.php';

   if(isset($_GET['submit'])){
      echo "you searched for " . $_GET['name'];
   }

   // get users
   $sql = 'SELECT * FROM users';

   $result = mysqli_query($conn, $sql);

   $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

   foreach($users as $user){
      echo 'user id: ' . $user['user_id'] . '<br>';
      echo 'user name: ' .$user['name'] . '<br>';
      echo 'user type: ' . $user['type'] . '<br>';
      echo 'user email: ' . $user['email'] . '<br>';
      echo 'user password: ' . $user['password'] . '<br>';
   }

   mysqli_free_result($result);

?>