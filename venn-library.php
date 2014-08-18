<?php $page_name = 'library' ?>
<?php include 'includes/head.php';?>
<?php
$dir = "diagrams_thumb/diagrams";
$good_ext = array( ".png");
$files = array();

if ( $handle = opendir( $dir ) ) {
	while ( false!== ( $file = readdir( $handle ) ) ) {
		$ext = strrchr( $file, "." );
		if ( in_array( $ext, $good_ext ) ) {
			$d = filemtime($dir.'/'.$file);
			$files[$d] = $file;
		}
	}
	closedir( $handle );

	// sort
	krsort($files);

	// counter
	$count = 0;
	$file_count = count($files);

	echo '<div id="content" class="library">';
	// loop through the directory
	foreach($files as $file) {
		if ($count == $file_count - 1) {
			echo '<li class="thumbnail '.$count.'"><a href="venn-single.php?venn=diagrams/'.$file.'"><img src="'.$dir.'/'.$file.'" /></a></li></ul>';
		} else if ($count == 0) {
			echo '<ul class="clearfix"><li class="thumbnail '.$count.'"><a href="venn-single.php?venn=diagrams/'.$file.'"><img src="'.$dir.'/'.$file.'" /></a></li>';
		} else {
			echo '<li class="thumbnail '.$count.'"><a href="venn-single.php?venn=diagrams/'.$file.'"><img src="'.$dir.'/'.$file.'" /></a></li>';
		}
		$count++;
	}
	echo '</div>';
}
else {
	echo "Directory does not exist!";
}
?>
<?php include 'includes/foot.php';?>
