<?php
include 'imports/head.php';
include 'imports/navigation2.php';
?>
<script type="text/javascript">
    document.getElementById('myTeam').className = "active";
</script>
<div class="container-fluid">
  <div class="col-md-3 well well-sm list-group" id="contect">

    <a href="" class="list-group-item list-group-item-action">
      <img src="" alt="Group icon">
      Group name
      <p><small>contacts names</small></p>
    </a>

    <a href="" class="list-group-item list-group-item-action">
      <img src="" alt="Group icon">
      usrename
      <p><small>type of member</small></p>
    </a>

    <a href="" class="list-group-item list-group-item-action">
      <img src="" alt="Group icon">
      usrename
      <p><small>type of member</small></p>
    </a>

    <a href="" class="list-group-item list-group-item-action">
      <img src="" alt="Group icon">
      usrename
      <p><small>type of member</small></p>
    </a>

    <div style="padding-bottom:200px"></div>
  </div>
  <div class="col-md-9 well well-sm">
    <div class="text-center" id="chatHeader">
      <h3>chat header</h3>
    </div>
    <div class="well" id="chatRoom">
      <div class="text-left">
        <div class="well">

        </div>
      </div>
      <div class="text-right">
        <div class="well">

        </div>
      </div>
    </div>
    <div class="well well-sm">
      <div class="row">
        <form action="">
          <div class="col-xs-2">
            <input name="attachment" type="file" class="">
          </div>
          <div class="col-xs-8">
            <input type="text" name="message" placeholder="enter your text" value="" class="form-control">
          </div>
          <input type="text" name="receiver" value="receiver username" hidden>
          <input type="text" name="sender" value="sender username" hidden>
          <input type="datetime-local" name="date" value="" hidden>
          <div class="col-xs-2">
            <button type="submit" name="send" class="btn btn-default"><span class="glyphicon glyphicon-send"></span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>





<div style="padding-bottom:80px"></div>
<?php
include 'imports/footer.php';
?>
