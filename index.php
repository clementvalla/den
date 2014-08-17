<?php $page_name = 'index' ?>
<?php include('includes/head.php'); ?>
    <div id="main" class="diagram" role="main">
        <canvas width="800" height="400" id="mcanvas"></canvas>
    </div>

    <div class="menu-wrapper">
        <div id="toggle-menu" class="menu-icon">Options</div>
        <ul id="venn-menu" class="menu">        
            <li class="row">
                <div id="circle1" class="col4 field pull-left">
                    <label>Left</label>
                    <input type="text" name="firstcircle" id="firstcircle" value="Nobel Peace Prize Winners"/>
                </div>
                <div id="overlap" class="col4 field pull-left">
                    <label>Center</label>
                    <input type="text" name="overlap" id="overlap" value="Barak Obama"/>
                </div>
                <div id="circle3" class="col4 field pull-left">
                    <label>Right</label>
                    <input type="text" name="secondcircle" id="secondcircle" value="Grammy Award Winners"/>
                </div>          
            </li>
            <li class="row">
                <div id="spread" class="col6 field pull-left">
                    <label>Spread</label>
                    <div class="slide-control">
                        <div id="spread-slider" class="slider"></div>
                    </div>
                    <input type="hidden" name="spread" id="spread-value" value="50"/>
                </div>
                <ul class="col6 pull-left colors">
                    <li class="label">Colors</li>
                    <li id="select-1" class="color-selector active"><span class="a"></span><span class="b"></span></li>
                    <li id="select-2" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-3" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-4" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-5" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-6" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-7" class="color-selector"><span class="a"></span><span class="b"></span></li>
                    <li id="select-8" class="color-selector"><span class="a"></span><span class="b"></span></li>
                </ul>
            </li>
        </ul>
    </div>

    <footer>
    </footer>

    <!-- Locally load jQuery files - remove on launch -->
    <script type="text/javascript" src="js/libs/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="js/libs/jquery-ui-1.8.23.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
    <script src="jquery.ui.touch-punch.min.js"></script>
    
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript">
    $(function() {
        $( "#spread-slider" ).slider({
            value:50,
            min: 0,
            max: 100,
            step: 10,
            slide: function( event, ui ) {
                $( "#spread-value" ).val( ui.value );
            }
        });
        $( "#spread-value" ).val( $( "#spread-slider" ).slider( "value" ) );
    });
    </script>

<?php include('includes/foot.php'); ?>
