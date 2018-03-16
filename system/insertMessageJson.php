<?php
include 'init.php';
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$sql = "INSERT INTO message values( NULL ,".$obj->sender.", CURRENT_TIME() ,'".$obj->content."',".$obj->chatID.")";
$result = mysqli_query($db,$sql);
echo $sql;
if($result > 0){
  echo 'success';
}else{
  echo 'failed';
}
?>
