<?php
$result = mysqli_query($db,"select * from account where username = '".$username."'");
$row = mysqli_fetch_array($result);


/////////////////////////////
// Function for calculating age

$dateOfBirth = $row['DOB'];
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
$age = $diff->format('%y');

//////////////////////////////


function imageSrc($image){
  if ($image != null && $image != '') {
    echo "data:image;base64,".base64_encode($image);
  } else {
    echo "/ProjectSpot/image/user.png";
  }
}
?>
<div class="container-fluid text-center">
<div class="col-md-3">
  <div class="well">
    <p><a href="#">My Profile</a></p>
    <img src="<?= imageSrc($row['image']); ?>"
       class="img-circle" height="95" width="95" alt="Avatar">
      <div>
        <table class="table">
          <br>
          <tr>
            <th>name:</th>
            <td><?= $row['frist_name']." ".$row['last_name'] ?></td>
          </tr>
          <tr>
            <th>username:</th>
            <td><?= $row['username'] ?></td>
          </tr>
          <tr>
            <th>faculty:</th>
            <td><?= $row['faculty'] ?></td>
          </tr>
          <tr>
            <th>department:</th>
            <td><?= $row['dept'] ?></td>
          </tr>
          <tr>
            <th>age:</th>
            <td><?=  $age ?></td>
          </tr>
          <tr>
            <th>gender:</th>
            <td><?= $row['gender'] ?></td>
          </tr>
        </table>
      </div>
    <p><a href="./editAcc.php" class="btn btn-info">Edit</a></p>
  </div>
  <div class="well text-center">
    <br>
    <p><a href="./create project.php" class="btn btn-success btn-lg">Create new project</a></p>
  </div>
</div>
