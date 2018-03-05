<div class="container well">
  <?php
  $qry = "SELECT * FROM view";
  $result = mysqli_query($db , $qry);
  $row = mysqli_fetch_array($result);
  echo '<img src="data:image;base64,'.base64_encode($row['pic']).'" class="img-responsive" style="width:100%"/>';
  ?>
  <div class="">
    <h3><?php echo $row['title'] ?></h3>
    <h4>rate: <?php echo $row['rate'] ?></h4>
  </div>
  <p><?php echo $row['brief'] ?></p>
  <h4>views: <?php echo $row['rate'] ?></h4>
</div>
