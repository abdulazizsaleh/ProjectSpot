<div class="row text-center">
  <div class="col-md-7">
    <div class="well" style="height:385px;">
      <p><a href="./MailBox.php" class="btn btn-danger">Mail Box</a></p>
      <div class="list-group text-left">
        <?php
        $sql = "select * from mailBox where reciever = '".$_SESSION['email']."' limit 5";
        $result = mysqli_query($db,$sql);
        while ($row = mysqli_fetch_array($result)):
        ?>
        <a href="./mailPage.php?msg=<?= $row['ID']?>" class="list-group-item list-group-item-action briefMsgs">
          <span class="glyphicon glyphicon-envelope"></span>
          <h4><?= $row['title']." from ".$row['senderName']?></h4>
        </a>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
