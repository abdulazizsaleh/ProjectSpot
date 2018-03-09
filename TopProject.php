<?php
include 'imports/head.php';
include 'imports/navigation1.php';
include 'system/init.php';
?>
<script type="text/javascript">
    document.getElementById('top').className = "active";
</script>
<?php
$qry = "SELECT * FROM view order by rate desc";
include 'imports/projectView.php';
?>
<div style="padding-bottom:80px"></div>
<?php
include 'imports/footer.php';
?>
