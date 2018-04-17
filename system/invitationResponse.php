<?php
session_start();
require_once 'init.php';

if(isset($_GET['response']) && isset($_GET['projectID'])){
      $response = $_GET['response'];
      $projectID = $_GET['projectID'];
      $ID = $_SESSION['ID'];
  }else{
    echo 'error';
    die();
  }

  if ($response == 0 ) {
    echo "Rejected";
  } else {
    echo "Accepted";
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
           echo '$rr <= 0';
           die();
         }
      }else{
        echo 'failed';
        die();
      }
    }
    $sql = "select chat.chatID from chat , chat_account where chat.chatID = chat_account.chatID and chat.projectID = ".$projectID." and chat_account.chat_type = 1 LIMIT 1";
    $r = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($r);
    $chatID = $row['chatID'];
    $sql = "INSERT INTO chat_account VALUES (".$ID." , ".$chatID." , 1)";
    $r = mysqli_query($db,$sql);
    if (!$r){
       echo $sql;
       die();
     }
    $sql = "INSERT INTO project_account VALUES ( ".$ID." , ".$projectID." )";
    $r = mysqli_query($db,$sql);
    if (!$r){
       echo $sql;
       die();
     }
    //$sql = "delete from mailbox where ID =".$messageID;
    header("location:../MailBox.php");
  }


?>
