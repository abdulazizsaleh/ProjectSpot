<?php
include 'imports/head.php';
include 'imports/navigation2.php';
?>

<div class="container">

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



  // var opt1 = document.createElement("option");
  // var opt2 = document.createElement("option");
  // var opt3 = document.createElement("option");
  // opt1.appendChild(document.createTextNode("username"));
  // opt2.appendChild(document.createTextNode("Phone number"));
  // opt3.appendChild(document.createTextNode("university ID"));
  //
  // opt1.addEventListener("mouseover", function(e){
  //   label.appendChild(document.createTextNode("username"));
  //   input.placeholder = "Enter the username";
  //   input.disabled = false;
  //   console.log("opt1 event");
  // });
  //
  // opt2.addEventListener("click", function(e){
  //   label.appendChild(document.createTextNode("Phone number"));
  //   input.placeholder = "Enter the Phone number";
  //   input.disabled = false;
  // });
  //
  // opt3.addEventListener("click", function(e){
  //   label.appendChild(document.createTextNode("university ID"));
  //   input.placeholder = "Enter the university ID";
  //   input.disabled = false;
  // });
  //
  // menu.appendChild(opt1);
  // menu.appendChild(opt2);
  // menu.appendChild(opt3);
</script>

<div style="padding-bottom:80px"></div>
<?php
include 'imports/footer.php';
?>
