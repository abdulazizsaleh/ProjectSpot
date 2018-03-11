
<div class="col-md-9">
<div class="row">
  <div class="col-md-12">
    <div class="well" style="height:200px;">
      <p><a href="./MyProject.php" class="btn btn-primary">My Project</a></p>
      <div class="list-group">
        <?php
        $sql = " SELECT title , project.projectID from project , account , project_account where project_account.accountID=account.ID AND project_account.projectID=project.projectID AND account.username = '".$username."'";
        $result = mysqli_query($db,$sql);
        while ($row = mysqli_fetch_array($result)){
          echo '<a href="./MySpecificProject.php?pID='.$row['projectID'].'" class="list-group-item list-group-item-action">'.$row['title'].'</a>';
        }
        ?>
      </div>
    </div>
  </div>
</div>
