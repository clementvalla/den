<?php $page_name = 'index' ?>
<?php include('includes/head.php'); ?>
    <div id="js-pre-load" class="pre-load">
        <svg class="icon icon-loading py4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" class="geomicon tile-small geomicon-loading"><g><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(0 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(45 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.125s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(90 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.25s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(135 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.375s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(180 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.5s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(225 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.675s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(270 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.75s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(315 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.875s"></animate></path></g></svg>
    </div>
    <div id="main" class="container diagram blur" role="main">
        <canvas width="800" height="400" id="mcanvas"></canvas>
    </div>
    <h2 class="center">Library</h2>
    <?php include('includes/library.php'); ?>
    
    <div class="container full-width menu-wrapper">
        <div id="venn-menu" class="menu">
            <div class="row mobile-show blur">
                <div class="mobile-col full-width mobile-show py1">
                    <a id="js-edit" class="button button-box-black center full-width border-box">Edit Diagram</a>
                </div>
            </div>
            <div class="row mobile-show blur">
                <div class="mobile-col full-width mobile-show py1">
                    <a id="mobile-share" class="button button-box-black center full-width border-box">
                        <svg class="icon icon-tweet" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path d="M2 4 C6 8 10 12 15 11 A6 6 0 0 1 22 4 A6 6 0 0 1 26 6 A8 8 0 0 0 31 4 A8 8 0 0 1 28 8 A8 8 0 0 0 32 7 A8 8 0 0 1 28 11 A18 18 0 0 1 10 30 A18 18 0 0 1 0 27 A12 12 0 0 0 8 24 A8 8 0 0 1 3 20 A8 8 0 0 0 6 19.5 A8 8 0 0 1 0 12 A8 8 0 0 0 3 13 A8 8 0 0 1 2 4"></path>
                        </svg>
                        <svg class="icon icon-loading" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" class="geomicon tile-small geomicon-loading"><g><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(0 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(45 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.125s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(90 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.25s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(135 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.375s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(180 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.5s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(225 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.675s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(270 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.75s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(315 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.875s"></animate></path></g></svg>
                Tweet
                </a>
                </div>
            </div>
            <?php include('includes/edit.php'); ?>
    </div>
</div>

<?php include('includes/foot.php'); ?>
