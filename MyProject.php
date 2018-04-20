<?php
include 'imports/head.php';
include 'imports/navigation2.php';
?>
<script type="text/javascript">
    document.getElementById('myProject').className = "active";
</script>

  <div class="container">
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
include 'imports/footer.php';
?>
