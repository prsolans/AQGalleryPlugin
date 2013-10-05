<?php

  include "http://localhost:8888/gettys/wp-config.php";


  $db = mysqli_connect('localhost:8889', 'root', 'root', 'gettys_two');
// Test the connection:
if (mysqli_connect_errno()){
    // Connection Error
    exit("Couldn't connect to the database: ".mysqli_connect_error());
}

  global $wpdb;

  $id = $_GET['id'];
  $name = $_GET['name'];
  $desc = $_GET['description'];

  $table = $wpdb->prefix."aqdct_gallery";

  $update = "UPDATE $table SET name='$name', description='$desc' WHERE id=$id";

  echo $update;

  $success = $wpdb->query($update);

?>