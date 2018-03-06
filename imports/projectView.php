<?php
  $qry = "SELECT * FROM view";
  $result = mysqli_query($db , $qry);
  while($row = mysqli_fetch_array($result)){
    echo '<div class="container well">';
    echo '<img src="data:image;base64,'.base64_encode($row['pic']).'" class="img-responsive" style="width:100%"/>';
    echo '<div class="">';
    echo '<h3>  '.$row['title'].'</h3>';
    echo '<h4>rate: '.$row['rate'].'</h4>';
    echo '</div>';
    echo '<p> '.$row['brief'].'</p>';
    echo '<h4> views: '.$row['veiws'].' </h4>';
    echo '</div>';
  }
?>
