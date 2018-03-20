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
$sql = "select email from account where ID = ".$_SESSION['ID'];
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
$email = $row['email'];
$sql = "select * from mailBox where reciever = '".$email."'";
$result = mysqli_query($db,$sql);
?>
<div class="container">
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
      <td><?= $row['title']?></td>
      <td><?= $row['senderName']?></td>
      <td><?= $row['Email']?></td>
      <!-- time_passed(strtotime($row['date'])) -->
      <td><?= $row['date']?></td>
      <td><?= $state ?></td>
    </tr>
  <?php endwhile; ?>

    </tbody>
  </table>
</div>




<div style="padding-bottom:80px"></div>
<?php
include 'imports/footer.php';
?>
