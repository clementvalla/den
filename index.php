<?php $page_name = 'index' ?>
<?php include('includes/head.php'); ?>
    <div id="main" class="diagram" role="main">
        <canvas width="800" height="400" id="mcanvas"></canvas>
    </div>

    <div class="menu-wrapper full-width">
        <div id="toggle-menu" class="menu-icon clearfix">
            <span class="left">Options</span>
            <span class="right close">&times;</span>
        </div>
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
                    <label>Spread</label>
                    <div class="slide-control">
                        <div id="spread-slider" class="slider"></div>
                    </div>
                    <input type="hidden" name="spread" id="spread-value" value=""/>
                </div>
                <ul class="col col-6 colors m0 clearfix">
                    <li class="label">Colors</li>
                    <li id="select-1" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-2" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-3" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-4" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-5" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-6" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-7" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-8" class="color-selector"><span class="a"></span><span class="b"></span></li>
                </ul>
            </div>
        </div>
    </div>

<?php include('includes/foot.php'); ?>
