/* 
 * SCETA Logo & Navigation Toggle
 */

// Change the background color of the name container based on its position.
// The background will change to a 90% transparent green when pass the full
// background. Otherwise, it will be transparent.
$(window).scroll(function () {
	$('.wrapper').each(function () {
		var w = $(window).scrollTop();
		var t = $(this).offset().top - 100;
		var namecontainer = $('#namecontainer');

		if (w > t) {
			namecontainer.css({"background-color": "rgba(27, 94, 32, 0.9)"});
		}

		else {
			namecontainer.css({"background-color": "transparent"});
		}

		return false;
	});
});

/*
 * Push Menu
 */

// Identify the necessary elements for nav_toggle.js.
var body = document.body,
	menuRight = document.getElementById('cbp-spmenu-s2'),
	showRightPush = document.getElementById('showRightPush'),
	namecontainer = document.getElementById('namecontainer'),
	namecontent = document.getElementById('namecontent'),
	background = document.getElementById('background');
	background2 = document.getElementById('background2');

// Toggle the push menu and the fade settings of all other elements.
showRightPush.onclick = function() {
	classie.toggle(showRightPush, 'active');
	classie.toggle(background, 'fade');

	if (background2) {
		classie.toggle(background2, 'fade');
	}

	toggleClassOnElementWithClass('wrapper', 'fade');
	classie.toggle(body, 'cbp-spmenu-push-toleft');
	classie.toggle(namecontainer, 'cbp-spmenu-push-toleft');
	classie.toggle(menuRight, 'cbp-spmenu-open');
	disableOther('showRightPush');
};

// Allow closing of push menu when clicking on namecontent.
namecontent.onclick = function() {
	if (hasClass(document.getElementById('cbp-spmenu-s2'), 'cbp-spmenu-open')) {
		showRightPush.onclick();
	}
};

// Allow closing of push menu when clicking on background.
background.onclick = function() {
	if (hasClass(document.getElementById('cbp-spmenu-s2'), 'cbp-spmenu-open')) {
		showRightPush.onclick();
	}
};

if (background2) {
	// Allow closing of push menu when clicking on background2.
	background2.onclick = function() {
		if (hasClass(document.getElementById('cbp-spmenu-s2'), 'cbp-spmenu-open')) {
			showRightPush.onclick();
		}
	};
}

// Allow closing of push menu when clicking on wrapper.
var elems = document.getElementsByTagName('*'), i;
for (i in elems) {
    if((' ' + elems[i].className + ' ').indexOf(' ' + 'wrapper' + ' ')
            > -1) {
        elems[i].onclick = function() {
        	if (hasClass(document.getElementById('cbp-spmenu-s2'), 'cbp-spmenu-open')) {
        		showRightPush.onclick();
        	}
        };
    }
}

function disableOther(button) {
	if (button !== 'showRightPush') {
		classie.toggle(showRightPush, 'disabled');
	}
}

/*
 * Highlight Current Page 
 */

// Get all the links 
var tabs = document.getElementsByClassName('navigation');
var url = window.location.href;

// Remove any trailing forward slash.
if (url.charAt(url.length - 1) == '/') {
	url = url.substr(0, url.length - 1);
}
	
// Split the URL link at every forward slash.
var urlText = url.split('/');
var curPage;

// Define a hash of tab sections.
var tabGroups = {};
tabGroups['home'] = 'home';
tabGroups['about'] = 'about';
tabGroups['events'] = 'events';
tabGroups['resources'] = 'resources gallery';
tabGroups['services'] = 'services 3d parts';
tabGroups['join'] = 'join';
tabGroups['contact'] = 'contact';

// Process each text between forward slashes.
for (i=0; i < urlText.length; i++)
{
	// If the current text contains the sceta.org name, then continue checking
	// for the current page.
	if (~urlText[i].toLowerCase().indexOf("sceta.org")) 
	{
		// If there is still more text, then define the current page as the
		// next text iteration.
		if ((i+1) < urlText.length)
		{
			curPage = urlText[i + 1];
			break;
		}

		// Otherwise, default to "home".
		else
		{
			curPage = 'home';
		}
	}
}

// Cycle through each tab.
for (i=0; i < tabs.length; i++) {
	// If the tab is the current page, then highlight it.
	if (~tabGroups[tabs[i].getAttribute('data-link').toLowerCase()].indexOf(curPage)) {
		tabs[i].style.backgroundColor = '#388e3c';
		tabs[i].style.color = 'white';
	}
}

/*
 * Helper Functions
 */

// Checks if an element has a class.
function hasClass(element, cls) {
	return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}

// Toggles a class on elements with a specific class.
function toggleClassOnElementWithClass(matchClass, addClass) {
    var elems = document.getElementsByTagName('*'), i;
    for (i in elems) {
        if((' ' + elems[i].className + ' ').indexOf(' ' + matchClass + ' ')
                > -1) {
            classie.toggle(elems[i], addClass);
        }
    }
}