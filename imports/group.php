<?php
try {
  $sql = "select chatID from chat_account where accountID = ".$_SESSION["ID"]." and chat_type = 1";
  $result = mysqli_query($db , $sql);
  if($row = mysqli_fetch_array($result)){
  $chatID = $row['chatID'];
  $sql = "select title from chat where chatID = ".$chatID;
  $result = mysqli_query($db , $sql);
  $row = mysqli_fetch_array($result);
  $title = $row['title'];
  $sql = "select frist_name , last_name from account, chat_account WHERE chat_account.accountID =account.ID
    and chat_account.chatID = ".$chatID;
  $result = mysqli_query($db , $sql);
?>
  <button onclick="chatIDFun(<?= $chatID ?>)" class="list-group-item list-group-item-action contact">
    <img src="./image/image.png" class="img-circle user-image">
    <div class="text-left">
      <h4><?= $title ?></h4>
      <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)){
          if ($i != 0) {
            echo '<small> , '.$row['frist_name'].' '.$row['last_name'].'</small>';
          } else {
            echo '<small>'.$row['frist_name'].' '.$row['last_name'].'</small>';
          }
          $i++;
        }
      ?>
    </div>
  </button>

<?php
}// end of (if) that the user does not have group
  } catch (mysqli_sql_exception $e) {
    echo $e;
  } catch (RuntimeException $e) {
    echo $e;
  }
?>
