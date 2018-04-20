<?php
include 'init.php';
try {
  header("Content-Type: application/json; charset=UTF-8");
  $obj = json_decode($_GET["x"], false);
  $sql = "SELECT * FROM ".$obj->table." where chatID = ".$obj->chatID." order by time asc LIMIT ".$obj->limit;
  if($result = mysqli_query($db,$sql)){
    $output = array();
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
  }else{
    throw new Exception('Error: we could not get your messages');
  }

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
