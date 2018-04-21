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

  <div class="jumbotron">
    <div class="container">
      <h1 class="text-center">
        Welcome to ProjectSpot
      </h1>
      <p class="text-justify">About Us : We are students from FCIT in King Abdulaziz University,
        we decided to help other student with their senior projects by uploading their posters and help
        them in getting sponsorship while they seek advice from others, students can rate, comment, and give
        views on other students posters and also their supervisor can monitor their work. where did they reach and
        what did they do so far and they can invite other members to join their groups.</p>
    </div>
  </div>
  <div class="row content">

    <div class="col-sm-8">
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
