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

	// loop through the directory
    echo '<div class="container library oh"><div class="row mt3">';
    foreach($files as $file) {
        if ($count == 0) {
            echo '<div class="col col-6 center thumbnail"><a class="block" href="venn-single.php?venn=diagrams/'.$file.'"><img src="'.$dir.'/'.$file.'" /></a></div>';
        } else if ($count == $file_count - 1) {
            echo '</div>';
        } else if ($count % 2 == 0) {
            echo '</div><div class="row">';
            echo '<div class="col col-6 center thumbnail"><a class="block" href="venn-single.php?venn=diagrams/'.$file.'"><img src="'.$dir.'/'.$file.'" /></a></div>';
        } else {
            echo '<div class="col col-6 center thumbnail"><a class="block" href="venn-single.php?venn=diagrams/'.$file.'"><img src="'.$dir.'/'.$file.'" /></a></div>';
        }
        $count++;
	}
	echo '</div></div>';
}
else {
	echo "Directory does not exist!";
}
?>
