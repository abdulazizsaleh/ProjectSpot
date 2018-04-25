<?php
include 'imports/head.php';
include 'imports/navigation2.php';
?>

<div class="container">

  <div id="failed" class="alert alert-danger alert-dismissible fade in" hidden>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Sorry!</strong>
  </div>

  <form class="form" action="system/invitation.php" method="post">
      <div class="form-group">
        <label for="">Invite by</label>
        <select class="form-control" id="inviteType" name="inviteType">
          <option value="username">username</option>
          <option value="phoneNumber">Phone number</option>
          <option value="universityID">university ID</option>
        </select>
      </div>
      <div class="form-group">
        <label for="" id="mylabel"value>username</label>
        <input id="myInput" type="text" class="form-control" placeholder= "Enter the username" name="identifier" required>
      </div>
      <input type="submit" value="send" class="btn btn-success">
  </form>
</div>

<script type="text/javascript">
  var menu = document.getElementById('inviteType');
  var label = document.getElementById('mylabel');
  var Input = document.getElementById('myInput');
  menu.addEventListener("click",function(e){
    if(menu.value == "username"){
      remove(label);
      Input.placeholder = " ";
      label.appendChild(document.createTextNode("username"));
      Input.placeholder = "Enter the username";
    }else if (menu.value == "phoneNumber"){
      remove(label);
      Input.placeholder = " ";
      label.appendChild(document.createTextNode("Phone number"));
      Input.placeholder = "Enter the Phone number";
    }else{
      remove(label);
      Input.placeholder = " ";
      label.appendChild(document.createTextNode("university ID"));
      Input.placeholder = "Enter the university ID";
    }
  });

  function remove(label){
    while (label.firstChild) {
      label.removeChild(label.firstChild);
    }
  }
</script>

<?php
if(isset($_GET['FM'])){
  echo '<script type="text/javascript">
          var el = document.getElementById("failed");
          el.appendChild(document.createTextNode("'.$_GET['FM'].'"));
          el.hidden = false;
        </script>';
}
include 'imports/footer.php';
?>
