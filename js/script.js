var canvas, ctx;
var interval;
var spread = 75;
var radius = 150;
var color1 = "rgb(255,255,40)";
var color2 = "rgb(70,175,220)";
var color3 = "rgb(70,175,34)";

function setup() {
	//set the canvas
	canvas = document.getElementById("mcanvas");
	ctx = canvas.getContext("2d");

	//set the interval
	interval = setInterval(draw, 50);
}

function draw() {
	//set the canvas size
	//maintain an aspect ration of 3:2
	canvas.width = canvas.width;
	canvas.width = window.innerWidth-10;
	canvas.height = window.innerHeight-10;
	var f = Math.min(canvas.width * 2, canvas.height * 3);
	canvas.width = f/2;
	canvas.height = f/3;
	canvas.style.marginLeft = (window.innerWidth-canvas.width)/2 + "px";
	radius = canvas.width * 0.22;

	//console.log("radius: "+radius);
	//update the spread
	spread = parseInt($("input#spread-value").val());
	//if (!spread) spread = 75;
	spread = (spread > 98) ? 98 : spread;
	spread = (spread <= 2) ? 2 : spread;
	var offset = radius * (100 - spread) / 100;

	//circle 1
	ctx.beginPath();
	ctx.arc(canvas.width / 2 - offset, canvas.height / 2, radius, 0, Math.PI * 2, true);
	ctx.closePath();
	ctx.fillStyle = color1;
	ctx.fill();

	//circle 2
	ctx.beginPath();
	ctx.arc(canvas.width / 2 + offset, canvas.height / 2, radius, 0, Math.PI * 2, true);
	ctx.closePath();
	ctx.fillStyle = color2;
	ctx.fill();

	//intersection
	ctx.fillStyle = color3;
	ctx.strokeStyle = color3;
	var angle = Math.acos(offset / radius);

	ctx.beginPath();
	ctx.arc(canvas.width / 2 - offset, canvas.height / 2, radius, -angle, angle, false);
	ctx.closePath();
	ctx.fill();
	ctx.beginPath();
	ctx.arc(canvas.width / 2 - offset, canvas.height / 2, radius, -angle, angle, false);
	ctx.closePath();
	ctx.stroke();

	ctx.beginPath();
	ctx.arc(canvas.width / 2 + offset, canvas.height / 2, radius, -angle + Math.PI, angle + Math.PI, false);
	ctx.closePath();
	ctx.fill();
	ctx.beginPath();
	ctx.arc(canvas.width / 2 + offset, canvas.height / 2, radius, -angle + Math.PI, angle + Math.PI, false);
	ctx.closePath();
	ctx.stroke();

	//text
	var font_size = radius / 8;
	ctx.font = "bold " + font_size + "px sans-serif";
	ctx.fillStyle = 'rgba(0,0,0,1)';
	ctx.strokeStyle = 'rgba(0,0,0,1)';
	ctx.textAlign = "center";
	var remainder = radius - offset;

	//text for circle 1
	//grab the text
	var src1 = $("input#firstcircle").val();
	// split and mesaure the text 
	var src_ar = src1.split(" ");
	var textw = measureWidestText(src_ar);
	if (textw > offset * 2 - 30) {
		drawMultiline(src_ar, canvas.width / 2 - remainder - textw / 2 - 10, canvas.height / 2, font_size);
	} else {
		drawMultiline(src_ar, canvas.width / 2 - offset - remainder, canvas.height / 2, font_size);
	}
	//text for circle 2
	var src2 = $("input#secondcircle").val();
	// split the text
	var src_ar = src2.split(" ");
	var textw = measureWidestText(src_ar);
	if (textw > offset * 2 - 30) {
		drawMultiline(src_ar, canvas.width / 2 + remainder + textw / 2 + 10, canvas.height / 2, font_size);
	} else {
		drawMultiline(src_ar, canvas.width / 2 + offset + remainder, canvas.height / 2, font_size);
	}

	//text for overlap
	var src3 = $("input#overlap").val();
	// split the text
	var src_ar = src3.split(" ");
	var textw = measureWidestText(src_ar);
	//if the overlap is too small, the text shoudl move up and an arrow should be drawn
	if (textw > remainder) {
		//draw the multiline text
		drawMultiline(src_ar, canvas.width / 2, canvas.height / 2 - radius + font_size, font_size);
		//draw the line
		ctx.beginPath();
		ctx.moveTo(canvas.width / 2, canvas.height / 2 - radius + font_size * src_ar.length);
		ctx.lineTo(canvas.width / 2, canvas.height / 2 - 3);
		ctx.closePath();
		ctx.stroke();
		//draw the arrow head
		var awid = 10;
		var ahei = 10;
		ctx.beginPath();
		ctx.moveTo(canvas.width / 2 - awid / 2, canvas.height / 2 - ahei);
		ctx.lineTo(canvas.width / 2 + awid / 2, canvas.height / 2 - ahei);
		ctx.lineTo(canvas.width / 2, canvas.height / 2);
		ctx.closePath();
		ctx.fill();

	} else {
		//draw the text acorss multiple lines
		drawMultiline(src_ar, canvas.width / 2, canvas.height / 2, font_size);
	}
}

function drawMultiline(src_ar, x, y, s) {
	//draw it across multiple lines
	var h = y + s - src_ar.length / 2 * s;
	for (var i = 0; i < src_ar.length; i++) {
		ctx.fillText(src_ar[i], x, h);
		h += s;
	};
}

function measureWidestText(t_ar) {
	var dim = 0;
	for (var i = 0; i < t_ar.length; i++) {
		dim = Math.max(ctx.measureText(t_ar[i]).width, dim);
	};
	return dim;
}

$(document).ready(function() {
	//associate buttons with colors
	colors = [
		["rgb(255,255,40)", "rgb(70,175,220)", "rgb(70,175,34)"],
		["rgb(70,175,220)", "rgb(193,39,112)", "rgb(57,36,108)"],
		["rgb(53,91,250)", "rgb(137,233,129)", "rgb(33,89,128)"],
		["rgb(255,255,40)", "rgb(70,175,220)", "rgb(70,175,34)"],
		["rgb(255,255,40)", "rgb(70,175,220)", "rgb(70,175,34)"],
		["rgb(255,255,40)", "rgb(70,175,220)", "rgb(70,175,34)"],
		["rgb(255,255,40)", "rgb(70,175,220)", "rgb(70,175,34)"],
		["rgb(255,255,40)", "rgb(70,175,220)", "rgb(70,175,34)"], ];

	$('.color-selector').each(function(index) {
		$(this).click(function() {
			color1 = colors[index][0];
			color2 = colors[index][1];
			color3 = colors[index][2];
		});
	});

	//bind the share button
	$("#share").click(function() {
		//get the canvas
		var canvasd = document.getElementById("mcanvas").toDataURL();
		$("#data").val(canvasd);

		//prepare the title
		$("#title").val($("input#overlap").val().replace(" ","_"));

		//submit
		$("#frm").trigger('submit');
	});

	//start the app
	setup();
});