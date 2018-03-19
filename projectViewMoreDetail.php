<?php
include 'imports/head.php';
include 'imports/navigation1.php';
include 'system/init.php';
if(isset($_GET['vID'])){
    $vID = $_GET['vID'];
}else{
  echo 'error';
  die();
}

$qry = "SELECT * FROM view where ID =".$vID;
$result = mysqli_query($db , $qry);
$row = mysqli_fetch_array($result);

// below the count function

$old_count = $row['veiws'];
$new_count = $old_count + 1;
$update_count = mysqli_query($db,"UPDATE view SET veiws = $new_count WHERE ID = ".$vID);

///////////////////////////////////////////////////////////////////////////////////////////
?>
<div class="container-fluid">
  <div class="well col-sm-9">
    <img src="data:image;base64,<?= base64_encode($row['pic'])?>" class="img-responsive" style="width:100%"/>
    <div class="">
      <h3><?= $row['title']?></h3>
      <h4>rate:<?= $row['rate']?></h4>
    </div>
    <p> <?= $row['description'] ?></p>

    <span id="projectFooter">
      <h4> views: <?= $new_count; ?></h4>
      <div onclick="dispalyComment();">
        <span class="glyphicon glyphicon-chevron-down"></span>
        comments
      </div>
    </span>


    <div id="comment">
      <div class="well-sm">
        <div id="commentForm" action="">
          <!-- <input name="attachment" type="file"> -->
          <textarea id="textIn" name="message" placeholder="enter your text" value="" class="form-control"></textarea>
          <input type="text" name="sender" value="sender username" hidden>
          <input type="datetime-local" name="date" value="" hidden>
          <button id="myBtn"onclick="add()" name="send" class="btn btn-default"><span class="glyphicon glyphicon-send"></span></button>
        </div>
      </div>
      <div class="well-sm" id="commentContainer">

        <!-- <div class="panel panel-default comment">
          <div class="panel-heading">username of the sender</div>
          <div class="panel-body">
            comment
          </div>
        </div> -->

      </div>

    </div>
  </div>

  <div class="col-sm-3">
    <div class="well text-center">
      <img src="image/newton.jpg" class="img-circle team-image">
      <h4>University : kau</h4>
      <h4>Faculty : FCIT</h4>
      <h4>year : 2017</h4>
      <h4>team : Khalid , Ahmed</h4>
      <h4>Rate : </h4>
    </div>
  </div>

</div>

<script type="text/javascript">
  var container = document.getElementById('commentContainer');
  var textInput = document.getElementById('textIn');
  var comment = document.getElementById('comment');
  comment.style.display = 'none';
  var projectID = <?= $vID ?>;

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
          //var sender = message.sender;
          //var time = message.time;
          var content = message.content;
          create(content);
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

    var content = textInput.value;
    textInput.value= null;
    var newComment = {
      "projectID":projectID,
      "commenter":"NULL" ,
      "content":content
    }
    var insertJson = JSON.stringify(newComment);
    var Xmlhttp = new XMLHttpRequest();
    Xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var m = this.responseText;
          console.log(m);
          create(content);
        }
    };
    Xmlhttp.open("POST", "./system/insertCommentJson.php", true);
    Xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    Xmlhttp.send("x=" + insertJson);
  }

  function create(content){

    var panel = document.createElement("div");
    panel.className="panel panel-default comment";
    var panelHeading = document.createElement("div");
    panelHeading.className="panel-heading";
    panelHeading.appendChild(document.createTextNode("username"));
    var panelBody = document.createElement("div");
    panelBody.className="panel-body";
    panelBody.appendChild(document.createTextNode(content));
    panel.appendChild(panelHeading);
    panel.appendChild(panelBody);
    container.insertAdjacentElement('afterbegin', panel)
  }
</script>




<div style="padding-bottom:80px"></div>
<?php
include 'imports/footer.php';
?>
