<?php
include 'imports/head.php';
include 'imports/navigation2.php';
?>
<script type="text/javascript">
    document.getElementById('myProject').className = "active";
</script>

<div class="container-fluid">

  <h3>Project Title</h3>
  <div class="col-md-9">

      <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Last updates</h3></div>
        <div class="panel-body well-sm">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
              <img src="" alt="user image">
              in filename.extention by member name date
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <img src="" alt="user image">
              in filename.extention by member name date
            </a>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Files</h3>
        </div>
        <!-- <ul class="list-group">
          <li class="list-group-item text-left"> -->
            <div class="btn-group" role="group" aria-label="...">
              <button type="button" class="btn btn-default btn-sm" aria-label="">
                <span class="glyphicon glyphicon-plus"></span>
              </button>
              <button type="button" class="btn btn-default btn-sm" aria-label="">
                <span class="glyphicon glyphicon-refresh"></span>
              </button>
              <button type="button" class="btn btn-default btn-sm" aria-label="">
                <span class="glyphicon glyphicon-upload"></span>
              </button>
              <button type="button" class="btn btn-default btn-sm" aria-label="">
                <span class="glyphicon glyphicon-download"></span>
              </button>
              <button type="button" class="btn btn-default btn-sm" aria-label="">
                <span class="glyphicon glyphicon-sort-by-alphabet"></span>
              </button>
              <button type="button" class="btn btn-default btn-sm" aria-label="">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </div>
          <!-- </li>
        </ul> -->
        <div class="panel-body well-sm file-container">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
              <span class="glyphicon glyphicon-folder-open"></span>
              src
              <span class="glyphicon glyphicon-trash"></span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <span class="glyphicon glyphicon-folder-open"></span>
              doc
              <span class="glyphicon glyphicon-trash"></span>
            </a>
          </div>
        </div>
      </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Project View</h3>
      </div>
      <img src="image/u502.png" class="img-rounded" width="100%" height="25%" alt="">
      <div class="panel-body">
        <p>Click project view to create or edit the view that appear to the public.</p>
        <br>
        <p class="text-center"><a href="createView.php?pID=<?= $_GET['pID'] ?>" class="btn btn-primary" role="button">Project View</a></p>
      </div>
    </div>
  </div>
</div>

<div style="padding-bottom:25px"></div>
<?php
include 'imports/footer.php';
?>
