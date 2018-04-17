<?php
function getUniversityLogo($vID){
  $sql = "select university from account where ID =
  (select accountID from project_account WHERE projectID =
  (select projectID from `view` where ID = ".$vID." ) LIMIT 1)";
  $university = searchSingleRow($sql,'university');
  if($university != null){
    if (strcasecmp($university, "kau") == 0) {
      echo "image/kau.jpg";
    }else{
      echo "image/unknown.png";
    }
  }else{
    echo "image/unknown.png";
  }

}
function getUniversityName($vID){
  $sql = "select university from account where ID =
  (select accountID from project_account WHERE projectID =
  (select projectID from `view` where ID = ".$vID." ) LIMIT 1)";
  $university = searchSingleRow($sql,'university');
  if($university != null){
    echo strtoupper($university);
  }else{
    echo "unknown";
  }
}
function getDeptName($vID){
  $sql = "select dept from account where ID =
  (select accountID from project_account WHERE projectID =
  (select projectID from `view` where ID = ".$vID." ) LIMIT 1)";
  $dept = searchSingleRow($sql,'dept');
  if($dept != null){
    echo strtoupper($dept);
  }else{
    echo "unknown";
  }
}
function getProjectDate($vID){
  $sql = "select date from project WHERE projectID =
  (select projectID from `view` where ID = ".$vID." ) LIMIT 1";
  $date = searchSingleRow($sql,'date');
  if($date != null){
    echo $date;
  }else{
    echo "unknown";
  }
}
function getTeamMember($vID){
  $sql = "select * from account , project_account where account.ID =
  project_account.accountID and project_account.projectID =
  (select projectID from `view` where ID = ".$vID." ) ORDER BY `account`.`type` ASC ";
  $result = mysqli_query($GLOBALS['db'] , $sql);
  $str = "";
  while($row = mysqli_fetch_array($result)){
      $str .= "<a href='#'>".$row['frist_name']." ".$row['last_name']."</a><br>";
  }
  echo $str;
}
function searchSingleRow($sql , $rowName){
  $result = mysqli_query($GLOBALS['db'] , $sql);
  $row = mysqli_fetch_array($result);
  return $row[$rowName];
}

?>
