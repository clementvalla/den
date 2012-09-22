<?php include 'includes/head.php';?>
<?php
$dir = "diagrams";
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
		echo '<img src="'.$dir.'/'.$file.'" width=400/>';
	}
}
else {
	echo "Directory does not exist!";
}
?>
<?php include 'includes/foot.php';?>
