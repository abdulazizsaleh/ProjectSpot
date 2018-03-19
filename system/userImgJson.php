<?php
include 'init.php';
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["Im"], false);
$sql = "SELECT pic FROM account where ID = ".$obj->ID;
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
//echo base64_encode($row['image']);
echo $row['pic'];

?>
