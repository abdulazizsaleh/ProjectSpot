<?php
  session_start();

  $_SESSION["Firstname"]= $_POST['Firstname'];
  $_SESSION["Lastname"]= $_POST['Lastname'];
  $_SESSION["email"]= $_POST['email'];
  $_SESSION["phone"]= $_POST['phone'];
  $_SESSION["type"]= $_POST['type'];
  $_SESSION["university"]= $_POST['university'];
  $_SESSION["faculty"]= $_POST['faculty'];
  $_SESSION["department"]= $_POST['department'];
  $_SESSION["ID"]= $_POST['ID'];

  // echo $_SESSION["Firstname"];
  // echo $_SESSION["Lastname"];
  // echo $_SESSION["email"];
  // echo $_SESSION["phone"];
  // echo $_SESSION["type"];
  // echo $_SESSION["university"];
  // echo $_SESSION["faculty"];
  // echo $_SESSION["department"];
  // echo $_SESSION["ID"];

  /*
        here sms code should send to the user phone number
  */ 

  header("location:verify.php");


 ?>
