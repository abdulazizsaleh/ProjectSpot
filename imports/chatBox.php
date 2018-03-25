<div class="col-md-9 well well-sm" style="height:600px;">
  <div class="text-center chatHeader">
    <h3>chat header</h3>
  </div>
  <div id="chatContainer" class="chatBox well"><!-- chatBox -->

    <!-- <div class="chat self">
      <img src="image/newton.jpg" class="img-circle user-image" >
      <p class="message">
    </div>

    <div class="chat friend">
      <img src="image/Einstein.jpg" class="img-circle user-image" >
      <p class="message">
    </div> -->

  </div>
  <div class="well well-sm">
      <div class="chat-form" action="">
        <!-- <input name="attachment" type="file"> -->
        <textarea id="textIn" name="message" placeholder="enter your text" value="" class="form-control"></textarea>
        <input type="text" name="sender" value="sender username" hidden>
        <input type="datetime-local" name="date" value="" hidden>
        <button id="myBtn"onclick="add()" name="send" class="btn btn-default"><span class="glyphicon glyphicon-send"></span></button>
      </div>
  </div>
</div>

<script type="text/javascript">
  var container = document.getElementById('chatContainer');
  var chatID , objReq, myJson, xmlhttp, myObj ;
  var textInput = document.getElementById('textIn');

  function chatIDFun(Id) {
    redraw();
    chatID = Id;
    objReq = {
      table:"message",
      chatID:chatID,
      limit:30
    }
    myJson = JSON.stringify(objReq);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        for (message of myObj){
          var sender = message.sender;
          var time = message.time;
          var content = message.content;
          create(sender,time,content);
        }
      }
    };
    xmlhttp.open("GET", "./system/messageJson.php?x=" + myJson, true);
    xmlhttp.send();
  }

  function add() {
    var content = textInput.value;
    console.log(content);
    textInput.value= null;
    var sender = <?= $_SESSION['ID'] ?>;
    var time = Date();
    store(sender,time,content);
  }
  var insertXmlhttp,insertXmlhttp;
  function store(sender,time,content){//store in the database
    console.log(chatID);

    var message ={
      sender:sender,
      content:content,
      chatID:chatID
    }
    insertJson = JSON.stringify(message);
    console.log(insertJson);
    insertXmlhttp = new XMLHttpRequest();
    insertXmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var m = this.responseText;
          console.log(m);
          create(sender,time,content);
        }
    };
    insertXmlhttp.open("POST", "./system/insertMessageJson.php", true);
    insertXmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    insertXmlhttp.send("x=" + insertJson);
  }

  function create(sender,time,content){

    var chat = document.createElement("div");
    if (sender == <?= $_SESSION['ID'] ?>){
      chat.className = "chat self";
    }else {
      chat.className = "chat friend";
    }

    var user_img = document.createElement("img");
    user_img.className = "img-circle user-image";
    user_img.src = "data:image;base64,"+getUserImg(sender);
    //user_img.src="image/Einstein.jpg";
    var msgP = document.createElement("p");
    msgP.className = "message";
    msgP.appendChild(document.createTextNode(content));
    chat.appendChild(user_img);
    chat.appendChild(msgP);
    container.appendChild(chat);
  }

  function redraw(){
    while (container.firstChild) {
      container.removeChild(container.firstChild);
    }
  }

 function getUserImg(Id){
   var imgs;
    var senderID = {ID:Id};
    var senderIdJson = JSON.stringify(senderID);
    var httpImg = new XMLHttpRequest();
    httpImg.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
        imgs = this.responseText;
      }
    }
    httpImg.open("GET", "./system/userImgJson.php?Im=" + senderIdJson, false);
    httpImg.send();
    return imgs;
  }





</script>
