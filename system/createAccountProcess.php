<?php
  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];
  $firstname = $_SESSION["Firstname"];
  $lastname = $_SESSION["Lastname"];
  $email = $_SESSION["email"];
  $phone = $_SESSION["phone"];
  $type = $_SESSION["type"];
  $university = $_SESSION["university"];
  $faculty = $_SESSION["faculty"];
  $department = $_SESSION["department"];
  $ID = $_SESSION["ID"];

  $db = mysqli_connect('127.0.0.1','root','','projectSpot');
  if ($db->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $username = stripcslashes($username);
  $password = stripcslashes($password);
  $firstname = stripcslashes($firstname);
  $lastname = stripcslashes($lastname);
  $email = stripcslashes($email);
  $phone =stripcslashes($phone);
  $type = stripcslashes($type);
  $university = stripcslashes($university);
  $faculty = stripcslashes($faculty);
  $department = stripcslashes($department);
  $ID = stripcslashes($ID);

  $username = mysqli_real_escape_string($db,$username);
  $password = mysqli_real_escape_string($db,$password);
  $firstname = mysqli_real_escape_string($db,$firstname);
  $lastname = mysqli_real_escape_string($db,$lastname);
  $email = mysqli_real_escape_string($db,$email);
  $phone = mysqli_real_escape_string($db,$phone);
  $type = mysqli_real_escape_string($db,$type);
  $university = mysqli_real_escape_string($db,$university);
  $faculty = mysqli_real_escape_string($db,$faculty);
  $department = mysqli_real_escape_string($db,$department);
  $ID = mysqli_real_escape_string($db,$ID);

  $sql = "insert into account (ID,username,frist_name,last_name,password,phone_num,email,university,faculty,dept,type,image,DOB,gender)
  values (".$ID.",'".$username."','".$firstname."','".$lastname."','".$password."',".$phone.",'".$email."','".$university."','".$faculty."','".$department."','".$type."',".null.",".null.",".null.")";

  if (mysqli_query($db, $sql)) {
      echo "New record created successfully";
      session_unset();
      session_destroy();
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
      header("location:createNewAccount.php");
  }
  mysqli_close($db);
  header("location:../login.php");
 ?>
