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

	echo '<div id="content" class="container library"><div class="row">';
	// loop through the directory
    foreach($files as $file) {
        if ($count == $file_count - 1) {
            echo '</div>';
        } else if ($count % 3 == 0) { 
            echo '</div><div class="row">';
        } else {
            echo '<div class="col col-6 thumbnail '.$count.' left"><a href="venn-single.php?venn=diagrams/'.$file.'"><img src="'.$dir.'/'.$file.'" /></a></div>';
        }
        $count++;
	}
	echo '</div></div>';
}
else {
	echo "Directory does not exist!";
}
?>
<?php include 'includes/foot.php';?>
