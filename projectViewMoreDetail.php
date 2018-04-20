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
   $old_count = $row['veiws'];
   $new_count = $old_count + 1;
   $update_count = mysqli_query($db,"UPDATE view SET veiws = $new_count WHERE ID = ".$vID);



///////////////////////////////////////////////////////////////////////////////////////////

/*
$post_rating = $_POST['rating'];

$find_data = mysqli_query($db , "SELECT * FROM view WHERE ID = 3");

while($row2 = mysqli_fetch_array($find_data)){


	$current_rating = $row2['rate'];
	$current_hits = $row2['hits'];

}

$new_hits = $current_hits + 1;
$update_hits = mysqli_query($db , "UPDATE view SET hits = $new_hits WHERE ID= 3");

$pre_rating = $current_rating + $post_rating;
$new_rating = $pre_rating / $new_hits;

$update_rating = mysqli_query($db , "UPDATE view SET rate = ".$new_rating." WHERE ID = 3");
*/


////////////////////////////////////////////////////////////////////////////////////////////////
?>
<div class="container-fluid">
  <div class="well col-sm-9">
    <div class="image-background">
      <img src="data:image;base64,<?= base64_encode($row['pic'])?>" class="img-responsive center"/>
    </div>
    <div class="">
      <h3><?= $row['title']?></h3>
	  <form action="ratess.php" method="POST">
						  <select name="rating">
						  <option>1</option>
						  <option>2</option>
						  <option>3</option>
						  <option>4</option>
						  <option>5</option>
						  <option>6</option>
						  <option>7</option>
						  <option>8</option>
						  <option>9</option>
						  <option>10</option>
		  </select>
		  <input type="submit" value="Rate it!">
		</form>
      <h4>rate:<?= $row['rate']?></h4>
    </div>
    <p> <?= $row['description'] ?></p>

    <span id="projectFooter">
      <h4> views: <?= $new_count; ?></h4>
      <div onclick="dispalyComment();">
        <span class="glyphicon glyphicon-chevron-down"></span>
        comments
      </div>
    </span>


    <div id="comment">
      <div class="well-sm">
        <div id="commentForm" action="">
          <!-- <input name="attachment" type="file"> -->
          <textarea id="textIn" name="message" placeholder="enter your text" value="" class="form-control"></textarea>
          <input type="text" name="sender" value="sender username" hidden>
          <input type="datetime-local" name="date" value="" hidden>
          <button id="myBtn"onclick="add()" name="send" class="btn btn-default"><span class="glyphicon glyphicon-send"></span></button>
        </div>
      </div>
      <div class="well-sm" id="commentContainer">

        <!-- <div class="panel panel-default comment">
          <div class="panel-heading">username of the sender</div>
          <div class="panel-body">
            comment
          </div>
        </div> -->

      </div>
    </div>
  </div>
  <?php include 'system\getProjectInfoByVID.php'; ?>
  <div class="col-sm-3"> <!--  right column that contain project owner info  -->
    <div class="well text-center">
      <img src="<?php getUniversityLogo($vID); ?>" class="img-circle team-image">
      <h4>University : <?php getUniversityName($vID); ?></h4>
      <h4>Faculty : <?php getDeptName($vID); ?></h4>
      <h4>Date : <?php getProjectDate($vID); ?></h4>
      <h4 style="padding-bottom:0px;margin-bottom:0px">Team</h4>
        <p><?php getTeamMember($vID); ?></p>
      <!-- <h4>Rate : </h4> -->
    </div>
  </div>

</div>

<script type="text/javascript" src="system/js/comments.js"></script>
<script type="text/javascript">
  setProjectID(<?= $vID ?>);
</script>

<div style="padding-bottom:80px"></div>
<?php
include 'imports/footer.php';
?>
