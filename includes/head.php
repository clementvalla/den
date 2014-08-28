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

	<link rel="stylesheet" href="css/jquery-ui-1.8.23.custom.css">
    <link rel="stylesheet" href="css/basscss.css">
    <link rel="stylesheet" href="css/style.css">

	<script src="js/libs/modernizr-2.5.3.min.js"></script>
</head>


<body <?php if ($page_name == 'save') { ?>id="save"<?php } ?>>

	<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	<header class="container">
        <h1 class="brand ml2 mt1 mobile-center"><a href="index.php">The Venn <br class="mobile-hide">Diagram <br class="mobile-hide">Generator</a></h1>
        <a id="share" class="button button-box-black button-small ml2 mobile-hide">
            <svg class="icon icon-tweet" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                <path d="M2 4 C6 8 10 12 15 11 A6 6 0 0 1 22 4 A6 6 0 0 1 26 6 A8 8 0 0 0 31 4 A8 8 0 0 1 28 8 A8 8 0 0 0 32 7 A8 8 0 0 1 28 11 A18 18 0 0 1 10 30 A18 18 0 0 1 0 27 A12 12 0 0 0 8 24 A8 8 0 0 1 3 20 A8 8 0 0 0 6 19.5 A8 8 0 0 1 0 12 A8 8 0 0 0 3 13 A8 8 0 0 1 2 4"></path>
            </svg>
            <svg class="icon icon-loading" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" class="geomicon tile-small geomicon-loading"><g><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(0 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(45 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.125s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(90 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.25s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(135 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.375s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(180 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.5s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(225 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.675s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(270 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.75s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(315 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.875s"></animate></path></g></svg>
          Tweet
        </a>
        <?php if ($page_name == 'index') { ?>
            <br>
            <a id="save" class="button button-box-black button-small mt2 ml2 mobile-hide">
                <form action="venn-save.php" method="post" id="form" class="mobile-show mobile-hide"/>
                    <input type="hidden" name="data" id="data" />
                    <input type="hidden" name="title" id="title" />
                    <input type="submit" value="Submit">
                </form>
                Archive
            </a>
        <?php } ?>
	</header>
