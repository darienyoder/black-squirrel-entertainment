function toggleNav()
{
    let nav = document.getElementById("nav-links");
    if (nav.style.display == "block")
    {
        nav.style.display = "none";
    }
    else
    {
        nav.style.display = "block";
    }
}

function openNavSubmenu(submenu)
{
    return;
    if (window.innerHeight / window.innerWidth > 1.0)
    {
        if (submenu.id == "toggled-nav")
        {
            setTimeout(10, closeNavSubmenu(submenu));
            return;
        }
        let current = document.getElementById("toggled-nav");
        if (current)
        {
            current.id = "";
        }
        submenu.id = "toggled-nav";
    }
}

function closeNavSubmenu(submenu)
{
    submenu.id = "";
}

function getStylesheetElement(path)
{
    return '<link rel="stylesheet" href="/wp-content/themes/BlackSquirrelEntertainment/style/' + path + '?ver=' + String(Date.now() / 1000) + '">';
}

var url = "";
const submenuKeys = {
    "/tv" : ["/tv"],
    "/radio" : ["/radio", "/podcasts"],
    "/articles" : ["/article"],
}

function updateStyle()
{
    if (url != window.location.pathname)
    {
        let oldUrl = url;
        url = window.location.pathname;
        let style = document.getElementById("nav-style");
        let newStyle = "";

        if (
            url == "/tv"
            || url == "/radio"
            || url == "/article"
            || (
                url.startsWith("/tv")
                && url != "/tv/shows"
                && url != "/tv/schedule"
            )
        ) newStyle += getStylesheetElement("fullscreen-content.css");

        if (
            !url.startsWith("/tv")
            && !url.startsWith("/radio")
            && !url.startsWith("/podcasts")
            && !url.startsWith("/article")
        ) newStyle += getStylesheetElement("collapsed-nav.css");

        if (style.innerHTML != newStyle)
            style.innerHTML = newStyle;



        for (var item of document.getElementsByClassName("bse-submenu"))
        {
            let link = item.children[0].href.replace("https://blacksquirrelradio.com", "");
            let found = false;
            for (var prefix of submenuKeys[link])
            {
                if (url.startsWith(prefix))
                {
                    item.parentElement.id = "toggled-nav";
                    found = true;
                    break;
                }
            }
            if (!found)
            {
                item.parentElement.id = "";
            }
        }

        if (oldUrl != "")
        {
            pageLoadProgress = 1.0
            document.getElementById("progress-bar").children[0].style.opacity = 0;

            setTimeout(function(){document.getElementById("progress-bar").style.display = "none"; document.getElementById("progress-bar").children[0].style.opacity = 1; pageLoadProgress = 0.0; isLoading = false; setTimeout(function(){document.getElementById("progress-bar").style.display = "block";}, 100)}, 1000);
        }
    }
    if (isLoading)
    {
        if (pageLoadProgress < 0.7)
        {
            pageLoadProgress += 0.15 * 0.01;
        }
        else
        {
            pageLoadProgress += (1.0 - pageLoadProgress) * 0.2 * 0.01;
        }
    }
    document.getElementById("progress-bar").children[0].style.width = (pageLoadProgress * 100.0).toString() + "%";
}

var isLoading = false;
var pageLoadProgress = 0.0;

// On link clicked

function setupLinkDetection()
{
    document.body.onclick = function(clickEvent){
        let element = clickEvent.target;

        while (element.tagName.toLowerCase() != 'html')
        {
            if (element.tagName.toLowerCase() == 'a' && element.href && element.href != window.location.href)
            {
                isLoading = true;
                pageLoadProgress = 0.1;
                break;
            }
            else
            {
                element = element.parentNode;
            }
        }
    };
}





// Radio player


var finishedLoading = false;
var isPlaying = false;

function togglePlayer()
{
	isPlaying = !isPlaying;
	if (isPlaying)
	{
		document.getElementById("pb-arrow").src = "/wp-content/themes/BlackSquirrelEntertainment/assets/pause-button.png";
	}
	else
	{
		document.getElementById("pb-arrow").src = "/wp-content/themes/BlackSquirrelEntertainment/assets/play-button.png";
	}
    if (document.getElementById("tv-livestream-loader"))
    {
        playLivestream();
    }
}


function enableClickDetection()
{
	document.activeElement.blur();
	var monitor = setInterval(function() {
        if (document.getElementById("livestream-play-button") || document.getElementById("tv-livestream-loader"))
        {
    		var elem = document.activeElement;
    		if (elem && elem.tagName == 'IFRAME')
    		{
    			if (finishedLoading)
    			{
    				togglePlayer();
    			}
    			clearInterval(monitor);
                if (!document.getElementById("tv-livestream-loader"))
                {
                    setTimeout(enableClickDetection, 100);
                }
    		}
        }
        else
        {
            clearInterval(monitor);
        }
	}, 100);
}

var canvas;
var ctx;
var baseline = 0;
var time = 0;
var wave = 0;
const barWidth = 100;
const barGap = 10;
var waveScale = 0.0;

function onRadioPlayerLoad()
{
    finishedLoading = false;
    isPlaying = false;

    if (document.getElementById("radio-visualizer"))
    {
        canvas = document.getElementById("radio-visualizer");
        ctx = canvas.getContext("2d");
    }
    baseline = 0;
    time = 0;
    wave = 0;
    waveScale = 0.0;

    enableClickDetection();

}

function visualizerFrame()
{
	if (document.getElementById("radio-visualizer"))
    {
    	time += 1.0 / 60.0;
    	canvas.setAttribute('width', canvas.offsetWidth);
    	canvas.setAttribute('height', canvas.offsetHeight);
    	baseline = canvas.offsetHeight;//(document.getElementById("livestream-play-button").getBoundingClientRect().top + document.getElementById("livestream-play-button").getBoundingClientRect().bottom) * 0.5;
    	ctx.clearRect(0, 0, canvas.offsetWidth, canvas.offsetHeight);
    	for (var i in Array.from( Array(1 + Math.floor(canvas.offsetWidth / (barWidth + barGap))).keys() ) )
    	{
    		if (isPlaying)
    		{
    			waveScale += 1.0 / 60;
    			waveScale = Math.min(waveScale, 1.0);
    		}
    		else
    		{
    			waveScale -= 0.5 / 60;
    			waveScale = Math.max(waveScale, 0.0);
    		}
    		wave = (Math.sin(Math.sin((i - time * 0.1) * 23.639) + 3 * 2.0 * (0.5 + Math.sin(i + time * 2.0 * 0.5)) * 0.2 + 1.9 ) + 1.25) * 100 * waveScale;
    		ctx.fillStyle = "#257bb1";
    		ctx.fillRect(i * (barWidth + barGap) - barWidth * 0.4, baseline - wave, barWidth, wave);
    	}
    }
}

setInterval(visualizerFrame, 1000.0 / 60.0);

function getPlayerMetadata()
{
    if (document.getElementById("radio-data-title"))
    {
    	const xhttp = new XMLHttpRequest();
    	xhttp.onload = function() {
            let response = JSON.parse(this.responseText);
            document.getElementById("radio-thumbnail").src = response["cover_image"];
            if (response["host"])
                document.getElementById("radio-data-host").innerHTML = "with " + response["host"];
            else
                document.getElementById("radio-data-host").innerHTML = "";
            document.getElementById("radio-data-title").innerHTML = response["title"];
        }
    	xhttp.open("GET", "/ajax-data/radio-metadata.php", true);
    	xhttp.send();

        setTimeout(getPlayerMetadata, 1000 * 60);
    }

    else if (document.getElementById("tv-livestream-loader"))
    {
    	const xhttp = new XMLHttpRequest();
    	xhttp.onload = function() {
            let response = JSON.parse(this.responseText);
            document.getElementById("livestream-thumbnail").src = response["cover_image"];
            if (response["title"])
                document.getElementById("tv-now-playing").innerText = "On Now: " + response["title"];
            // document.getElementById("radio-data-title").innerHTML = response["title"];
        }
    	xhttp.open("GET", "/ajax-data/tv-metadata.php", true);
    	xhttp.send();

        setTimeout(getPlayerMetadata, 1000 * 60);
    }
}

// TV player

var timeSinceCursorMove = 0.0;

function onTvPlayerLoad()
{
    timeSinceCursorMove = 0.0;
    finishedLoading = false;
    isPlaying = false;
    document.body.onmousemove = function(){timeSinceCursorMove = 0.0;};
    enableClickDetection();
}

function playLivestream()
{
	document.getElementById("livestream-title").remove();
	document.getElementById("tv-now-playing").remove();
	document.getElementById("livestream-play-button").style = "";
	document.getElementById("livestream-play-button").id = "";
	document.getElementsByTagName("IFRAME")[0].style = "opacity:100%; position:fixed; top:0px; left:0px; width:100%; height:100%;";
//     document.getElementById("livestream-thumbnail").remove();
//     document.getElementById("play-button-overlay").remove();
//     document.getElementById("livestream").style.opacity = 1;
//     document.getElementById("livestream-title").remove()
//     document.getElementById("play-button-wrapper").remove();
//     document.getElementById("livestream-overlay").style.backgroundColor = "transparent";
    document.getElementById("bse-header").style.backgroundImage = "linear-gradient(to bottom, #121212ff, #00000000)";
	document.getElementById("bse-header").style.height = "calc((var(--nav1-height) + var(--nav2-height)) * 2.0)";
    isPlaying = true;
}

function increaseTime()
{
    if (document.getElementById("tv-livestream-loader"))
    {
        timeSinceCursorMove += 0.1;
    	if (window.innerWidth > window.innerHeight)
    	{
    		if (!isPlaying || timeSinceCursorMove < 3.0)
    		{
    // 			document.getElementById("livestream-overlay").style.opacity = 1.0;
    			document.getElementById("bse-header").style.opacity = 1.0;
    			document.getElementById("livestream-wrapper").style.cursor = "default";
    		}
    		else
    		{
    // 			document.getElementById("livestream-overlay").style.opacity = 0.0;
    			document.getElementById("bse-header").style.opacity = 0.0;
    			document.getElementById("livestream-wrapper").style.cursor = "none";
    		}
    	}
    }
}

setInterval(increaseTime, 100);
