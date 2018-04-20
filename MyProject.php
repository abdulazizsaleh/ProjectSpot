<?php
include 'imports/head.php';
include 'imports/navigation2.php';
?>
<script type="text/javascript">
    document.getElementById('myProject').className = "active";
</script>

  <div class="container">
    <div id="created" class="alert alert-success alert-dismissible fade in" hidden>
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> your project has been successfully created.
    </div>
      <div class="list-group" id="projectsFont">
        <?php
        $sql = " SELECT title , project.projectID from project , account , project_account where project_account.accountID=account.ID AND project_account.projectID=project.projectID AND account.username = '".$username."'";
        $result = mysqli_query($db,$sql);
        while ($row = mysqli_fetch_array($result)){
          echo '<a href="./MySpecificProject.php?pID='.$row['projectID'].'" class="list-group-item list-group-item-action">'.$row['title'].'</a>';
        }
        ?>
      </div>
  </div>

<?php
if(isset($_GET['success'])){
  echo '<script type="text/javascript"> document.getElementById("created").hidden = false; </script>';
}
include 'imports/footer.php';
?>
