
<?php
$result = mysqli_query($db,"select projectID from account where username = '".$username."'");
$row = mysqli_fetch_array($result);
$project = $row[0];
?>


<div class="col-md-9">
<div class="row">
  <div class="col-md-12">
    <div class="well">
      <p><a href="./MyProject.php" class="btn btn-primary">My Project</a></p>
      <div class="list-group">
        <?php
        if ($project == 0){
          echo '<h5 class="list-group-item list-group-item-action" >empty</h5>';
        }else{
          $result = mysqli_query($db,"select title from project where projectID = '".$project."'");
          while($row = mysqli_fetch_array($result)){
            echo '<a href="#" class="list-group-item list-group-item-action">'.$row[0].'</a>';
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
