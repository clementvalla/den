<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>The Venn Diagram Generator</title>
	<meta name="description" content="Make and share Venn Diagrams to help people understand your bad jokes.">
    <meta name="author" content="Meghan, Clement, and Jason">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Set the ol' viewport to allow pinch zooming, but prevent double tap zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Meta data for Twitter Photo Card -->
    <meta name="twitter:card" content="photo">
    <meta name="twitter:site" content="@VennDiagramer">
    <meta name="twitter:title" content="? + ? = Content via http://www.venndiagram.it/">
    <meta name="twitter:image:src" content="http://parseshare.com/den/diagrams/Barack_Obama-1.png">
    <meta name="twitter:image:width" content="1680">
    <meta name="twitter:image:height" content="1120">
    <meta name="twitter:domain" content="http://www.venndiagram.it">

    <!-- Styles -->
	<link rel="stylesheet" href="css/jquery-ui-1.8.23.custom.css">
    <link rel="stylesheet" href="css/basscss.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- All the magic icons for the site -->
    <link rel="apple-touch-icon" href="apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon" sizes="76x76" href="apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" sizes="152x152" href="apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-startup-image" href="/startup-image.png">

    <!-- The name of the App as it will appear on an iPhone that adds it to their home screen -->
    <meta name="apple-mobile-web-app-title" content="Venn Diagrams">

</head>


<body <?php if ($page_name == 'save') { ?>id="save" class="static-diagram"<?php } ?>>

	<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	<header class="blur full-width">
        <h1 class="brand ml2 mt1 center"><a href="http://parseshare.com/den/">The Venn Diagram Generator</a></h1>
        <a id="js-share" class="button button-box-black button-small ml2 mobile-hide">
            <svg class="icon icon-tweet" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                <path d="M2 4 C6 8 10 12 15 11 A6 6 0 0 1 22 4 A6 6 0 0 1 26 6 A8 8 0 0 0 31 4 A8 8 0 0 1 28 8 A8 8 0 0 0 32 7 A8 8 0 0 1 28 11 A18 18 0 0 1 10 30 A18 18 0 0 1 0 27 A12 12 0 0 0 8 24 A8 8 0 0 1 3 20 A8 8 0 0 0 6 19.5 A8 8 0 0 1 0 12 A8 8 0 0 0 3 13 A8 8 0 0 1 2 4"></path>
            </svg>
            <svg class="icon icon-loading" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" class="geomicon tile-small geomicon-loading"><g><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(0 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(45 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.125s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(90 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.25s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(135 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.375s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(180 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.5s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(225 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.675s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(270 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.75s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(315 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.875s"></animate></path></g></svg>
          Tweet
        </a>
        <br>
        <a id="js-save" class="button button-box-black button-small mt2 ml2 mobile-hide">
            <svg class="icon icon-save" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                <path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z" /></path>
            </svg>
            <svg class="icon icon-loading" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" class="geomicon tile-small geomicon-loading"><g><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(0 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(45 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.125s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(90 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.25s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(135 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.375s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(180 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.5s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(225 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.675s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(270 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.75s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(315 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.875s"></animate></path></g></svg>
            Add to library
        </a>
	</header>
