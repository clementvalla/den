var canvas, ctx;
var interval;
var spread = 75;
var radius = 150;

function setup() {
	canvas = document.getElementById("mcanvas");
	ctx = canvas.getContext("2d");
	interval = setInterval(draw, 50);
}

function draw() {
	canvas.width = canvas.width;

	//update the spread
	spread = parseInt($("input#spread").val());
	if (!spread) spread = 100;

	//circle 1
	ctx.beginPath();
	ctx.arc(canvas.width/2-spread/2,canvas.height/2, radius, 0, Math.PI*2, true);
	ctx.closePath();
	ctx.fillStyle = 'rgba(1,0,0,0.3)';
	ctx.fill();

	//circle 2
	ctx.beginPath();
	ctx.arc(canvas.width/2+spread/2,canvas.height/2, radius, 0, Math.PI*2, true);
	ctx.closePath();
	ctx.fillStyle = 'rgba(1,0,0,0.3)';
	ctx.fill();

	ctx.font = "bold 12px sans-serif";
	ctx.textAlign = "center";

	var remainder = radius - spread/2;
	
	//text for circle 1
	var src1 = $("input#firstcircle").val();
	ctx.fillText(src1, canvas.width/2-spread/2-remainder, canvas.height/2);

	//text for circle 2
	var src2 = $("input#secondcircle").val();
	ctx.fillText(src2, canvas.width/2+spread/2+remainder, canvas.height/2);

	//text for overlap
	var src3 = $("input#overlap").val();
	ctx.fillText(src3, canvas.width/2, canvas.height/2);
}

$(document).ready(function() {
	setup();
});