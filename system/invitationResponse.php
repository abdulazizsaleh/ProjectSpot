<?php
session_start();
require_once 'init.php';
try {
  if(isset($_GET['response']) && isset($_GET['projectID']) && isset($_GET['msgID'])){
        $response = mysqli_real_escape_string($db,$_GET['response']);
        $projectID =mysqli_real_escape_string($db, $_GET['projectID']);
        $ID = mysqli_real_escape_string($db,$_SESSION['ID']);
        $msgID = mysqli_real_escape_string($db,$_GET['msgID']);
    }else{
      throw new Exception('Error: we cannot find the link variable');
    }

    if ($response == 0 ) {//Rejected
      $sql = "delete from mailbox where ID =".$_GET['msgID'];
      $r = mysqli_query($db,$sql);
      header("location:../MailBox.php");
    } else {
      $sql = "SELECT accountID FROM project_account WHERE projectID = ".$projectID;
      $result = mysqli_query($db,$sql);
      // loop for the account and create chat and link it
      while ($row = mysqli_fetch_array($result)) {
        $accountID = $row['accountID'];
        $sql = "INSERT INTO chat VALUES (NULL , ".$projectID." , '' , NULL)";
        $r = mysqli_query($db,$sql);
        if($r){
          $sql = "SELECT chatID FROM chat ORDER BY chatID DESC LIMIT 1";// could be issue with sync
          $rr = mysqli_query($db,$sql);
          $record = mysqli_fetch_array($rr);
          $chatID = $record[0];
          $sql = "INSERT INTO chat_account VALUES (".$ID." , ".$chatID." , 0)";
          $rr = mysqli_query($db,$sql);
          $sql = "INSERT INTO chat_account VALUES (".$accountID." , ".$chatID." , 0)";
          $rr = mysqli_query($db,$sql);
          if (!$rr){
             throw new Exception('Error: we cannot link the users with chats');
           }
        }else{
          throw new Exception('Error: we cannot create new chat record');
        }
      }
      $sql = "select chat.chatID from chat , chat_account where chat.chatID = chat_account.chatID and chat.projectID = ".$projectID." and chat_account.chat_type = 1 LIMIT 1";
      $r = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($r);
      $chatID = $row['chatID'];
      $sql = "INSERT INTO chat_account VALUES (".$ID." , ".$chatID." , 1)";
      $r = mysqli_query($db,$sql);
      if (!$r){
         throw new Exception('Error: we cannot link user with group');
       }
      $sql = "INSERT INTO project_account VALUES ( ".$ID." , ".$projectID." )";
      $r = mysqli_query($db,$sql);
      if (!$r){
         throw new Exception('Error: we cannot link account with project ');
      }
      $sql = "delete from mailbox where ID =".$msgID." AND title = 'invitation'";
      $r = mysqli_query($db,$sql);
      header("location:../MailBox.php?success=1");
    }
} catch (mysqli_sql_exception $e) {
    echo $e->getMessage();
    die();
} catch (RuntimeException $e) {
    echo $e->getMessage();
    die();
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

?>
