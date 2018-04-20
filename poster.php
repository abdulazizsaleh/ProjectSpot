<?php
include 'imports/head.php';
include 'imports/navigation2.php';
include 'system/uploadPoster.php';


if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['upload'])){
    upload($_GET['pID']);
    header("location:MySpecificProject.php?pID=".$_GET['pID']);
  }
}
?>
<div class="container">
  <form class="image" action="" method="post" enctype="multipart/form-data">
    <label for="img">poster</label>
    <div style="height:610px;">
        <input id="img" class="form-control" style="display:inline; width:45%;" type="file" name="poster" onchange="preview.call(this)">
        <img src="" height="600" style="display:none" id="img-preview">
        <button class ="btn btn-primary" type="submit" name="upload" >upload</button>
    </div>
  </form>
</div>

<script type="text/javascript">
  function preview(){
    if (this.files && this.files[0]){
      var obj = new FileReader();
      obj.onload = function(data){
        var img = document.getElementById('img-preview');
        img.src = data.target.result;
        img.className = "center"
        img.style.display = "block";
      }
      obj.readAsDataURL(this.files[0])
    }
  }
</script>
<?php
include 'imports/footer.php';
?>
