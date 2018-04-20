<?php
try {
  $hostName = '127.0.0.1';
  $username = 'root';
  $password = '';
  $database = 'projectSpot';
  $db = mysqli_connect($hostName,$username,$password,$database);
  if (mysqli_connect_errno()){
    throw new Exception(mysqli_connect_errno());
  }
} catch (Exception $e) {
  echo "database connection error ".$e->getMessage();
  die();
}
?>
