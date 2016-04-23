<?php $page_name = 'single' ?>
<?php include 'includes/head.php';?>

<?php 
//get the venn diagram from the query
$venn = $_GET["venn"];
?>
<div id="content">
    <div class="container diagram blur">
        <img class="full-width" src="<?php echo $venn ?>" />
    </div>
</div>

<?php include 'includes/foot.php';?>
