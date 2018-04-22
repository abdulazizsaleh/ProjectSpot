<?php
try {
  $hostName = getenv('host');
  $username = getenv('DBusername');
  $password = trim(getenv('DBpassword'));
  $database = getenv('DBName');
  // echo 'host '.$hostName.' username '.$username.' password'.$password.' DB '.$database;
  $db = mysqli_connect($hostName,$username,$password,$database);
  if (mysqli_connect_errno()){
    throw new Exception(mysqli_connect_errno());
  }
} catch (Exception $e) {
  echo "database connection error ".$e->getMessage();
  die();
}
?>
