<?php
function rate($vID){
  include 'init.php';

  if (isset($_POST['rating'])) {
    $post_rating = $_POST['rating'];
    $find_data = mysqli_query($db , "SELECT rate , hits ,R1,R2,R3,R4,R5 FROM view WHERE ID = ".$vID);
    $row2 = mysqli_fetch_array($find_data);
    $current_rating = $row2['rate'];
    $current_hits = $row2['hits'];
    $r1 =$row2['R1'];
    $r2 =$row2['R2'];
    $r3 =$row2['R3'];
    $r4 =$row2['R4'];
    $r5 =$row2['R5'];
    $new_hits = $current_hits + 1;
    $update_hits = mysqli_query($db , "UPDATE view SET hits = $new_hits WHERE ID= ".$vID);
    if($post_rating == 1){
      $r1 += 1;
      mysqli_query($db , "UPDATE view SET R1 = $r1 WHERE ID= ".$vID);
    }elseif ($post_rating == 2) {
      $r2 += 1;
      mysqli_query($db , "UPDATE view SET R2 = $r2 WHERE ID= ".$vID);
    }elseif ($post_rating == 3) {
      $r3 += 1;
      mysqli_query($db , "UPDATE view SET R3 = $r3 WHERE ID= ".$vID);
    }elseif ($post_rating == 4) {
      $r4 += 1;
      mysqli_query($db , "UPDATE view SET R4 = $r4 WHERE ID= ".$vID);
    }elseif ($post_rating == 5) {
      $r5 += 1;
      mysqli_query($db , "UPDATE view SET R5 = $r5 WHERE ID= ".$vID);
    }
    $new_rating = ($r1*1 + $r2*2 + $r3*3 + $r4*4 + $r5*5)/$new_hits;
    $update_rating = mysqli_query($db , "UPDATE view SET rate = ".$new_rating." WHERE ID = ".$vID);
  }
}

function view($vID , $numOfViews){
  include 'init.php';
  $old_count = $numOfViews;
  $new_count = $old_count + 1;
  $update_count = mysqli_query($db,"UPDATE view SET veiws = $new_count WHERE ID = ".$vID);
  return $new_count;
}

?>
