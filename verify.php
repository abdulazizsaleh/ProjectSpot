<?php
include 'imports/head.php';
include 'imports/navigation1.php';
 ?>

  <div class="container text-center">
    <div class="row">
      <img src="./image/image.png" class="img-rounded" alt="Cinque Terre" >
    </div>
      <form class="" action="usernameAndPass.php" method="">
        <br>
        <div class="row">
          <div class="form-group text-left">
            <label for="codeText">code</label>
            <input type="text" name="codeText" class="form-control" placeholder="Enter 4 digit code" required>
          </div>
        </div>
        <div class="row">
          <input type="submit" name="verify" value="verify" class="btn btn-success btn-lg">
        </div>
        <br>
        <div class="row">
          <button type="button" name="resend" class="btn btn-light btn-lg" onclick="verifyProcess.php">resend</button>
        </div>
      </form>
  </div>
<div style="padding-bottom:70px"></div>
 <?php
 include 'imports/footer.php';
 ?>
