var canvas, ctx;
var interval;
var spread;
var urlSpreadSet = true;
var radius = 150;
var colorSelectors = $(".color-selector");
var colors = [
                ["rgb(255,255,40)", "rgb(70,175,220)", "rgb(70,175,34)"],
                ["rgb(70,175,220)", "rgb(193,39,112)", "rgb(57,36,108)"],
                ["rgb(53,91,250)", "rgb(137,233,129)", "rgb(33,89,128)"],
                ["rgb(96,219,160)", "rgb(227,82,133)", "rgb(58,97,105)"],
                ["rgb(255,106,0)", "rgb(140,255,224)", "rgb(181,118,4)"],
                ["rgb(237,204,170)", "rgb(191,215,118)", "rgb(180,171,76)"],
                ["rgb(232,155,0)", "rgb(0,214,220)", "rgb(0,135,25)"],
                ["rgb(222,216,173)", "rgb(78,100,255)", "rgb(57,92,177)"],
            ];
var color1 = colors[0][0];
var color2 = colors[0][1];
var color3 = colors[0][2];
var is_mobile = false;
var query_string = {};
var query_string_count = "";
var login = "jsnhff";
var api_key = "R_0aeb1b41a33c37b25810b26804bd35df";
var long_url = "http://www.venndiagram.it";
var shortURL = "";
var shareButtons = $("#share, #mobile-share");
// Clean up the inputs to just make them an Array?
var inputs = $("#input-left, #input-center, #input-right, #spread-slider, .color-selector");
var inputLeft = $("#input-left");
var inputCenter = $("#input-center");
var inputRight = $("#input-right");
var inputSpread = $("#spread-value");
var mobileSpreadButtons = $("#spread-increase, #spread-decrease");
var leftVal;
var centerVal;
var rightVal;
var spreadVal;
var colorVal;
var random_string_count = "";
var random_string = {
    "1": {
        "left":"Nobel Peace Prize Winner",
        "center":"Barack Obama",
        "right":"Emmay Award Winner",
        "spread": 50,
        "color": 0
    },
    "2": {
        "left":"Things I Like",
        "center":"Things I Used to Like",
        "right":"Things You Like",
        "spread": 70,
        "color": 1
    },
    "3": {
        "left":"Movies",
        "center":"Shitty Movies",
        "right":"Vin Diesel",
        "spread": 30,
        "color": 5
    },
    "4": {
        "left":"Art",
        "center":"Postinternet Art",
        "right":"Net.Art",
        "spread": 10,
        "color": 7
    }
};

function setup() {
	// Set the canvas
	canvas = document.getElementById("mcanvas");
	ctx = canvas.getContext("2d");

	// Set the interval
	interval = setInterval(draw, 50);

}

function draw() {
	// Set the canvas size
	// Maintain an aspect ration of 3:2
	canvas.width = canvas.width;
	canvas.width = window.innerWidth - 10;
	canvas.height = window.innerHeight - 10;
	var f = Math.min(canvas.width * 2, canvas.height * 3);
	canvas.width = f / 2;
	canvas.height = f / 3;
	canvas.style.marginLeft = (window.innerWidth - canvas.width) / 2 + "px";
	radius = canvas.width * 0.22;

    // Update the spread
    if (urlSpreadSet) {
        inputSpread.attr("value",spread);
        $("#spread-slider a").css("left", spread+"%");
        urlSpreadSet = false;
    } else {
        spread = parseInt(inputSpread.val());
    }

	// Keep the spread within a boundary of 100
	spread = (spread > 98) ? 98 : spread;
	spread = (spread <= 2) ? 2 : spread;
	var offset = radius * (100 - spread) / 100;

	// Circle 1
	ctx.beginPath();
	ctx.arc(canvas.width / 2 - offset, canvas.height / 2, radius, 0, Math.PI * 2, true);
	ctx.closePath();
	ctx.fillStyle = color1;
	ctx.fill();

	// Circle 2
    ctx.beginPath();
    ctx.arc(canvas.width / 2 + offset, canvas.height / 2, radius, 0, Math.PI * 2, true);
	ctx.closePath();
	ctx.fillStyle = color2;
	ctx.fill();

	// Intersection
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

	// Text style
	var font_size = radius / 8;
	ctx.font = "bold " + font_size + "px sans-serif";
	ctx.fillStyle = 'rgba(0,0,0,1)';
	ctx.strokeStyle = 'rgba(0,0,0,1)';
	ctx.textAlign = "center";
	var remainder = radius - offset;

	// Text for circle 1
	// Grab the text
	var src1 = inputLeft.val();
	// Split and measure the text
	var src_ar = src1.split(" ");
	var textw = measureWidestText(src_ar);
	if (textw > offset * 2 - 30) {
		drawMultiline(src_ar, canvas.width / 2 - remainder - textw / 2 - 10, canvas.height / 2, font_size);
	} else {
		drawMultiline(src_ar, canvas.width / 2 - offset - remainder, canvas.height / 2, font_size);
	}

	// Text for circle 2
    // Grab the text
	var src2 = inputRight.val();
	// Split and measure the text
	var src_ar = src2.split(" ");
	var textw = measureWidestText(src_ar);
	if (textw > offset * 2 - 30) {
		drawMultiline(src_ar, canvas.width / 2 + remainder + textw / 2 + 10, canvas.height / 2, font_size);
	} else {
		drawMultiline(src_ar, canvas.width / 2 + offset + remainder, canvas.height / 2, font_size);
	}

	// Text for overlap
	var src3 = inputCenter.val();
	// Split the text
	var src_ar = src3.split(" ");
	var textw = measureWidestText(src_ar);
	// If the overlap is too small, the text should move up and an arrow should be drawn
	if (textw > remainder + 30) {
		// Draw the multiline text
		drawMultiline(src_ar, canvas.width / 2, canvas.height / 2 - radius + font_size, font_size);
		// Draw the line
		ctx.beginPath();
		ctx.moveTo(canvas.width / 2, canvas.height / 2 - radius + font_size * src_ar.length + 10);
		ctx.lineTo(canvas.width / 2, canvas.height / 2 - 3);
		ctx.closePath();
		ctx.stroke();
		// Draw the arrow head
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
	// Draw it across multiple lines
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
    // Bind click to each color selector button
    function changeColor(index) {
        color1 = colors[index][0];
        color2 = colors[index][1];
        color3 = colors[index][2];

        colorS = $(colorSelectors[index]);
        // Remove all active classes
        if (!$(colorS).hasClass('active')) {
            colorSelectors.each(function(){
                $(this).removeClass('active');
            });
        }
        // Add active class to clicked element
        $(colorS).addClass('active');
    }

	// Associate buttons with colors
	colorSelectors.each(function(index) {
        // Color diagram color selectors with canvas colors
        $(this).find('.a').css('background',colors[index][0]);
        $(this).find('.b').css('background',colors[index][1]);

        $(this).click(function() {
            changeColor(index);
        });
    });

    // Bind color change event on mobile layout
    $("#color-change").bind("click", function(){
        colorVal = parseInt(colorVal)+1;
        if(colorVal >= (colors.length-1)){
            colorVal = 0;
        }
        changeColor(colorVal);
        updateURL("color", colorVal);
    });

    //bind the share button
	//$("#share").click(function() {
	//	//get the canvas
	//	var canvasd = document.getElementById("mcanvas").toDataURL();
	//	$("#data").val(canvasd);

	//	//prepare the title
	//	$("#title").val($("input#overlap").val().replace(" ", "_"));

	//	//submit
	//	$("#frm").trigger('submit');
	//});

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

    // Count the number of params before we set them.
    // This let's us choose to set fun random ones.
    for (var j in query_string) query_string_count++;

    for (var j in random_string) random_string_count++;

    // Now let's set the Venn Diagram values to the URL params! Weee!
    if (query_string_count >= 1 && window.location.search.length > 0) {
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
            } else if (key == "spread") {
                spread = (value != "") ? value : 50;
            } else if (key == "color") {
                color1 = colors[value][0];
                color2 = colors[value][1];
                color3 = colors[value][2];
                $(colorSelectors[value]).addClass("active");
                colorVal = value;
            }
        });
    } else {
        // Create a random number based on the preset Vennz
        var number = Math.floor(Math.random() * random_string_count) + 1;

        // Loop through and set the values of the Venn
        $.each(random_string[[number]], function(key, value) {
            if (key == "left") {
                value = cleanURLParam(value);
                inputLeft.attr("value", value);
            } else if (key == "center") {
                value = cleanURLParam(value);
                inputCenter.attr("value", value)
            } else if (key == "right") {
                value = cleanURLParam(value);
                inputRight.attr("value", value);
            } else if (key == "spread") {
                spread = (value != "") ? value : 50;
            } else if (key == "color") {
                color1 = colors[value][0];
                color2 = colors[value][1];
                color3 = colors[value][2];
                $(colorSelectors[value]).addClass("active");
                colorVal = value;
            }
        });
    }

    // Initiate the slider with some boundaries and steps
    $( "#spread-slider" ).slider({
        value: spread,
        min: 0,
        max: 100,
        step: 10,
        slide: function( event, ui ) {
            $( "#spread-value" ).val( ui.value );
        }
    });
    // Bind mobile slider button actions
    mobileSpreadButtons.bind("click", function() {
        var thisID = $(this);
        var spreadValue = inputSpread.val();

        if (thisID.is("#spread-increase")) {
            spreadValue = parseInt(spreadValue)+10;
            inputSpread.attr("value",spreadValue);
            $("#spread-slider a").css("left", spreadValue+"%");
        } else if (thisID.is("#spread-decrease")) {
            spreadValue = parseInt(spreadValue)-10;
            inputSpread.attr("value",spreadValue);
            $("#spread-slider a").css("left", spreadValue+"%");
        }
    });
    // Rewrite the spread URL param on Slider change
    $("#spread-slider").slider().on("slidechange", function() {
        updateURL("spread", spread);
    });

    // Update URL function
    function updateURL(key, value){
        var leftVal = inputLeft.val(),
            centerVal = inputCenter.val(),
            rightVal = inputRight.val(),
            spreadVal = spread;

        if (key == "left") {
            if (value != inputLeft.val()) {
                leftVal = value;
            } else {
                leftVal = inputLeft.val();
            }
        } else if (key == "center") {
            if (value != inputCenter.val()) {
                centerVal = value;
            } else {
                centerVal = inputCenter.val();
            }
        } else if (key == "right") {
            if (value != inputRight.val()) {
                rightVal = value;
            } else {
                rightVal = inputRight.val();
            }
        } else if (key == "spread") {
            if (value != spread) {
                spreadVal = value;
            } else {
                spreadVal = spread;
            }
        } else if (key == "color") {
            colorVal = value;
        }

        var map = {
            left: leftVal,
            center: centerVal,
            right: rightVal,
            spread: spreadVal,
            color: colorVal
        };
        newURL = $.param(map);
        var newURL = "?" + newURL;
        history.pushState(null, null, newURL);
    }

    // Track changes to inputs and change the URL params based on new values
    // This could probably be a lot cleaner.
    inputs.bind("change paste focus trigger click", function() {
        var inputID = $(this).attr("id");
        var inputValue = $(this).val();

        if (inputID == "input-left") {
            inputLeft.attr("value", inputValue);
            updateURL("left", inputValue);
        } else if (inputID == "input-center") {
            inputCenter.attr("value", inputValue);
            updateURL("center", inputValue);
        } else if (inputID == "input-right") {
            inputRight.attr("value", inputValue);
            updateURL("right", inputValue);
        } else if ($(this).hasClass("active")) {
            $.each(colorSelectors, function(key, value) {
                if ($(value).hasClass("active")) {
                    updateURL("color", key);
                }
            });
        }
    });

    // Setup async function to get links from Bit.ly
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

    // Create a short link when folks click on the tweet button
    shareButtons.click(function(event) {
        // Do not treat this like a link. Thanks.
        event.preventDefault();

        var button = $(this);
        var params = window.location.search;
        var long_url = "http://www.parseshare.com/den/"+params;

        button.addClass("loading");

        get_short_url(long_url, login, api_key, function(short_url) {
            // Assign long URL to be shared
            long_url = "https://twitter.com/intent/tweet?text=I made a Venn Diagram! &url="+short_url+"&hashtags=venndiagram&via=VennDiagramer";
            // Remove that loading wheel
            button.removeClass("loading");
            // Reload the page with the populated tweet all setup
            location.assign(
                long_url
            );
        });

        return false;
    });


	setup();
});
