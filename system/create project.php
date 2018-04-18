<?php
include 'init.php';
session_start();
$title = $_POST['title'];
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
    mkdir("projects folders/".$title , 0777 , true);
    header("location:../MyProject.php");
  }else{
    //join failed
    echo "join failed";
  }
}else{
  // create project failed
  echo "create project failed";
}
?>
