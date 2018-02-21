<?php
$result = mysqli_query($db,"select * from account where username = '".$username."'");
$row = mysqli_fetch_array($result);
?>
<div class="container-fluid text-center">
<div class="col-md-3">
  <div class="well">
    <p><a href="#">My Profile</a></p>
    <img src="image/image.png" class="img-circle" height="95" width="95" alt="Avatar">
      <div>
        <table class="table">
          <br>
          <tr>
            <th>name:</th>
            <td><?php echo $row['frist_name']." ".$row['last_name'] ?></td>
          </tr>
          <tr>
            <th>username:</th>
            <td><?php echo $row['username'] ?></td>
          </tr>
          <tr>
            <th>faculty:</th>
            <td><?php echo $row['faculty'] ?></td>
          </tr>
          <tr>
            <th>department:</th>
            <td><?php echo $row['dept'] ?></td>
          </tr>
          <tr>
            <th>age:</th>
            <td>value</td>
          </tr>
          <tr>
            <th>gender:</th>
            <td>value</td>
          </tr>
        </table>
      </div>
    <p><a href="edit profile.html" class="btn btn-info">Edit</a></p>
  </div>
  <div class="row">
    <br><br><br><br>
    <p><a href="" class="btn btn-success">Create project</a></p>
  </div>
</div>
