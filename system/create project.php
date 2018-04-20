<?php
require_once 'init.php';
include 'validation.php';
try {
  session_start();
  if(isset($_POST['title']) && trim($_POST['title']) != ''){
    $title = validate($_POST['title']);
    $title = stripcslashes($title);
    $title = mysqli_real_escape_string($db,$title);
    $result = mysqli_query($db,"select * from project");
    $rowcount = mysqli_num_rows($result);
    $ID = $rowcount + 1;
    $zero = 0;
    $sqlIn = "insert into project values(".$ID.",'".$title."','".date("Y-m-d")."',".$zero.")";
    $sqlJoin = "insert into project_account values(".$_SESSION["ID"].",".$ID.")";

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
  }else{
    throw new Exception('Sorry try again');
  }
} catch (Exception $e) {
    header("location:../create project.php?failed=".$e->getMessage());
}
?>
