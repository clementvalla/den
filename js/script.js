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
	canvas.width = window.innerWidth;
	canvas.height = window.innerHeight;
	radius = Math.min(canvas.width*0.4, canvas.height*0.4);

	//console.log("radius: "+radius);

	//var wid = canvas.width;
	//var height = canvas.height;

	//update the spread
	spread = parseInt($("input#spread-value").val());
	//if (!spread) spread = 75;
	spread = (spread > 100) ? 100 : spread;
	spread = (spread <= 0) ? 0 : spread;
	

	var offset = radius*(100-spread)/100;

	//circle 1
	ctx.beginPath();
	ctx.arc(canvas.width/2-offset,canvas.height/2, radius, 0, Math.PI*2, true);
	ctx.closePath();
	ctx.fillStyle = 'rgba(64,242,255,0.5)';
	ctx.fill();

	//circle 2
	ctx.beginPath();
	ctx.arc(canvas.width/2+offset,canvas.height/2, radius, 0, Math.PI*2, true);
	ctx.closePath();
	ctx.fillStyle = 'rgba(254,17,149,0.5)';
	ctx.fill();

	var font_size = radius/10;

	ctx.font = "bold "+ font_size+"px sans-serif";
	ctx.fillStyle = 'rgba(60,60,60,0.9)';
	//ctx.textAlign = "center";

	var remainder = radius - offset;
	
	//text for circle 1
	var src1 = $("input#firstcircle").val();
	drawMultiline(src1,canvas.width/2-offset-remainder,canvas.height/2,font_size);

	//text for circle 2
	var src2 = $("input#secondcircle").val();
	drawMultiline(src2,canvas.width/2+offset+remainder,canvas.height/2,font_size);

	//text for overlap
	var src3 = $("input#overlap").val();
	drawMultiline(src3,canvas.width/2,canvas.height/2,font_size);
}

function drawMultiline(t,x,y,s){
	// split the text
	var src_ar = t.split(" ");
	//draw it across multiple lines
	var h = y - Math.floor(src_ar.length/2)*s;
	for (var i = 0; i < src_ar.length; i++) {
		ctx.fillText(src_ar[i], x - s*2, h);
		h += s;
	};
}
$(document).ready(function() {
	setup();
});