<?php
include 'imports/head.php';
include 'imports/navigation1.php';
include 'system/init.php';
if(isset($_GET['vID'])){
    $vID = $_GET['vID'];
}else{
  echo 'error';
  die();
}

$qry = "SELECT * FROM view where ID =".$vID;
$result = mysqli_query($db , $qry);
$row = mysqli_fetch_array($result);

// below the count function 

$old_count = $row['veiws'];
$new_count = $old_count + 1;
$update_count = mysqli_query($db,"UPDATE view SET veiws = $new_count WHERE ID = ".$vID);
		
///////////////////////////////////////////////////////////////////////////////////////////
?>
<div class="container well">
  <img src="data:image;base64,<?= base64_encode($row['pic'])?>" class="img-responsive" style="width:100%"/>
  <div class="">
    <h3><?= $row['title']?></h3>
    <h4>rate:<?= $row['rate']?></h4>
  </div>
  <p> <?= $row['description'] ?></p>
  <h4> views: <?= $new_count; ?></h4>
</div>';






<div style="padding-bottom:80px"></div>
<?php
include 'imports/footer.php';
?>