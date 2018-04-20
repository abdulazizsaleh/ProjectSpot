<?php
require_once 'init.php';
try {
  header("Content-Type: application/json; charset=UTF-8");
  $obj = json_decode($_POST["x"], false);

  $view = mysqli_fetch_array(mysqli_query($GLOBALS['db'] , "select * from view where projectID = ".$obj->projectID));
  $sql = "";
  if ($view[0] == null) {
    $sql = "INSERT INTO  `view` (`ID`, `title`, `brief`, `description`, `rate`, `veiws` , `projectID`)
          VALUES (NULL , '".$obj->title."' , '".$obj->brief."' , '".$obj->desc."',0,0, ".$obj->projectID.")";
  } else {
    if ($obj->desc != "") {
      $sql = "UPDATE `view`
          set `title` = '".$obj->title."' , `brief` = '".$obj->brief."' , `description` = '".$obj->desc."'
          WHERE `projectID` = ".$obj->projectID;
    } else {
      $sql = "UPDATE `view`
          set `title` = '".$obj->title."' , `brief` = '".$obj->brief."' WHERE `projectID` = ".$obj->projectID;
    }
  }
  $result = mysqli_query($db , $sql);
  echo $sql;
} catch (mysqli_sql_exception $e) {
  echo $e;
} catch (RuntimeException $e) {
  echo $e;
} catch (Exception $e){
  echo $e;
}

?>
