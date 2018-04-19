<?php
include 'imports/head.php';
include 'imports/navigation2.php';

include 'system/uploadPoster.php';
?>

<div class="container">
  <form id="create-view-form"  method="post" enctype="multipart/form-data">
    <input id="projectID"type="number" value="<?= $_GET['pID'] ?>" hidden>

    <label for="title">title</label>
    <input id="title" class="form-control" type="text" name="title" value="">

    <label for="brief">brief description</label>
    <input id="brief" class="form-control" type="text" name="brief" value="">

    <label for="desc">description</label>
    <textarea id="desc" class ="tinymce" name="desc"></textarea>
    <br>
    <input class ="btn btn-success "type="submit" name="" value="create project view">
  </form>

</div>


<div style="padding-bottom:80px"></div>

<!-- <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script> -->
<script type="text/javascript" src="tinymce/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="tinymce/plugins/tinymce/init-tinymce.js"></script>
<script type="text/javascript" src="tinymce/setData.js"></script>
<?php
include 'imports/footer.php';
?>
