<?php
include 'imports/head.php';
include 'imports/navigation1.php';
 ?>
  <div class="container text-center">
    <div class="row">
      <img src="./image/verify.png" class="img-rounded" height="300px">
    </div>
    <br><br>
    <div id="failed" class="alert alert-danger alert-dismissible fade in" hidden>
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Sorry!</strong> the code not correct.
    </div>

      <form class=""  method="POST">
        <br>
        <div class="row">
          <div class="form-group text-left">
            <label for="codeText">code</label>
            <input type="text" name="code" class="form-control" placeholder="Enter 5 digit code" required>
          </div>
        </div>
        <div class="row">
          <input type="submit" name="verify" value="verify" class="btn btn-success btn-lg">
        </div>
        <br>
        <div class="row">
          <button type="button" name="resend" class="btn btn-light btn-lg" onclick="verifyProcess.php">resend</button>
          <!-- <a href="system/verifyProcess.php" class="btn btn-light btn-lg">resend</a> -->
        </div>
      </form>
  </div>

 <?php

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
   if(isset($_POST['code'])){
     if($_POST['code'] == $_SESSION['code']){
       header("location:usernameAndPass.php");
     }else{
         echo '<script type="text/javascript"> document.getElementById("failed").hidden = false; </script>';
     }
   }else{
        echo '<script type="text/javascript"> document.getElementById("failed").hidden = false; </script>';
   }
 }

 include 'imports/footer.php';
 ?>
