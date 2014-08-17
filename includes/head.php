<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>The Venn Diagram Generator</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/jquery-ui-1.8.23.custom.css">

	<script src="js/libs/modernizr-2.5.3.min.js"></script>
</head>

<body>
	<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	<header>
		<?php echo $name; ?>
		<ul id="navigation" class="nav-menu" role="navigation">
			<li class="home"><a class="active" href="index.php">The Venn Diagram Generator</a></li>
			<li class="link"><a href="venn-about.php">About</a></li>
			<li class="link"><a href="venn-library.php">Library</a></li>
			<?php if ($page_name == 'index') { ?>
		        <li id="share" class="link">
		            <form action="venn-save.php" method="post" id="frm"/>
		                <input type="hidden" name="data" id="data" />
		                <input type="hidden" name="title" id="title" />
                        <!-- <input type="submit" value="Submit"> -->
		            </form>
		            <a href="#">Share</a>
		        </li>
			<?php } ?>
		</ul>
	</header>
