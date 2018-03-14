<?php
include 'imports/head.php';
include 'imports/navigation2.php';
require_once 'system/init.php';
?>
<script type="text/javascript">
    document.getElementById('myTeam').className = "active";
</script>

<!-- left column -->
<div class="container-fluid">
  <div class="col-md-3 well well-sm list-group text-center" style="height:600px;">

    <?php
     include 'imports/group.php';
     include 'imports/member.php';
    ?>

    <!-- link to invite member -->
    <a href="html/invite member.html" class="btn btn-info btn-lg" id="InviteButton">
      <span class="glyphicon glyphicon-plus"></span> Invite member
    </a>
  </div>

  <!-- right column -->
  <?php include 'imports/chatBox.php'; ?>
</div>





<div style="padding-bottom:80px"></div>
<?php
include 'imports/footer.php';
?>
