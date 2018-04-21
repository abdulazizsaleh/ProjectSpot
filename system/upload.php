<?php
require_once 'init.php';
include 'validation.php';
try {
  if($_FILES["upload_file"]["name"] != '' && isset($_POST['modifier']) && isset($_POST["project"])){
    $filename =$_FILES["upload_file"]["name"];
    $project = mysqli_real_escape_string($db , validate($_POST["project"]));
    $path = "projects folders/".$_POST["project"]."/".$_POST["hidden_folder_name"].'/'.$filename;
    $modifier = validate($_POST['modifier']);
    if (move_uploaded_file($_FILES["upload_file"]["tmp_name"],$path)) {
      $projectID = mysqli_fetch_array(mysqli_query($db , "select projectID from project where title = '".$project."'"))[0];
      $sql = "INSERT INTO update_history values (NULL , '".$filename."' , ".$modifier." , ".$projectID." , NULL)";
      if (mysqli_query($db , $sql)) {
        echo "uploaded";
      } else {
        throw new Exception("Error: we could not register the update in the database");
      }
    } else {
      echo "failed";
    }
  }else{
    echo "Please Select File";
  }
} catch (Exception $e) {
  echo $e->getMessage();
}


?>
