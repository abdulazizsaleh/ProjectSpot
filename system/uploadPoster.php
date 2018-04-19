<?php
//
function upload($pID){
  $db = mysqli_connect('127.0.0.1','root','','projectSpot');
  if (mysqli_connect_errno()){
    echo 'Database connection is failed'.mysqli_connect_errer();
    die();
  }

  $file = $_FILES['poster']['tmp_name'];

  if(isset($file)){

  	$image = addslashes(file_get_contents($_FILES['poster']['tmp_name']));
  	//$image_name = addslashes($_FILES['image']['name']);
  	$image_size = getimagesize($_FILES['poster']['tmp_name']);
  	if($image_size==TRUE){
      $sql = "UPDATE view set pic = '".$image."' WHERE projectID = ".$pID;
      // if($GLOBALS['$db'] == null){
      //   echo 'db null';
      // }else {
      //     echo 'db not null';
      // }
  		$update_image = mysqli_query($db,$sql);

    }
  }
}

?>
