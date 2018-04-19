<?php
if($_FILES["upload_file"]["name"] != ''){
  $name =$_FILES["upload_file"]["name"];
  $path = "projects folders/".$_POST["project"]."/".$_POST["hidden_folder_name"].'/'.$name;
  if (move_uploaded_file($_FILES["upload_file"]["tmp_name"],$path)) {
    echo "uploaded";
  } else {
    echo "failed";
  }
}else{
  echo "Please Select File";
}
?>
