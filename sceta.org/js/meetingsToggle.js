/* 
 * Meetings Toggle
 */

$(document).ready(function() {
	var meetings_fall2014 = $('ul.meetings_fall2014');
	var meetings_winter2015 = $('ul.meetings_winter2015');
	var meetings_spring2015 = $('ul.meetings_spring2015');
	var meetings_fall2015 = $('ul.meetings_fall2015');
	var meetings_winter2016 = $('ul.meetings_winter2016');

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

	<!-- Meetings - Spring 2015 -->
	$('#btn_meetings_spring2015').on('click', function(e) {
		meetings_spring2015.toggle('Blind');
		return false;
	});

	<!-- Meetings - Fall 2015 -->
	$('#btn_meetings_fall2015').on('click', function(e) {
		meetings_fall2015.toggle('Blind');
		return false;
	});

	<!-- Meetings - Winter 2016 -->
	$('#btn_meetings_winter2016').on('click', function(e) {
		meetings_winter2016.toggle('Blind');
		return false;
	});

	<!-- Galleries - Show All -->
	$('#btn_showMeetings').on('click', function(e) {
		meetings_fall2014.show('Blind');
		meetings_winter2015.show('Blind');
		meetings_spring2015.show('Blind');
		meetings_fall2015.show('Blind');
		meetings_winter2016.show('Blind');
	});

	<!-- Galleries - Hide All -->
	$('#btn_hideMeetings').on('click', function(e) {
		meetings_fall2014.hide('Blind');
		meetings_winter2015.hide('Blind');
		meetings_spring2015.hide('Blind');
		meetings_fall2015.hide('Blind');
		meetings_winter2016.hide('Blind');
	});
});
