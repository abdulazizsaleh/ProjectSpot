<?php
// $title = $_POST['title'];
// $poster = $_POST['img'];
// $brief = $_POST['brief'];
// $desc = htmlspecialchars($_POST['desc']);
//
// echo $title.'<br>'.$poster.'<br>'.$brief.'<br>'/*.htmlspecialchars($desc, ENT_QUOTES, 'UTF-8')*/;
// echo $desc;
require_once 'init.php';
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
// id , title , brief , desc , poster , rate , views
echo $obj->poster;
//$sql = "INSERT INTO  `view` (`ID`, `title`, `brief`, `description`, `rate`, `veiws` , `projectID`) VALUES (NULL , '".$obj->title."' , '".$obj->brief."' , '".$obj->desc."',0,0, '".$obj->projectID."')";
//$result = mysqli_query($db , $sql);


?>
