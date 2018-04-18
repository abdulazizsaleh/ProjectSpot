<?php
include 'imports/head.php';
include 'imports/navigation1.php';
 ?>

<div class="container">
  <form class="form-signin" action="system/loginProcess.php" method="post">
      <div class="form-group">
        <label for="formGroupExampleInput">Username</label>
        <input type="text" class="form-control" placeholder= "Enter username " name="username" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" placeholder= "Enter password " name="password" required>
      </div>
      <input class = "btn center-btn" type="submit" value="Login">
  </form>
  <br>
  <div class="text-center">
    <a href="createNewAccount.php" class="btn btn-primary">Create New Account</a>
  </div>
</div>
<div style="padding-bottom:320px"></div>
<?php
include 'imports/footer.php';
?>
