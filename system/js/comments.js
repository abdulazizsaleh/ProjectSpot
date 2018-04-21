var container = document.getElementById('commentContainer');
var textInput = document.getElementById('textIn');
var comment = document.getElementById('comment');
comment.style.display = 'none';
var projectID ,session;
function setProjectID(pID){projectID = pID}
function setSession(s){session = s}
function projectComment(){
  redraw();
  var objReq = {
    "projectID":projectID
  }
  myJson = JSON.stringify(objReq);
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myObj = JSON.parse(this.responseText);
      console.log(myObj);
      for (message of myObj){
        create(message.content, message.username);
      }
    }
  };
  xmlhttp.open("GET", "./system/commentRetrive.php?x=" + myJson, true);
  xmlhttp.send();
}

function redraw(){
  while (container.firstChild) {
    container.removeChild(container.firstChild);
  }
}

function dispalyComment(){
  if(comment.style.display == 'none'){
    comment.style.display = 'block';
    projectComment();
  }else{
    comment.style.display = 'none'
  }
}

function add(){
  if (session !== 'undefined' && session != '' && session != null) {
    var content = textInput.value;
    textInput.value= null;
    var newComment = {
      projectID:projectID,
      commenter:session ,
      content:content,
    }
    var insertJson = JSON.stringify(newComment);
    var Xmlhttp = new XMLHttpRequest();
    Xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var m = this.responseText;
          console.log(m);
          create(content,session);
        }
    };
    Xmlhttp.open("POST", "./system/insertCommentJson.php", true);
    Xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    Xmlhttp.send("x=" + insertJson);
  } else {
    alert('Please register to write a comment')
  }
}

function create(content ,username){

  var panel = document.createElement("div");
  panel.className="panel panel-default comment";
  var panelHeading = document.createElement("div");
  panelHeading.className="panel-heading";
  panelHeading.appendChild(document.createTextNode(username));
  var panelBody = document.createElement("div");
  panelBody.className="panel-body";
  panelBody.appendChild(document.createTextNode(content));
  panel.appendChild(panelHeading);
  panel.appendChild(panelBody);
  container.insertAdjacentElement('afterbegin', panel)
}
