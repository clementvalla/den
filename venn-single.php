<?php $page_name = 'single' ?>
<?php include 'includes/head.php';?>

<?php 
//get the venn diagram from the query
$venn = $_GET["venn"];
?>
<div id="content" class="diagram">
       <?php include 'includes/venn-single-display.php'; ?>
</div>

<?php include 'includes/foot.php';?>
