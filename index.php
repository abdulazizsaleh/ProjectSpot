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
        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat est velit egestas dui id ornare. Neque aliquam vestibulum morbi blandit cursus risus at ultrices mi. Non nisi est sit amet facilisis magna etiam tempor. Arcu ac tortor dignissim convallis aenean et tortor. In arcu cursus euismod quis viverra nibh cras pulvinar. Lacus vestibulum sed arcu non. Nulla facilisi nullam vehicula ipsum. Vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique. Ac turpis egestas integer eget aliquet nibh praesent tristique. Venenatis cras sed felis eget velit. Ut pharetra sit amet aliquam id diam maecenas ultricies. Ultrices vitae auctor eu augue ut lectus arcu. Ligula ullamcorper malesuada proin libero nunc consequat interdum. Sit amet nisl suscipit adipiscing bibendum est ultricies integer quis. Diam sit amet nisl suscipit adipiscing bibendum est. Condimentum vitae sapien pellentesque habitant morbi tristique senectus et netus. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus. Ultricies mi eget mauris pharetra et ultrices neque ornare. Eget lorem dolor sed viverra ipsum nunc.
        Eget sit amet tellus cras adipiscing enim. Cursus turpis massa tincidunt dui ut ornare lectus. Facilisis sed odio morbi quis commodo odio. Odio morbi quis commodo odio aenean sed adipiscing diam. Venenatis cras sed felis eget velit aliquet. Morbi tempus iaculis urna id volutpat lacus laoreet. Ultrices neque ornare aenean euismod elementum nisi quis eleifend. Quisque egestas diam in arcu. Rutrum tellus pellentesque eu tincidunt tortor. Suspendisse faucibus interdum posuere lorem ipsum dolor sit. Eros in cursus turpis massa. Cras adipiscing enim eu turpis egestas pretium aenean. Orci a scelerisque purus semper eget duis. Feugiat in ante metus dictum. Imperdiet dui accumsan sit amet nulla facilisi morbi tempus iaculis. Vel facilisis volutpat est velit egestas dui. Lorem sed risus ultricies tristique nulla aliquet enim. Massa tempor nec feugiat nisl. Erat velit scelerisque in dictum non consectetur. Rhoncus urna neque viverra justo.
        Sed viverra ipsum nunc aliquet bibendum enim facilisis. Viverra nibh cras pulvinar mattis nunc sed. Et netus et malesuada fames ac turpis egestas maecenas pharetra.</p>
      </div>
    </div>
    </div>
    <div class="col-sm-8">
      <h1 class="text-center">
        Welcome to ProjectSpot
      </h1>
      <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat est velit egestas dui id ornare. Neque aliquam vestibulum morbi blandit cursus risus at ultrices mi. Non nisi est sit amet facilisis magna etiam tempor. Arcu ac tortor dignissim convallis aenean et tortor. In arcu cursus euismod quis viverra nibh cras pulvinar. Lacus vestibulum sed arcu non. Nulla facilisi nullam vehicula ipsum. Vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique. Ac turpis egestas integer eget aliquet nibh praesent tristique. Venenatis cras sed felis eget velit. Ut pharetra sit amet aliquam id diam maecenas ultricies. Ultrices vitae auctor eu augue ut lectus arcu. Ligula ullamcorper malesuada proin libero nunc consequat interdum. Sit amet nisl suscipit adipiscing bibendum est ultricies integer quis. Diam sit amet nisl suscipit adipiscing bibendum est. Condimentum vitae sapien pellentesque habitant morbi tristique senectus et netus. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus. Ultricies mi eget mauris pharetra et ultrices neque ornare. Eget lorem dolor sed viverra ipsum nunc.
      Eget sit amet tellus cras adipiscing enim. Cursus turpis massa tincidunt dui ut ornare lectus. Facilisis sed odio morbi quis commodo odio. Odio morbi quis commodo odio aenean sed adipiscing diam. Venenatis cras sed felis eget velit aliquet. Morbi tempus iaculis urna id volutpat lacus laoreet. Ultrices neque ornare aenean euismod elementum nisi quis eleifend. Quisque egestas diam in arcu. Rutrum tellus pellentesque eu tincidunt tortor. Suspendisse faucibus interdum posuere lorem ipsum dolor sit. Eros in cursus turpis massa. Cras adipiscing enim eu turpis egestas pretium aenean. Orci a scelerisque purus semper eget duis. Feugiat in ante metus dictum. Imperdiet dui accumsan sit amet nulla facilisi morbi tempus iaculis. Vel facilisis volutpat est velit egestas dui. Lorem sed risus ultricies tristique nulla aliquet enim. Massa tempor nec feugiat nisl. Erat velit scelerisque in dictum non consectetur. Rhoncus urna neque viverra justo.
      Sed viverra ipsum nunc aliquet bibendum enim facilisis. Viverra nibh cras pulvinar mattis nunc sed. Nunc mattis enim ut tellus elementum. Nisl pretium fusce id velit ut tortor. Nulla facilisi morbi tempus iaculis urna id. Massa placerat duis ultricies lacus sed. Magna fringilla urna porttitor rhoncus. Consectetur purus ut faucibus pulvinar elementum integer enim neque volutpat. Suscipit adipiscing bibendum est ultricies integer. At erat pellentesque adipiscing commodo elit at. Viverra accumsan in nisl nisi scelerisque eu. Lorem ipsum dolor sit amet consectetur adipiscing. Dui accumsan sit amet nulla facilisi morbi tempus iaculis.</p>

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
