<?php
$result = mysqli_query($db , "select chatID from chat_account where accountID = ".$_SESSION["ID"]);
while($chatIDs = mysqli_fetch_array($result)):
  $chatID = $chatIDs[0];
  $sql = "select * from account, chat_account WHERE chat_account.accountID =account.ID
  and chat_account.chatID = ".$chatID." and account.ID <>".$_SESSION["ID"];
  $result2 = mysqli_query($db , $sql);
  while ($row = mysqli_fetch_array($result2)):
    if( $row['ID'] != $_SESSION["ID"]){
?>
<button onclick="chatIDFun(<?= $chatID ?>)" class="list-group-item list-group-item-action contact">
  <img src="data:image;base64,<?= base64_encode($row['image'])?>" class="img-circle user-image" >
  <div class="text-left">
    <h4><?= $row['username'] ?></h4>
    <small><?= $row['type']?></small>
  </div>
</button>
<?php } endwhile; endwhile;?>
