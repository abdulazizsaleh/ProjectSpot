<?php
include 'init.php';
try {
  header("Content-Type: application/json; charset=UTF-8");
  $obj = json_decode($_GET["x"], false);
  $sql = "SELECT * FROM comment where projectID = ".$obj->projectID." order by date asc ";
  if($result = mysqli_query($db,$sql)){
    $output = array();
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
  }else{
    throw new mysqli_sql_exception('Error: we cannot search for a comments');
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
