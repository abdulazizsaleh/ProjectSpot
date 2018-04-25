<?php
include 'imports/head.php';
include 'imports/navigation2.php';
?>

<div class="container">

  <div id="failed" class="alert alert-danger alert-dismissible fade in" hidden>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Sorry!</strong>
  </div>

  <form class="form" action="system/create project.php" method="post">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" placeholder= "Enter your project's title" name="title" required>
    </div>
    <input class="btn btn-primary" type="submit" value="Create">
  </form>
</div>

<?php
if(isset($_GET['failed'])){
  echo '<script type="text/javascript">
          var el = document.getElementById("failed");
          el.appendChild(document.createTextNode("'.$_GET['failed'].'"));
          el.hidden = false;
        </script>';
}
include 'imports/footer.php';
?>
