<?php
include 'imports/head.php';
include 'imports/navigation1.php';
include 'system/init.php';
include 'system/RatesAndViews.php';
if(isset($_GET['vID'])){
    $vID = $_GET['vID'];
}else{
  echo 'error';
  die();
}

try {
  if (isset($_SESSION['ID'])) {
    $session = $_SESSION['ID'];
  } else {
    $session = '';
    throw new RuntimeException();
  }
} catch (RuntimeException $e) {

}




$qry = "SELECT * FROM view where ID =".$vID;
$result = mysqli_query($db , $qry);
$row = mysqli_fetch_array($result);


$new_count = view($vID , $row['veiws']);



///////////////////////////////////////////////////////////////////////////////////////////

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  rate($vID);
}

////////////////////////////////////////////////////////////////////////////////////////////////
?>
<div class="container-fluid">
  <div class="well col-sm-9">
    <div class="image-background">
      <img src="data:image;base64,<?= base64_encode($row['pic'])?>" class="img-responsive center"/>
    </div>
    <div class="">
      <h3><?= $row['title']?></h3>
	  <form  method="POST">
						  <select name="rating">
						  <option>1</option>
						  <option>2</option>
						  <option>3</option>
						  <option>4</option>
						  <option>5</option>
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
    </div>
  </div>

</div>

<script type="text/javascript" src="system/js/comments.js"></script>
<script type="text/javascript">
  setProjectID(<?= $vID ?>);
  setSession(<?= $session ?>);
</script>

<?php
include 'imports/footer.php';
?>
