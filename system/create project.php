<?php
require_once 'init.php';
include 'validation.php';
try {
  session_start();
  if(isset($_POST['title']) && trim($_POST['title']) != ''){
    if (mysqli_fetch_array(mysqli_query($db,"select projectID from project_account where accountID = ".$_SESSION["ID"]))[0] == null) {
      $title = validate($_POST['title']);
      $title = stripcslashes($title);
      $title = mysqli_real_escape_string($db,$title);
      $result = mysqli_query($db,"select * from project");
      $rowcount = mysqli_num_rows($result);
      $ID = $rowcount + 1;
      $zero = 0;
      $sqlIn = "insert into project values(".$ID.",'".$title."','".date("Y-m-d")."',".$zero.")";
      $sqlJoin = "insert into project_account values(".$_SESSION["ID"].",".$ID.")";

      if(mysqli_query($db,"insert into chat values (NULL , ".$ID." , 'Group' , NULL)")){
        $chatID =  mysqli_fetch_array(mysqli_query($db,"SELECT chatID FROM chat ORDER BY chatID DESC LIMIT 1"))[0];
        if (mysqli_query($db,"INSERT INTO chat_account VALUES (".$_SESSION["ID"]." , ".$chatID." , 1)")) {
          // continue
        } else {
          throw new Exception('Error: we cannot link chat group with account');
        }
      }else{
        throw new Exception('Error: we cannot link chat group with account');
      }
      // could be issue with sync
      // $sql = "SELECT chatID FROM chat ORDER BY chatID DESC LIMIT 1";// could be issue with sync
      // $rr = mysqli_query($db,$sql);
      // $record = mysqli_fetch_array($rr);
      // $chatID = $record[0];

      $resultIn = mysqli_query($db,$sqlIn);
      if( $resultIn == 1){
        $sqlJoin = mysqli_query($db,$sqlJoin);
        if($sqlJoin >= 1){
          mkdir("projects folders/".$title , 0775 , true);
          header("location:../MyProject.php?success=1");
        }else{
          throw new Exception('Error: we cannot link the project with the account');
        }
      }else{
        throw new Exception('Error: we cannot create new folder to the project');
      }
    } else {
      throw new Exception('you already have project');
    }
  }else{
    throw new Exception('Sorry try again');
  }
} catch (Exception $e) {
    header("location:../create project.php?failed=".$e->getMessage());
}
?>
