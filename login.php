<?php
include 'imports/head.php';
include 'imports/navigation1.php';
 ?>

<form action="loginProcess.php" method="post">
  <table>
    <tr>
      <th width="20%">Username</th>
      <th width="80%" ><input type="text" placeholder= "Enter username " name="username"></th>
    </tr>
    <tr>
      <th width="20%">Password</th>
      <th width="80%"><input type="password" placeholder= "Enter password " name="password"></th>
    </tr>
  </table>
<input class = "greenButton"type="submit" value="Login">
</form>

<?php
include 'imports/footer.php';
?>
