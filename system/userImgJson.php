<?php
include 'init.php';
try {
  
  header("Content-Type: application/json; charset=UTF-8");
  $obj = json_decode($_GET["Im"], false);
  $sql = "SELECT image FROM account where ID = ".$obj->ID;
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result);
  echo base64_encode($row['image']);

} catch (mysqli_sql_exception $e) {
    echo $e->getMessage();
} catch (RuntimeException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}


?>
