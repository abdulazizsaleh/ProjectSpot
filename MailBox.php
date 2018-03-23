<?php
include 'imports/head.php';
include 'imports/navigation2.php';
require_once 'system/init.php';
include 'imports/time.php';
?>
<script type="text/javascript">
    document.getElementById('mailBox').className = "active";
</script>
<?php
// $sql = "select email from account where ID = ".$_SESSION['ID'];
// $result = mysqli_query($db,$sql);
// $row = mysqli_fetch_array($result);
$email = $_SESSION['email'];
$limit = 10;
if(isset($_GET['p'])){
  $page = $_GET['p'];
}else{
  $page = 0;
}
$numOfMails = mysqli_num_rows(mysqli_query($db,"select * from mailBox where reciever = '".$email."'"));
$numOfPages = ceil($numOfMails/$limit);

if (!isset($page) || $page <= 0){
  $offset = 0;
}else{
  $offset = ceil($page - 1) * $limit;
}

$sql = "select * from mailBox where reciever = '".$email."' limit ".$offset.",".$limit."";
$result = mysqli_query($db,$sql);
?>


<div class="container well">
  <table class="table mailBox">
    <thead>
      <tr>
        <th>subject</th>
        <th>from</th>
        <th>Email</th>
        <th>date</th>
        <th>state</th>
      </tr>
    </thead>
    <tbody>

    <?php while ($row = mysqli_fetch_array($result)) :
      if($row['state'] == 1){
        $state = "not open";
      }else{
        $state = "opened";
      }
    ?>
    <tr>
      <td><a class = "noDecoration" href="mailPage.php?msg=<?= $row['ID']?>"><?= $row['title']?></a></td>
      <td><a class = "noDecoration" href="mailPage.php?msg=<?= $row['ID']?>"><?= $row['senderName']?></a></td>
      <td><a class = "noDecoration" href="mailPage.php?msg=<?= $row['ID']?>"><?= $row['Email']?></a></td>
      <!-- time_passed(strtotime($row['date'])) -->
      <td><a class = "noDecoration" href="mailPage.php?msg=<?= $row['ID']?>"><?= $row['date']?></a></td>
      <td><a class = "noDecoration" href="mailPage.php?msg=<?= $row['ID']?>"><?= $state ?></a></td>
    </tr>
  <?php endwhile; ?>
    </tbody>
  </table>

  <nav aria-label="Page navigation" class="text-center mailPagination">
  <ul class="pagination">
    <li>
      <a href="?p=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
      for ($i = 1 ; $i<=$numOfPages ; $i++){
        echo '<li><a href="?p='.$i.'">'.$i.'</a></li>';
      }
    ?>
    <li>
      <a href="?p=<?=$numOfPages?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

</div>




<div style="padding-bottom:80px"></div>
<?php
include 'imports/footer.php';
?>
