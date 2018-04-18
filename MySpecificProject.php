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
      var action = $('#action').val();
      if(folder_name != ''){
        $.ajax({
          url:"/ProjectSpot/system/projectFiles.php",
          method:"POST",
          data:{action:action, folder_name:folder_name ,project:project},
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

  });

</script>
<div style="padding-bottom:25px"></div>
<?php
include 'imports/footer.php';
?>
