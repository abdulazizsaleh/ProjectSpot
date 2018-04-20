<?php
include 'imports/head.php';
include 'imports/navigation1.php';
include 'system/init.php';
?>
<script type="text/javascript">
    document.getElementById('project').className = "active";
</script>

<?php
$qry = "SELECT * FROM view";
include 'imports/projectView.php';
include 'imports/footer.php';
?>
