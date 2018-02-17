<?php
include 'imports/head.php';
include 'imports/navigation1.php';
 ?>

<div class="container">
  <form class="form-signin" action="loginProcess.php" method="post">
      <div class="form-group">
        <label for="formGroupExampleInput">Username</label>
        <input type="text" class="form-control" placeholder= "Enter username " name="username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" placeholder= "Enter password " name="password">
      </div>
      <input class = "btn" type="submit" value="Login">
  </form>
  <br>
  <a href="createNewAccount.php" class="btn btn-primary">create new account</a>
</div>

<?php
include 'imports/footer.php';
?>