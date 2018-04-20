<?php
  require_once 'init.php';
  try {
    if (isset($_POST['username']) && isset($_POST['password'])) {
      session_start();
      $username = $_POST['username'];
      $password = $_POST['password'];
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
          $_SESSION["ID"] = $row['ID'];
          $_SESSION["email"] = $row['email'];
          header("location:../account.php");
        }else{
          throw new Exception('failed');
        }
      }else{
        throw new Exception('failed');
      }
    }else{
      throw new Exception('failed');
    }
  }catch (Exception $e) {
      header("location:../login.php?FM=".$e->getMessage());
  }

?>
