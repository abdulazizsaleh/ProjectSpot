<?php
  if($result = mysqli_query($db , $qry)){
  while($row = mysqli_fetch_array($result)) :?>
  <div class="container well">
    <div class="image-background">
      <a href = "./projectViewMoreDetail.php?vID=<?= $row['ID'] ?>">
        <img src="data:image;base64,<?= base64_encode($row['pic'])?>" class="img-responsive center"/>
      </a>
    </div>
      <div class="">
        <h3><?= $row['title']?></h3>
        <h4>rate:<?= $row['rate']?></h4>
      </div>
      <p> <?= $row['brief'] ?> <a href = "./projectViewMoreDetail.php?vID=<?= $row['ID'] ?>">click here</a></p>
      <h4> views: <?= $row['veiws'] ?></h4>
  </div>';
<?php endwhile; }?>
