<?php
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $db = mysqli_connect('127.0.0.1','root','','projectSpot');
  // to prevent injection
  $username = stripcslashes($username);
  $password = stripcslashes($password);
  $username = mysqli_real_escape_string($db,$username);
  $password = mysqli_real_escape_string($db,$password);

  $result = mysqli_query($db,"select * from account where username = '".$username."' and password = '".$password."'");
  $row = mysqli_fetch_array($result);
  if ($username != null && $password != null){
    if ($row['username']  == $username && $row['password'] == $password ){
      $_SESSION["username"] = $username;
      header("location:../account.php");
    }else{
      header("location:../login.php");
    }
  }else{
    header("location:../login.php");
  }


?>
