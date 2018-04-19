<?php
include 'imports/head.php';
include 'imports/navigation2.php';


$projectID = mysqli_real_escape_string($GLOBALS['db'] , stripcslashes($_GET['pID']));
$sql = "select title from project where projectID =".$projectID;
$project = trim(mysqli_fetch_array(mysqli_query($GLOBALS['db'],$sql))[0]);
?>
<script type="text/javascript">
    document.getElementById('myProject').className = "active";
</script>

<div class="container-fluid">

  <h3><?= $project; ?></h3>
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
          <h3 class="panel-title f1">Files</h3>
          <button type="button" class="btn btn-default btn-sm f2" name="create_folder" id="create_folder">
            <span class="glyphicon glyphicon-plus"></span>
          </button>
        </div>

        <div id="folder_table"></div>

      </div>
  </div>

  <?php

  $view = mysqli_fetch_array(mysqli_query($GLOBALS['db'] , "select * from view where projectID = ".$_GET['pID']));
  if ($view[0] == null): ?>
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Project View</h3>
        </div>
        <img src="image/u502.png" class="img-rounded" width="100%" height="25%" alt="">
        <div class="panel-body">
          <p>Click project view to create or edit the view that appear to the public.</p>
          <br>
          <p class="text-center" style="padding-bottom:17px"><a href="createView.php?pID=<?= $_GET['pID'] ?>" class="btn btn-primary" role="button">Project View</a></p>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Project View</h3>
        </div>
        <img src="data:image;base64,<?=base64_encode($view['pic'])?>" class="img-responsive" width="95%" height="25%" style="margin:auto;padding:auto;">

        <table class="table text-center">
          <tr class="center-th" >
            <th colspan="2"><?= $view['title'] ?></th>
          </tr>
          <tr>
            <td colspan="2"><?= $view['brief'] ?></td>
          </tr>
          <tr class="center-th">
            <th>Rate</th>
            <th>View</th>
          </tr>
          <tr>
            <td><?= $view['rate'] ?></td>
            <td><?= $view['veiws'] ?></td>
          </tr>
          <tr>
            <td><p class="text-center" style="padding-bottom:17px"><a href="#" class="btn btn-default" role="button">Edit</a></p></td>
            <td><p class="text-center" style="padding-bottom:17px"><a href="#" class="btn btn-primary" role="button">Go</a></p></td>
          </tr>
        </table>
        <div class="panel-body">

        </div>
      </div>
    </div>
  <?php endif; ?>


</div>


<div id="folderModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" name="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title"><span id="change_title">Create Folder</span></h4>
      </div>
      <div class="modal-body">
        <p>
          Enter Folder Name
          <input type="text" name="folder_name" class="form-control" id="folder_name">
        </p>
        <br>
        <input type="hidden" name="action" id="action">
        <input type="hidden" name="old_name" id="old_name">
        <input type="button" class="btn btn-info" name="folder_btn" value="Create" id="folder_btn">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div id="uploadModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><span id="change_title">Upload Folder</span></h4>
      </div>
      <div class="modal-body">
        <form id="upload_form" method="post" enctype="multipart/form-data">
          <p>select
            <input type="file" name="upload_file" >
            <input type="hidden" name="hidden_folder_name" id="hidden_folder_name">
            <input type="hidden" name="project" id="project">
            <input type="submit" name="upload_btn" value="upload" class="btn btn-info">
          </p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div id="filelistModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><span id="change_title">Files List</span></h4>
      </div>
      <div class="modal-body" id="file_list"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
var project = "<?= $project; ?>";
console.log(project);
  $(document).ready(function(){


    load_folders();
    function load_folders(){
      var action = "fetch";
      $.ajax({
        url:"/ProjectSpot/system/projectFiles.php",
        method:"POST",
        data:{action:action, project:project},
        success:function(data){
          $('#folder_table').html(data);
        }
      });
    }

    // show up the modal
    $(document).on('click', '#create_folder', function(){
      $('#action').val('create');
      $('#folder_name').val('');
      $('#folder_btn').val('Create');
      $('#old_name').val('');
      $('#change_title').text('Create Folder');
      $('#folderModal').modal('show');
    });

    // create new folder
    $(document).on('click', '#folder_btn', function(){
      var folder_name = $('#folder_name').val();
      var old_name = $('#old_name').val();
      var action = $('#action').val();
      if(folder_name != ''){
        $.ajax({
          url:"/ProjectSpot/system/projectFiles.php",
          method:"POST",
          data:{action:action, folder_name:folder_name, old_name:old_name ,project:project},
          success:function(data){
            $('#folderModal').modal('hide');
            load_folders();
            alert(data);
          }
        });
      }else{
        alert('Enter Folder Name');
      }
    });


    //update or rename load_folders
    $(document).on('click', '.update' , function(){
      var folder_name = $(this).data("name");
      $('#old_name').val(folder_name);
      $('#folder_name').val(folder_name);
      $('#action').val('change');
      $('#folder_btn').val('Update');
      $('#change_title').text("Change Folder Name");
      $('#folderModal').modal("show");
    });

    //upload modal
    $(document).on('click', '.upload' , function(){
      var folder_name = $(this).data("name");
      $('#hidden_folder_name').val(folder_name);
      $('#project').val(project);
      $('#uploadModal').modal("show");
    });

    $('#upload_form').on('submit' ,function(){
      $.ajax({
        url:"/ProjectSpot/system/upload.php",
        method:"POST",
        data: new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        success:function(data){
          load_folders();
          alert(data);
        }
      });
    });

    $(document).on('click', '.view_files' , function(){
      var folder_name = $(this).data("name");
      var action = "fetchfiles";
      $.ajax({
        url:"/ProjectSpot/system/projectFiles.php",
        method:"POST",
        data:{action:action, folder_name:folder_name ,project:project},
        success:function(data){
          $('#file_list').html(data);
          $('#filelistModal').modal('show');
        }
      });
    });
  });

</script>
<div style="padding-bottom:25px"></div>
<?php
include 'imports/footer.php';
?>
