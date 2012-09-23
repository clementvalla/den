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

$data = $_POST['data'];
$title = $_POST['title'];
$count = 0;

//removing the "data:image/png;base64," part
$uri =  substr($data,strpos($data,",")+1);
$pngFile = 'diagrams/'.$title.'.png';

while(file_exists ($pngFile)){
	$count++;
	$pngFile = 'diagrams/'.$title.$count.'.png';
}

// put the data to a file
if (!file_put_contents($pngFile, base64_decode($uri))){?>
	<?php include('includes/head.php'); ?>
	<div id="confirmation">
		<div id="confirmation-label">there was an error submitting your image. please try again.</div>
	</div>
	<?php include('includes/foot.php'); ?>
<?php 
} else {
?>
	<?php 
		//create the thumbnail
		require_once 'includes/phpthumb/ThumbLib.inc.php';
		$thumb = PhpThumbFactory::create($pngFile);
		$thumb->resize(400, 400)->save('diagrams_thumb/'.$pngFile);

	?>
	<?php include 'includes/head.php';?>
	<?php $venn = $pngFile;?>
	<?php include 'includes/venn-single-display.php'; ?>
	<?php include 'includes/foot.php';?>
<?php } ?>
