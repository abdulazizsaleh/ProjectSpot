<?php
  require_once 'init.php';
  session_start();

  try {
    if(isset() && isset()){
      $username = stripcslashes($_POST['username']);
      $password = stripcslashes($_POST['password']);
      $firstname = stripcslashes($_SESSION["Firstname"]);
      $lastname = stripcslashes($_SESSION["Lastname"]);
      $email = stripcslashes($_SESSION["email"]);
      $phone = stripcslashes($_SESSION["phone"]);
      $type = stripcslashes($_SESSION["type"]);
      $university = stripcslashes($_SESSION["university"]);
      $faculty = stripcslashes($_SESSION["faculty"]);
      $department = stripcslashes($_SESSION["department"]);
      $ID = stripcslashes($_SESSION["ID"]);

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

      $sql = "insert into account (ID,username,frist_name,last_name,password,phone_num,email,university,faculty,dept,type)
      values (".$ID.",'".$username."','".$firstname."','".$lastname."','".$password."',".$phone.",'".$email."','".$university."','".$faculty."','".$department."','".$type."')";
      if (mysqli_query($db, $sql)) {
          session_unset();
          session_destroy();
          header("location:../login.php");
      } else {
        throw new Exception('Error: we cannot create the account');
      }
      mysqli_close($db);
    }else{
      throw new Exception('Sorry try again');
    }
  } catch (mysqli_sql_exception $e) {
      echo $e->getMessage();
      die();
  } catch (RuntimeException $e) {
      echo $e->getMessage();
      die();
  } catch (Exception $e) {
      echo $e->getMessage();
      die();
  }

 ?>
