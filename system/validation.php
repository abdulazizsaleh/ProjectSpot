<?php

function validate($input) {
  if (isset($input) && $input != null) {
    $output = htmlspecialchars(stripslashes(trim($input)));
    if ($output != '') {
      return $output;
    } else {
      throw new Exception('invalid inputs');
    }
  } else {
    throw new Exception('invalid inputs');
  }
}

function isNew($ID){
  include 'init.php';
  if ($ID != null) {
    $temp =  $title = mysqli_real_escape_string($db,validate($ID));
    $sql = "select * from project_account where accountID =".$temp;
    $result = mysqli_fetch_array(mysqli_query($db,$sql))[0];
    if ($result != null) {
      return true;
    } else {
      return false;
    }
  } else {
    throw new Exception('invalid inputs');
  }

}
?>
