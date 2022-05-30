<?php
  header('Access-Control-Allow-Origin: *');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $json = json_encode($name);
    $id = json_encode($id);
    echo $json;


?>