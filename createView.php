<?php
include 'imports/head.php';
include 'imports/navigation2.php';
include 'system/uploadPoster.php';

$view = mysqli_fetch_array(mysqli_query($GLOBALS['db'] , "select * from view where projectID = ".$_GET['pID']));
$title = $brief = $desc = "";
if($view[0] != null){
  $title = $view['title'];
  $brief = $view['brief'];
}
?>

<div class="container">
  <form id="create-view-form"  method="post" enctype="multipart/form-data">
    <input id="projectID"type="number" value="<?= $_GET['pID'] ?>" hidden>

    <label for="title">title</label>
    <input id="title" class="form-control" type="text" name="title" value="<?= $title ?>">

    <label for="brief">brief description</label>
    <input id="brief" class="form-control" type="text" name="brief" value="<?= $brief ?>">

    <label for="desc">description</label>
    <textarea id="desc" class ="tinymce" name="desc"></textarea>
    <br>
    <input class ="btn btn-success "type="submit" name="" value="create project view">
  </form>

</div>


<div style="padding-bottom:80px"></div>

<script type="text/javascript" src="tinymce/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="tinymce/plugins/tinymce/init-tinymce.js"></script>
<script type="text/javascript" src="tinymce/setData.js"></script>
<?php
include 'imports/footer.php';
?>
