<?php
include 'imports/head.php';
include 'imports/navigation2.php';
require_once 'system/init.php';
include 'system/validation.php';
?>
<script type="text/javascript">
    document.getElementById('myTeam').className = "active";
</script>

<div class="container-fluid">
<?php if (isNew($_SESSION['ID'])): ?>

    <div class="col-md-3 well well-sm list-group text-center" style="height:600px;">
      <?php
       include 'imports/group.php';
       include 'imports/member.php';
      ?>
      <!-- link to invite member -->
      <a href="invite.php" class="btn btn-info btn-lg" id="InviteButton">
        <span class="glyphicon glyphicon-plus"></span> Invite member
      </a>
    </div>
    <!-- right column -->
    <?php include 'imports/chatBox.php'; ?>

<?php else: ?>
  <div class="jumbotron">
    <div class="container">
      <h1>Start new project by clicking on the button</h1>
      <!-- <p>...</p> -->
      <p><a class="btn btn-primary btn-lg" href="create project.php" role="button">Click me</a></p>
    </div>
  </div>
<?php endif; ?>
</div>

<?php
include 'imports/footer.php';
?>
