<?php
include 'imports/head.php';
include 'imports/navigation1.php';
 ?>
  <div class="container">
    <form name="userandpass" class="" action="system/createAccountProcess.php" onsubmit="return check_username()" method="post" enctype="multipart/form-data">
      <!-- <input type="file"name="image" value="image/user.png" file="image/user.png" style="display:none;"> -->
      <div class="form-group">
        <label for="username">username</label>
        <input type="text" name="username" class="form-control" placeholder="Enter username" required>
      </div>
      <div class="form-group">
        <label for="confirmUsername">confirm username</label>
        <input type="text" name="confirmUsername" class="form-control" placeholder="Enter username again" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" placeholder= "Enter password " name="password" required>
      </div>
      <div class="form-group">
        <label for="confirmPassword">confirm Password</label>
        <input type="password" class="form-control" placeholder= "Enter password " name="confirmPassword" required>
      </div>
      <div class="row text-right">
        <input id="sub" type="submit" name="submit" value="Done" class="btn btn-success">
      </div>
    </form>
  </div>

 <div style="padding-bottom:70px"></div>
  <?php
  include 'imports/footer.php';
  ?>

  <!DOCTYPE html>
<html>
<head>
<script>
function check_username() {
    var name1 = document.forms["userandpass"]["username"].value;
	
	var name2 = document.forms["userandpass"]["confirmUsername"].value;

    if (name1 == name2) {
		return true;
    }else
	{
		alert(" Name must be the same ")
		return false;
	}
}
</script>
</head>