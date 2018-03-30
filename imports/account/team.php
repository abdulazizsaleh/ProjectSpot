<div class="col-md-5">
  <div class="well" style="height:385px;">
    <p><a href="./MyTeam.php" class="btn btn-warning">Team Members</a></p>
    <div class="list-group text-left team-member">
      <?php
      $sql = "select projectID from project_account where accountID = ".$_SESSION['ID'];
      $result = mysqli_query($db,$sql);
      while ($row = mysqli_fetch_array($result)) {
        $projectID = $row['projectID'];
        $sql = "select * from account , project_account where account.ID = project_account.accountID
        and project_account.projectID = ".$projectID." and account.ID <> ".$_SESSION['ID'];
        $rst = mysqli_query($db,$sql);
        while ($accountRow = mysqli_fetch_array($rst)) {
          echo '<a href="#" class="list-group-item list-group-item-action">
                  <img class="img-circle user-image" src="data:image;base64,'.base64_encode($accountRow['image']).'" alt="user image">
                  <div class="text-left">
                    <h4>'.$accountRow['frist_name'].' '.$accountRow['last_name'].'</h4>
                    <p><small>'.$accountRow['type'].'</small></p>
                  </div>
                </a>';
        }
      }
      ?>
    </div>
  </div>
</div>
</div>
</div>
</div>
