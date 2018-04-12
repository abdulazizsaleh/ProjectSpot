<?php
include 'imports/head.php';
include 'imports/navigation2.php';
?>

<div class="container">
  <form class="" action="index.html" method="post">
    <label for="title">title</label>
    <input class="form-control" type="text" name="title" value="">
    <label for="img">poster</label>
    <input class="form-control" type="file" name="img" value="">
    <label for="brief">brief description</label>
    <input class="form-control" type="text" name="brief" value="">
    <label for="desc">description</label>
    <textarea class ="tinymce" name="desc"></textarea>
    <br>
    <input class ="btn btn-success "type="submit" name="" value="create project view">
  </form>
</div>
<div style="padding-bottom:80px"></div>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script> -->
<script type="text/javascript" src="tinymce/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="tinymce/plugins/tinymce/init-tinymce.js"></script>
<?php
include 'imports/footer.php';
?>
