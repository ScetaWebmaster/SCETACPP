<!-- This Javascript file is purely for all the toggle switches on the top main containers. -->

$(document).ready(function() {
	var menu1 = $('#menu_about');
	var menu2 = $('#menu_members');
	var menu3 = $('#menu_events');
	var menu4 = $('#menu_services');
	var menuRegular = $('li.col');
	var menu_3d = $('ul.menu_3d');
	var meetings_fall2014 = $('.meetings_fall2014');
	var meetings_winter2015 = $('.meetings_winter2015');
	var event0 = $('.event0');
	var event1 = $('.event1');
	var event2 = $('.event2');
	var event3 = $('.event3');
	var event4 = $('.event4');
	var gallery_2005 = $('.gallery_2005');
	var gallery_2006 = $('.gallery_2006');
	var gallery_2008 = $('.gallery_2008');
	var gallery_2009 = $('.gallery_2009');
	var gallery_2010 = $('.gallery_2010');
	var gallery_2011 = $('.gallery_2011');
	var gallery_2012 = $('.gallery_2012');
	var gallery_2013 = $('.gallery_2013');
	var gallery_2014 = $('.gallery_2014');

	<!-- Drop Down Menu - About -->
	$('#btn_about').on('click', function(e) {
		menu1.toggle('Blind');

		if (menu2.css('display') != 'none') {
			menu2.hide('Blind');
		}

		if (menu3.css('display') != 'none') {
			menu3.hide('Blind');
		}

		if (menu4.css('display') != 'none') {
			menu4.hide('Blind');
		}

		return false;
	});

	<!-- Drop Down Menu - Members -->
	$('#btn_members').on('click', function(e) {
		menu2.toggle('Blind');

		if (menu1.css('display') != 'none') {
			menu1.hide('Blind');
		}

		if (menu3.css('display') != 'none') {
			menu3.hide('Blind');
		}

		if (menu4.css('display') != 'none') {
			menu4.hide('Blind');
		}

		return false;
	});

	<!-- Drop Down Menu - Events -->
	$('#btn_events').on('click', function(e) {
		menu3.toggle('Blind');

		if (menu1.css('display') != 'none') {
			menu1.hide('Blind');
		}

		if (menu2.css('display') != 'none') {
			menu2.hide('Blind');
		}

		if (menu4.css('display') != 'none') {
			menu4.hide('Blind');
		}

		return false;
	});

	<!-- Drop Down Menu - Services -->
	$('#btn_services').on('click', function(e) {
		menu4.toggle('Blind');

		if (menu1.css('display') != 'none') {
			menu1.hide('Blind');
		}

		if (menu2.css('display') != 'none') {
			menu2.hide('Blind');
		}

		if (menu3.css('display') != 'none') {
			menu3.hide('Blind');
		}

		return false;
	});

	<!-- Mobile Menu -->
	$('#btn_mobilemenu').on('click', function(e) {
		menuRegular.toggle('Blind');
		return false;
	});

	<!-- 3D Side Menu -->
	$('.btn_3d').on('click', function(e) {
		menu_3d.toggle('Blind');
		return false;
	});

	<!-- Meetings - Fall 2014 -->
	$('#btn_meetings_fall2014').on('click', function(e) {
		meetings_fall2014.toggle('Blind');
		return false;
	});

	<!-- Meetings - Winter 2015 -->
	$('#btn_meetings_winter2015').on('click', function(e) {
		meetings_winter2015.toggle('Blind');
		return false;
	});

	<!-- Meetings - Show All -->
	$('#btn_showMeetings').on('click', function(e) {
		meetings_fall2014.show('Blind');
		meetings_winter2015.show('Blind');
	});

	<!-- Meetings - Hide All -->
	$('#btn_hideMeetings').on('click', function(e) {
		meetings_fall2014.hide('Blind');
		meetings_winter2015.hide('Blind');
	});

	<!-- Event Participants - Event 0 -->
	$('#btn_event0').on('click', function(e) {
		event0.toggle('Blind');
		return false;
	});

	<!-- Event Participants - Event 1 -->
	$('#btn_event1').on('click', function(e) {
		event1.toggle('Blind');
		return false;
	});

	<!-- Event Participants - Event 2 -->
	$('#btn_event2').on('click', function(e) {
		event2.toggle('Blind');
		return false;
	});

	<!-- Event Participants - Event 3 -->
	$('#btn_event3').on('click', function(e) {
		event3.toggle('Blind');
		return false;
	});

	<!-- Event Participants - Event 3 -->
	$('#btn_event4').on('click', function(e) {
		event4.toggle('Blind');
		return false;
	});

	<!-- Event Participants - Show All -->
	$('#btn_showEvents').on('click', function(e) {
		event0.show('Blind');
		event1.show('Blind');
		event2.show('Blind');
		event3.show('Blind');
		event4.show('Blind');
	});

	<!-- Event Participants - Hide All -->
	$('#btn_hideEvents').on('click', function(e) {
		event0.hide('Blind');
		event1.hide('Blind');
		event2.hide('Blind');
		event3.hide('Blind');
		event4.hide('Blind');
	});

	<!-- Galleries - 2005 - 2006 -->
	$('#btn_gallery_2005').on('click', function(e) {
		gallery_2005.toggle('Blind');
		return false;
	});

	<!-- Galleries - 2006 - 2007 -->
	$('#btn_gallery_2006').on('click', function(e) {
		gallery_2006.toggle('Blind');
		return false;
	});

	<!-- Galleries - 2008 - 2009 -->
	$('#btn_gallery_2008').on('click', function(e) {
		gallery_2008.toggle('Blind');
		return false;
	});

	<!-- Galleries - 2009 - 2010 -->
	$('#btn_gallery_2009').on('click', function(e) {
		gallery_2009.toggle('Blind');
		return false;
	});

	<!-- Galleries - 2010 - 2011 -->
	$('#btn_gallery_2010').on('click', function(e) {
		gallery_2010.toggle('Blind');
		return false;
	});

	<!-- Galleries - 2011 - 2012 -->
	$('#btn_gallery_2011').on('click', function(e) {
		gallery_2011.toggle('Blind');
		return false;
	});

	<!-- Galleries - 2012 - 2013 -->
	$('#btn_gallery_2012').on('click', function(e) {
		gallery_2012.toggle('Blind');
		return false;
	});

	<!-- Galleries - 2013 - 2014 -->
	$('#btn_gallery_2013').on('click', function(e) {
		gallery_2013.toggle('Blind');
		return false;
	});

	<!-- Galleries - 2014 - 2015 -->
	$('#btn_gallery_2014').on('click', function(e) {
		gallery_2014.toggle('Blind');
		return false;
	});

	<!-- Galleries - Show All -->
	$('#btn_showGalleries').on('click', function(e) {
		gallery_2005.show('Blind');
		gallery_2006.show('Blind');
		gallery_2008.show('Blind');
		gallery_2009.show('Blind');
		gallery_2010.show('Blind');
		gallery_2011.show('Blind');
		gallery_2012.show('Blind');
		gallery_2013.show('Blind');
		gallery_2014.show('Blind');
	});

	<!-- Galleries - Hide All -->
	$('#btn_hideGalleries').on('click', function(e) {
		gallery_2005.hide('Blind');
		gallery_2006.hide('Blind');
		gallery_2008.hide('Blind');
		gallery_2009.hide('Blind');
		gallery_2010.hide('Blind');
		gallery_2011.hide('Blind');
		gallery_2012.hide('Blind');
		gallery_2013.hide('Blind');
		gallery_2014.hide('Blind');
	});

	<!-- Click Outside to Close Menus -->
	$(document).on('click', function(e) {
		menu1.hide('Blind');
		menu2.hide('Blind');
		menu3.hide('Blind');
		menu4.hide('Blind');

		if ($(window).width() <= 480) {
			menuRegular.hide('Blind');
		}
	});
});
