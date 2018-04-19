$(document).ready(function(){

  $("#create-view-form").submit(function(e){
    var projectID = document.getElementById('projectID').value;
    console.log(projectID);
    var title = document.getElementById('title').value;
    console.log(title);
    var brief = document.getElementById('brief').value;
    console.log(brief);
    var desc = tinymce.get("desc").getContent();
    console.log(desc);
    var data = {
      projectID : projectID,
      title : title,
      brief : brief,
      desc : desc
    };
    var myJson = JSON.stringify(data);
    console.log("myJson "+myJson);
    var Xmlhttp = new XMLHttpRequest();
    Xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          console.log("inside ajax ready state");
          var m = this.responseText;
          console.log(m);

        }
    };
    console.log("before open ajax");
    Xmlhttp.open("POST", "./system/createview.php", true);
    Xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    Xmlhttp.send("x=" + myJson);

    window.location.replace("./poster.php?pID="+projectID);

    return false;
  });

});
