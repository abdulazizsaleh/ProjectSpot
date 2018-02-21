<?php
include 'imports/head.php';
include 'imports/navigation1.php';
 ?>
  <div class="container">
    <form class="" action="system/createAccountProcess.php" method="post">
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
        <input type="submit" name="submit" value="Done" class="btn btn-success">
      </div>
    </form>
  </div>

 <div style="padding-bottom:70px"></div>
  <?php
  include 'imports/footer.php';
  ?>
