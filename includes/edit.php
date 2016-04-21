<div id="js-overlay" class="venn-menu-overlay mobile-show">
    <div class="header mb2 py1 px2 mobile-table border-box">
        <div class="mobile-table-cell">
            <h3 class="m0">Edit Diagram</h3>
        </div>
    </div>
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
        <div id="spread" class="mobile-col mobile-col-6 field">
            <label>Overlap</label>
            <div class="slide-control">
                <div id="spread-slider" class="slider"></div>
            </div>
            <div class="slide-buttons mobile-show">
                <a id="spread-increase" class="button button-box-black">+</a>
                <a id="spread-decrease" class="button button-box-black">&ndash;</a>
            </div>
            <input type="hidden" name="spread" id="spread-value" value=""/>
        </div>
        <div class="mobile-col mobile-col-6 mobile-show">
            <label class="right-align">Color</label>
            <a id="color-change" class="button button-box-black right">Change</a>
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
    <div class="row">
        <div class="mobile-col full-width mobile-show py1 mt3">
            <a id="js-close" class="button button-gray full-width border-box center" href="#">Done</a>
        </div>
    </div>
</div>
