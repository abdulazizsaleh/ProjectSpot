<?php
include 'imports/head.php';
include 'imports/navigation1.php';
?>

<div class="container">

  <div id="failed-msg" class="alert alert-danger alert-dismissible fade in" hidden>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Sorry!</strong> username or password are not correct.
    <a href="#" class="alert-link">if you forget your username or password click here</a>
  </div>

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

<?php
if(isset($_GET['FM'])){
  echo '<script type="text/javascript"> document.getElementById("failed-msg").hidden = false; </script>';
}

include 'imports/footer.php';
?>
