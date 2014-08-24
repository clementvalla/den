<?php $page_name = 'index' ?>
<?php include('includes/head.php'); ?>
    <div id="main" class="diagram" role="main">
        <canvas width="800" height="400" id="mcanvas"></canvas>
    </div>

    <div class="container full-width menu-wrapper">
        <div id="venn-menu" class="menu">        
            <div class="row">
                <div id="circle1" class="col col-4 field">
                    <label>Left</label>
                    <input type="text" name="param" id="input-left"/>
                </div>
                <div id="overlap" class="col col-4 field">
                    <label>Center</label>
                    <input type="text" name="param" id="input-center" value=""/>
                </div>
                <div id="circle3" class="col col-4 field">
                    <label>Right</label>
                    <input type="text" name="param" id="input-right" value=""/>
                </div>          
            </div>
            <div class="row">
                <div id="spread" class="col col-6 field">
                    <label>Overlap</label>
                    <div class="slide-control mobile-hide">
                        <div id="spread-slider" class="slider"></div>
                    </div>
                    <div class="slide-buttons mobile-show">
                        <a id="spread-increase" class="button button-box-black button-small">&ndash;</a>
                        <a id="spread-decrease" class="button button-box-black button-small">+</a>
                    </div>
                    <input type="hidden" name="spread" id="spread-value" value=""/>
                </div>
                <ul class="col col-6 colors m0 clearfix mobile-hide">
                    <li class="label">Colors</li>
                    <li id="select-1" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-2" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-3" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-4" class="color-selector mobile-hide"><span class="a"></span><span class="b"></span></li>
                    <li id="select-5" class="color-selector mobile-hide"><span class="a"></span><span class="b"></span></li>
                    <li id="select-6" class="color-selector mobile-hide"><span class="a"></span><span class="b"></span></li>
                    <li id="select-7" class="color-selector mobile-hide"><span class="a"></span><span class="b"></span></li>
                    <li id="select-8" class="color-selector mobile-hide"><span class="a"></span><span class="b"></span></li>
                </ul>
            </div>
            <div class="row mobile-show">
                <div class="col">
                    <a id="mobile-share" class="button button-box-black button-small center full-width">
                        <svg class="icon icon-tweet" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path d="M2 4 C6 8 10 12 15 11 A6 6 0 0 1 22 4 A6 6 0 0 1 26 6 A8 8 0 0 0 31 4 A8 8 0 0 1 28 8 A8 8 0 0 0 32 7 A8 8 0 0 1 28 11 A18 18 0 0 1 10 30 A18 18 0 0 1 0 27 A12 12 0 0 0 8 24 A8 8 0 0 1 3 20 A8 8 0 0 0 6 19.5 A8 8 0 0 1 0 12 A8 8 0 0 0 3 13 A8 8 0 0 1 2 4"></path>
                        </svg>
                        <svg class="icon icon-loading" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" class="geomicon tile-small geomicon-loading"><g><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(0 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(45 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.125s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(90 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.25s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(135 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.375s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(180 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.5s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(225 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.675s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(270 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.75s"></animate></path><path opacity=".1" d="M14 0 H18 V8 H14 z" transform="rotate(315 16 16)"><animate attributeName="opacity" from="1" to=".1" dur="1s" repeatCount="indefinite" begin="0.875s"></animate></path></g></svg>
                Tweet
                </a>
            </div>
        </div>
    </div>

<?php include('includes/foot.php'); ?>
