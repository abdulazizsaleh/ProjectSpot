<?php
  include 'validation.php';
  session_start();
  try{
    //we should send a code to verify the user info
    $_SESSION["Firstname"]= validate($_POST['Firstname']);
    $_SESSION["Lastname"]= validate($_POST['Lastname']);
    $_SESSION["email"]= validate($_POST['email']);
    $_SESSION["phone"]= validate($_POST['phone']);
    $_SESSION["type"]= validate($_POST['type']);
    $_SESSION["university"]= validate($_POST['university']);
    $_SESSION["faculty"]= validate($_POST['faculty']);
    $_SESSION["department"]= validate($_POST['department']);
    $_SESSION["ID"]= validate($_POST['ID']);
    $_SESSION["code"] = rand(10000,99999);
    mail($_SESSION["email"] , "verify" , $_SESSION["code"] , "From: sys@projectspot.com");
    header("location:../verify.php");
  } catch (Exception $e){
    if(isset($_SERVER['HTTP_REFERER'])) {
      header("location:".$_SERVER['HTTP_REFERER']."?invalid=1");
    }
  }
 ?>
