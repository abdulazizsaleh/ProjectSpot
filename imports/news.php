<?php
try {
  $qry = "SELECT * FROM news";

  if ($result = mysqli_query($db , $qry)) {
    for($i = 0; $i < 3 ;$i++){
      $row = mysqli_fetch_array($result);
      echo '<div class="col-sm-4">';
      echo '<div class="thumbnail">';
      echo '<div style="height: 200px;">';
      echo '<img src="data:image;base64,'.base64_encode($row['image']).'" class="img-responsive" width="100%" higth="50%" />';
      echo '</div>';
      echo '<div class="caption text-left">';
      echo '<h3>'.$row['topic'].'</h3>';
      echo '<p>'.$row['content'].'</p>';
      echo '<p class="text-right"><a href="#" class="btn btn-primary" role="button">Button</a></p>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
  } else {
    throw new Exception("no news");
  }
} catch (Exception $e) {

}


?>
