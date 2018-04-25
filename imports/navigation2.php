<?php
  require_once 'system/init.php';
   session_start();
   if (!isset($_SESSION["username"])) {
     echo "<h1>unauthorized access</h1>";
     die();
   }
   $username = $_SESSION["username"];
?>
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php"><img src="image/light.png" style="display:inline; margin:1px; " height="100%"> ProjectSpot </a>
    </div>
    <ul class="nav navbar-nav">
      <li id="account"><a href="./account.php">Account</a></li>
      <li id="myProject"><a href="./MyProject.php">MyProject</a></li>
      <li id="myTeam"><a href="./Myteam.php">MyTeam</a></li>
      <li id="mailBox"><a href="./MailBox.php">Mail Box</a></li>
    </ul>


    <ul class="nav navbar-nav navbar-right">

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

      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?> </a></li>
      <li><a href="/ProjectSpot/system/signout.php"><span class="glyphicon glyphicon-off"></span> sign out</a></li>
      </ul>
    </div>
</nav>
