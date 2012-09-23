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


	//loop through the directory
	foreach($files as $file) {
		echo '<a href="venn-single.php?venn=diagrams/'.$file.'"><img src="'.$dir.'/'.$file.'" /></a>';
	}
}
else {
	echo "Directory does not exist!";
}
?>
<?php include 'includes/foot.php';?>
