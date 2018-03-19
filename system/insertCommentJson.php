<?php
include 'init.php';
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$sql = "INSERT INTO comment values( NULL ,".$obj->projectID.", 0 ,'".$obj->content."', CURRENT_TIME())";
$result = mysqli_query($db,$sql);
echo $sql;
if($result > 0){
  echo 'success';
}else{
  echo 'failed';
}
?>
