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
?>
