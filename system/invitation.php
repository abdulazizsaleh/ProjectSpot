<?php
require_once 'init.php';
session_start();

$typeOfIdentifier = $_POST['inviteType'];
$identifier = $_POST['identifier'];

if($typeOfIdentifier == "username"){
  $sql ="select email from account where ".$typeOfIdentifier." = '".$identifier."'";
}elseif ($typeOfIdentifier == "phoneNumber") {
  $typeOfIdentifier = "phone_num";
  $sql ="select email from account where ".$typeOfIdentifier." = ".$identifier;
}elseif ($typeOfIdentifier == "universityID") {
  $typeOfIdentifier = "ID";
  $sql ="select email from account where ".$typeOfIdentifier." = ".$identifier;
}
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
if ($row != null) {
  $email = $row['email'];
  $sql = "select frist_name , last_name from account where ID = ".$_SESSION['ID'];
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result);
  if ($row == null) {
    echo 'error';
    die();
  }
  $senderName = $row['frist_name']." ".$row['last_name'];

  $sql = "select projectID from project_account where accountID = ".$_SESSION['ID'];
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result);
  $projectID = $row['projectID'];
  echo $projectID;
  $invitation = '<div class="well text-center" style="width: 40%; margin: auto; ">
                  <h3 style="color:rgb(121, 120, 113); font-family:Georgia;">Invitation</h3>
                  <h4 style="font-family:Georgia;">you have an invitation from '.$senderName.' <br> to join in a project</h4>
                  <a href="system/invitationResponse.php?response=0&projectID='.$projectID.'" style="margin:5px;" type="button" name="button" class="btn btn-danger">Reject</a>
                  <a href="system/invitationResponse.php?response=1&projectID='.$projectID.'" style="margin:5px;" type="button" name="button" class="btn btn-success">Accept</a>
                </div>';
  $sql = "insert into mailbox values
  ( NULL , '".$senderName."' , 'system' , 'invitation' ,'".$invitation."' , CURRENT_TIME() , '1' , '".$email."')";
  $result = mysqli_query($db,$sql);
  if($result > 0){
    echo 'success';
  }else{
    echo 'failed';
  }
} else {
  echo 'sorry user not found';
}
?>
