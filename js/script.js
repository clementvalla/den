var canvas, ctx;
var interval;
var spread = 75;
var radius = 150;
var color1 = "rgb(255,255,40)";
var color2 = "rgb(70,175,220)";
var color3 = "rgb(70,175,34)";
var is_mobile = false;
var query_string = {};
var login = "jsnhff";
var api_key = "R_0aeb1b41a33c37b25810b26804bd35df";
var long_url = "http://www.venndiagram.it";
var shortURL = "";
var inputLeft = $("input#input-left");
var inputCenter = $("input#input-center");
var inputRight = $("input#input-right");

function setup() {
	//set the canvas
	canvas = document.getElementById("mcanvas");
	ctx = canvas.getContext("2d");

	//set the interval
	interval = setInterval(draw, 50);

    // Clean those URLs dog
    function cleanURLParam(param) {
        var word = param;
        var plusCount = (word.match(/\+/g)) ? word.match(/\+/g) : 0;
            word = decodeURIComponent(word);
            $.each(plusCount, function(){
                word = word.replace("+"," ");
            });

        return word;
    }
    
    // Now let's set the Venn Diagram values to the URL params! Weee!
    if ($(query_string).length > 0) {
        $.each(query_string, function(key, value) {
            if (key == "left") {
                value = cleanURLParam(value);
                inputLeft.attr("value", value);
            } else if (key == "center") {
                value = cleanURLParam(value);
                inputCenter.attr("value", value)
            } else if (key == "right") {
                value = cleanURLParam(value);
                inputRight.attr("value", value);
            }
        });
    }
}

function draw() {
	//set the canvas size
	//maintain an aspect ration of 3:2
	canvas.width = canvas.width;
	canvas.width = window.innerWidth - 10;
	canvas.height = window.innerHeight - 10;
	var f = Math.min(canvas.width * 2, canvas.height * 3);
	canvas.width = f / 2;
	canvas.height = f / 3;
	canvas.style.marginLeft = (window.innerWidth - canvas.width) / 2 + "px";
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
	var src1 = inputLeft.val();
	// split and measure the text
	var src_ar = src1.split(" ");
	var textw = measureWidestText(src_ar);
	if (textw > offset * 2 - 30) {
		drawMultiline(src_ar, canvas.width / 2 - remainder - textw / 2 - 10, canvas.height / 2, font_size);
	} else {
		drawMultiline(src_ar, canvas.width / 2 - offset - remainder, canvas.height / 2, font_size);
	}
	//text for circle 2
	var src2 = inputRight.val();
	// split the text
	var src_ar = src2.split(" ");
	var textw = measureWidestText(src_ar);
	if (textw > offset * 2 - 30) {
		drawMultiline(src_ar, canvas.width / 2 + remainder + textw / 2 + 10, canvas.height / 2, font_size);
	} else {
		drawMultiline(src_ar, canvas.width / 2 + offset + remainder, canvas.height / 2, font_size);
	}

	//text for overlap
	var src3 = inputCenter.val();
	// split the text
	var src_ar = src3.split(" ");
	var textw = measureWidestText(src_ar);
	//if the overlap is too small, the text should move up and an arrow should be drawn
	if (textw > remainder + 30) {
		//draw the multiline text
		drawMultiline(src_ar, canvas.width / 2, canvas.height / 2 - radius + font_size, font_size);
		//draw the line
		ctx.beginPath();
		ctx.moveTo(canvas.width / 2, canvas.height / 2 - radius + font_size * src_ar.length + 10);
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
		["rgb(96,219,160)", "rgb(227,82,133)", "rgb(58,97,105)"],
		["rgb(255,106,0)", "rgb(140,255,224)", "rgb(181,118,4)"],
		["rgb(237,204,170)", "rgb(191,215,118)", "rgb(180,171,76)"],
		["rgb(232,155,0)", "rgb(0,214,220)", "rgb(0,135,25)"],
		["rgb(222,216,173)", "rgb(78,100,255)", "rgb(57,92,177)"], ];

	$('.color-selector').each(function(index) {
		$(this).click(function() {
            var colorsArray = $('.color-selector');
			color1 = colors[index][0];
			color2 = colors[index][1];
			color3 = colors[index][2];

            //Remove all active classes
            if (!$(this).hasClass('active')) {
                colorsArray.each(function(){
                    $(this).removeClass('active');
                });
            }
            //Add active class to clicked element
            $(this).addClass('active');
		});
		//color diagram color selectors with canvas colors
		$(this).find('.a').css('background',colors[index][0]);
		$(this).find('.b').css('background',colors[index][1]);
	});

	//show and hide menu on mobile
	//$('#toggle-menu').click(function() {
	//	$('.menu-wrapper').toggleClass('show');
	//	$('body').toggleClass('blur');
	//});

	//bind the share button
	$("#share").click(function() {
		//get the canvas
		var canvasd = document.getElementById("mcanvas").toDataURL();
		$("#data").val(canvasd);

		//prepare the title
		$("#title").val($("input#overlap").val().replace(" ", "_"));

		//submit
		$("#frm").trigger('submit');
	});

    var QueryString = function () {
        // This function is anonymous, is executed immediately and
        // the return value is assigned to QueryString!
        var query = window.location.search.substring(1);
        var vars = query.split("&");

        for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            // If first entry with this name
            if (typeof query_string[pair[0]] === "undefined") {
                query_string[pair[0]] = pair[1];
                // If second entry with this name
            } else if (typeof query_string[pair[0]] === "string") {
                var arr = [ query_string[pair[0]], pair[1] ];
                query_string[pair[0]] = arr;
                // If third or later entry with this name
            } else {
                query_string[pair[0]].push(pair[1]);
            }
        }
        return query_string;
    } ();


    // Track changes to inputs and change the URL params based on new values
    // This could probably be a lot cleaner.
    // Known Bugs: This state tracking prevents a select all and delete. It's
    // kind of annoying, but we'll see if folks notice it. If they do we can
    // work around it.
    var inputs = $("#input-left, #input-center, #input-right");
        inputs.bind("change paste", function() {
            var inputID = $(this).attr("id");
            var value = "";
                if (inputID == "input-left") {
                    value = inputLeft.val();
                    inputLeft.attr("value", value);
                } else if (inputID == "input-center") {
                    value = inputCenter.val();
                    inputCenter.attr("value", value);
                } else if (inputID == "input-right") {
                    value = inputRight.val();
                    inputRight.attr("value", value);
                }
            var map = {
                left: inputLeft.val(),
                center: inputCenter.val(),
                right: inputRight.val()
            };
            newURL = $.param(map);
            var newURL = "?" + newURL;
            history.pushState(null, null, newURL);
        });

    // Let's make our long URL with params, nice n short
    function get_short_url(long_url, login, api_key, func)
    {
        $.getJSON(
                "http://api.bitly.com/v3/shorten?callback=?",
                {
                    "format": "json",
                    "apiKey": api_key,
                    "login": login,
                    "longUrl": long_url
                },
                function(response)
                {
                    func(response.data.url);
                }
                );
    }

    // Create a short link when folks hover on the tweet button
    $("#share").on("mouseover", function(){
        var params = window.location.search;
        var long_url = "http://www.parseshare.com/den/"+params;
        get_short_url(long_url, login, api_key, function(short_url) {
            shortURL = short_url;
            console.log(shortURL);
        });
            $("#share").attr("href", "https://twitter.com/intent/tweet?text=I made a Venn Diagram! &url="+shortURL+"&hashtags=venndiagram&via=jsnhff");
    });

	setup();
});
