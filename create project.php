<?php
include 'imports/head.php';
include 'imports/navigation2.php';
?>

<div class="container">
  <form class="form" action="system/create project.php" method="post">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" placeholder= "Enter your project's title" name="title" required>
    </div>
    <input class="btn btn-primary" type="submit" value="Create">
  </form>
</div>

<?php
include 'imports/footer.php';
?>
