
<script>
    $(document).ready(function () {
        $("#searchbox").on('keyup',function () {
            var key = $(this).val();

            $.ajax({
                url:'search.php',
                type:'GET',
                data:'keyword='+key,
                beforeSend:function () {
                    $("#results").slideUp('fast');
                },
                success:function (data) {
                    $("#results").html(data);
                    $("#results").slideDown('fast');
                }
            });
        });
    });
</script>
<?php session_start(); ?>
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
      <form class="navbar-form navbar-left" >
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" name="keyword" id="searchbox">
		      <div id="results"></div>
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>

      </form>
      <?php if (!isset($_SESSION['username'])): ?>
        <li><a href="createNewAccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php else: ?>
        <li><a href="/ProjectSpot/account.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["username"]; ?> </a></li>
        <li><a href="/ProjectSpot/system/signout.php"><span class="glyphicon glyphicon-off"></span> sign out</a></li>
      <?php endif; ?>

      </ul>
    </div>
</nav>
