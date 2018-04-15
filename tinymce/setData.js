$(document).ready(function(){

  $("#create-view-form").submit(function(e){
    var projectID = document.getElementById('projectID').value;
    console.log(projectID);
    var title = document.getElementById('title').value;
    console.log(title);
    var poster = document.getElementById('img').files[0];
    console.log(poster);
    var brief = document.getElementById('brief').value;
    console.log(brief);
    var desc = tinymce.get("desc").getContent();
    console.log(desc);
    var data = {
      projectID : projectID,
      title : title,
      poster : poster,
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
    //window.location.replace("./system/createview.php");

  // var formData = new FormData($('#create-view-form')[0]);
  // formData.append("description",desc);
  // $.ajax({
  //     type: "POST",
  //     url: "./system/createview.php",
  //     data: formData,
  //     processData: false,
  //     contentType: false,
  //     success: function (data) {
  //         $("#divider").html(data);
  //     }
  // });
    return false;
  });

});
