

<?php include('includes/head.php'); ?>

	
		<ul class="menu" id="share-menu">
			<li class="menu">
			<div class="link pull-left">
				<form action="save-venn.php" method="post" id="frm"/>
					<input type="hidden" name="data" id="data" />
					<input type="hidden" name="title" id="title" />
						<!-- <input type="submit" value="Submit"> -->
				</form>
				<a id="share" href="#">Share</a>
			</div>
			</li>
		</ul>
		<ul id="venn-menu" class="menu">		
			<li class="row-1">
				<div id="circle1" class="field pull-left">
					<label>Left</label>
					<input type="text" name="firstcircle" id="firstcircle" value="Nobel Peace Prize Winners"/>
				</div>
				<div id="circle3" class="field pull-left">
					<label>Right</label>
					<input type="text" name="secondcircle" id="secondcircle" value="Grammy Award Winners"/>
				</div>
				<div id="overlap" class="field pull-left">
					<label>Center</label>
					<input type="text" name="overlap" id="overlap" value="Barak Obama"/>
				</div>
				
			</li>
			<li class="row-2">
				<div id="spread" class="field pull-left">
					<label>Spread</label>
					<div class="slide-control">
						<div id="spread-slider" class="slider"></div>
					</div>
					<input type="hidden" name="spread" id="spread-value" value="50"/>
				</div>
				<ul class="colors">
					<li id="select-1" class="color-selector"><span class="a"></span><span class="b"></span></li>
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

	<div id="main" role="main">
		<canvas width="800" height="600" id="mcanvas"></canvas>
	</div>
	<footer>

	</footer>

	<!-- Locally load jQuery files - remove on launch -->
	<script type="text/javascript" src="js/libs/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="js/libs/jquery-ui-1.8.23.min.js"></script>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>

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