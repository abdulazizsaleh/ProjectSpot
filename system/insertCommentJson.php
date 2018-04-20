<?php
include 'init.php';
try {
  header("Content-Type: application/json; charset=UTF-8");
  $obj = json_decode($_POST["x"], false);
  $sql = "INSERT INTO comment values( NULL ,".$obj->projectID.", 0 ,'".$obj->content."', CURRENT_TIME())";
  $result = mysqli_query($db,$sql);
  echo $sql;
  if($result > 0){
    echo 'success';
  }else{
    throw new Exception('failed');
  }
} catch (mysqli_sql_exception $e) {
    echo $e->getMessage();
} catch (RuntimeException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
