<?php
  require_once 'system/init.php';
  include 'imports/head.php';
  include 'imports/navigation1.php';
  include 'imports/header.php';
?>
<script type="text/javascript">
    document.getElementById('home').className = "active";
</script>
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-4">
      <div class="panel panel-info">
        <div class="panel-heading text-left">
          <h3 class="panel-title">Title</h3>
        </div>
        <img src="./image/image.png" class="img-responsive" alt="Cinque Terre" width="100%" >
        <div class="panel-body">
        <p class="text-justify">How it works ? first you need to register and fill the data correctly after that log in and u can edit your profile. like uploding your profile picture and setting your gender, date of birth and also mobile number, after that you can either create a project and upload its data like title and description or you can view other uploaded projects and give rates for it, comment and give advice.</p>
      </div>
    </div>
    </div>
    <div class="col-sm-8">
      <h1 class="text-center">
        Welcome to ProjectSpot
      </h1>
      <p class="text-justify">About Us : We are students from FCIT in King Abdulaziz University, we decided to help other student with their senior projects by uploading their posters and help them in getting sponsorship while they seek advice from others, students can rate, comment, and give views on other students posters and also their supervisor can monitor their work. where did they reach and what did they do so far and they can invite other members to join their groups.</p>

      <div class="row content" id="news">
        <br>
        <hr>
        <?php
          include 'imports/news.php';
         ?>
      </div>
    </div>
  </div>
</div>


<?php
include 'imports/footer.php';
?>
