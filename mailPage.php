<?php
include 'imports/head.php';
include 'imports/navigation2.php';
require_once 'system/init.php';


if(isset($_GET['msg'])){
  $msgID = $_GET['msg'];
}else{
  echo 'msgID error';
  die();
}
$sql = "select * from mailBox where ID = ".$msgID;
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
?>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 id="msgTitle"><?= $row['title']?></h3>
      <hr>
      <div id="msgInfo">
        from: <?= $row['senderName']?><br>
        email: <?= $row['Email']?><br>
        date: <?= $row['date']?><br>
      </div>
    </div>
    <div class="panel-body"><br><br>
      <?= $row['content']?>
      <hr>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click' , '.delete' , function (e){
      console.log('clicked');
      var old_href = $(this).attr('href');
      var new_href = old_href + "&msgID=" + <?= $msgID ?>;
      console.log(new_href);
      $(this).attr('href' , new_href);
    });
  });
</script>
<?php
mysqli_query($db,"update mailBox set state = 0 where ID = ".$msgID);

include 'imports/footer.php';
?>
