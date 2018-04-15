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

    <!-- <label for="img">poster</label>
    <div class="">
        <input id="img" class="form-control" style="display:inline; width:45%;" type="file" name="img" onchange="preview.call(this)">
        <img src="" height="200" style="display:none" id="img-preview">
    </div> -->
    <label for="brief">brief description</label>
    <input id="brief" class="form-control" type="text" name="brief" value="">

    <label for="desc">description</label>
    <textarea id="desc" class ="tinymce" name="desc"></textarea>
    <br>
    <input class ="btn btn-success "type="submit" name="" value="create project view">
  </form>

  <?php //upload($_GET['pID']);
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
              if(isset($_POST['upload'])){
                  upload($_GET['pID']);
              }
          }
  ?>

  <form class="image" action="" method="post" enctype="multipart/form-data">
    <label for="img">poster</label>
    <div class="">
        <input id="img" class="form-control" style="display:inline; width:45%;" type="file" name="poster" onchange="preview.call(this)">
        <img src="" height="200" style="display:none" id="img-preview">
        <button class ="btn btn-primary" type="submit" name="upload" >upload</button>
    </div>
  </form>


</div>


<div style="padding-bottom:80px"></div>
<script type="text/javascript">
  function preview(){
    if (this.files && this.files[0]){
      var obj = new FileReader();
      obj.onload = function(data){
        var img = document.getElementById('img-preview');
        img.src = data.target.result;
        img.style.display = "block";
      }
      obj.readAsDataURL(this.files[0])
    }
  }
</script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script> -->
<script type="text/javascript" src="tinymce/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="tinymce/plugins/tinymce/init-tinymce.js"></script>
<script type="text/javascript" src="tinymce/setData.js"></script>
<?php
include 'imports/footer.php';
?>
