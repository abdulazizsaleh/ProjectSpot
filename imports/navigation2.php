<?php
  require_once 'system/init.php';
  session_start();
  $username = $_SESSION["username"];
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php">ProjectSpot</a>
    </div>
    <ul class="nav navbar-nav">
      <li id="account"><a href="./account.php">Account</a></li>
      <li id="myProject"><a href="./MyProject.php">MyProject</a></li>
      <li id="myTeam"><a href="./Myteam.php">MyTeam</a></li>
      <li id="mailBox"><a href="./MailBox.php">Mail Box</a></li>
    </ul>


    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $username ?> </a></li>

      <form class="navbar-form navbar-left" action="/action_page.php">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" name="search">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
      <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
      </ul>
    </div>
</nav>
