<?php $page_name = 'save' ?>
<?php

if (!function_exists('file_put_contents')) {
    function file_put_contents($filename, $data) {
        $f = @fopen($filename, 'w');
        if (!$f) {
            return false;
        } else {
            $bytes = fwrite($f, $data);
            fclose($f);
            return $bytes;
        }
    }
}
$data = $GLOBALS['HTTP_RAW_POST_DATA'];
//$data = $_POST['data'];
$title = 'venn-diagram';
//$title = $_POST['title'];
$count = 0;

//removing the "data:image/png;base64," part
$uri =  substr($data,strpos($data,",")+1);
$pngFile = 'diagrams/'.$title.'.png';

while(file_exists ($pngFile)){
	$count++;
	$pngFile = 'diagrams/'.$title.'-'.$count.'.png';
}

// put the data to a file
if (!file_put_contents($pngFile, base64_decode($uri))){?>
	<?php include('includes/head.php'); ?>
    <div class="error-msg table">
        <div class="table-cell center">
            <h2>Doh! We couldn't save your diagram.<br> Give it one more try.</h2>
        </div>
	</div>
	<?php include('includes/foot.php'); ?>
<?php 
} else {
?>
	<?php 
		//create the thumbnail
        require_once 'includes/phpthumb/ThumbLib.inc.php';
		$thumb = PhpThumbFactory::create($pngFile);
        $thumb->adaptiveResize(550, 400);
        $thumb->save('diagrams_thumb/'.$pngFile);

	?>
    <?php include 'includes/head.php';?>
    <?php $venn = $pngFile;?>
	<?php include 'includes/venn-single-display.php'; ?>
	<?php include 'includes/foot.php';?>
<?php } ?>
