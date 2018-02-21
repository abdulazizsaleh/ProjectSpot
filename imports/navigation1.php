<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php">ProjectSpot</a>
    </div>
    <ul class="nav navbar-nav">
      <li id="home"><a href="./index.php">Home</a></li>
      <li id="project"><a href="./projects.php">Projects</a></li>
      <li id="top"><a href="./TopProject.php">Top Projects</a></li>
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
      <li><a href="createNewAccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
</nav>
