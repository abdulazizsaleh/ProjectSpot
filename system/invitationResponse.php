<?php
  if(isset($_GET['response'])){
      $response = $_GET['response'];
  }else{
    echo 'error';
    die();
  }

  if ($response == 0 ) {
    echo "Rejected";
  } else {
    echo "Accepted";
  }

?>
