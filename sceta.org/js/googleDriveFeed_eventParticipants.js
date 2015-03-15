$(document).ready(function() {
	// Utility method to pad a string on the left.
	// Source: http://sajjadhossain.com/2008/10/31/javascript-string-trimming-and-padding/.
	function lpad(str, pad_string, length) {
		var str = new String(str);
		while (str.length < length)
			str = pad_string + str;
		return str;
	}

	// Convert the day integer to its string value.
	function dayToString(day) {
		var days = ["Sun.", "Mon.", "Tues.", "Wed.", "Thurs.", "Fri.", "Sat."];
		return days[day];
	}

	// Convert the month integer to its string value. Keep note that months are listed starting from 0 - 11.
	function monthToString(month) {
		var months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.", "Jul.", "Aug.", "Sept.", "Oct.", "Nov.", "Dec."];
		return months[month];
	}

	// Grab all necessary parameters.
	var parameters = JSON.parse(jQuery('#gDriveFeed').html());
	var numEvents = parameters['NumEvents'];
	var name, date, timeSorted, id;

	// Define the constant container parameter and a variable to manage content.
	var container = jQuery("img#list");
	var content = "";

	// If the number of events is 0, then display the no participants message.
	if (numEvents == 0) {
		content += "<p>There are no upcoming events with participants to list. Please stay tuned for any future announcements.</p>";
	}

	// Otherwise, we assume the number of events is greater than 0 (granted the webmaster doesn't mess up).
	else {
		/* ===== FULL LIST ===== */

		// Define additional needed variables.
		var sheetUrl, dateUpdated_raw, dateUpdated, timeUpdated, hour, min, ampm, dataContent;

		content += "<ul>";

		// Display the list of all events available with togglable links.
		for (i = 0; i < numEvents; i++) {
			name = parameters['Name[' + i + ']'];
			date = parameters['Date[' + i + ']'];
			timeSorted = parameters['TimeSorted[' + i + ']'];

			content += "<li><a href='javascript:void(0);' id='btn_event" + i + "'>" + name + " (" + date + ")";

			if (timeSorted == "true") {
				content += " ***";
			}

			content += "</a></li>";
		}

		content += "</ul>";

		// Display the Show All / Hide All buttons.
		content += "<p>[<a href='javascript:void(0);' id='btn_showEvents'>Show All</a>] / [<a href='javascript:void(0);' id='btn_hideEvents'>Hide All</a>]</p>";

		/* ===== CONTENT OF EACH ITEM IN LIST ===== */

		for (var i = 0; i < numEvents; i++) {
			// Gather all the parameters of the current event.
			name = parameters['Name[' + i + ']'];
			date = parameters['Date[' + i + ']'];
			timeSorted = parameters['TimeSorted[' + i + ']'];
			id = parameters['ID[' + i + ']'];

			// Display the header of each event.
			content += "<h4 class='event" + i + "'>" + name + " (" + date + ")";

			if (timeSorted == "true") {
				content += " ***";
			}	

			content += "</h4>";
			content += "<ol class='event" + i + "'>";

			// Define the JSON feed URL of the current event.
			sheetUrl = "https://spreadsheets.google.com/feeds/list/" + id + "/1/public/values?alt=json&prettyprint=true";

			// Gather all the data for each event.
			$.ajax({
				url: sheetUrl, 
				type: 'GET',
				dataType: 'json',
				
				async: false,
				success: function(data) {
					// If there is no data, then display the no participants message.
					if (data.feed.entry == null) {
						content = "<p>There are currently no participants signed up for this event.</p>";
					}

					// Otherwise, begin parsing the data.
					else {
						dataContent = "";

						// Parse and render each event.
						$.each(data.feed.entry, function(j, item) {
							// Retrieve the raw date and format it to Day (abbreviated), Month (abbreviated) Date, 4-Digit Year.
							dateUpdated_raw = new Date(item.updated.$t);
							dateUpdated = dayToString(dateUpdated_raw.getDay()) + ", " + monthToString(dateUpdated_raw.getMonth()) + " " + dateUpdated_raw.getDate() + ", " 
								+ dateUpdated_raw.getFullYear();

							// Retrieve the raw hour of time.
							hour = dateUpdated_raw.getHours();

							// Reset the ampm variable.
							ampm = "AM";

							// Convert to 12-hour time format and change the AMPM tag to "PM".
							if (hour >= 12) {
								ampm = "PM";

								// Only deduct 12 if it's greater than 12 PM.
								if (hour > 12) {
									hour = hour - 12;
								}
							}

							// Hour 0 is 12 AM.
							else if (hour == 0) {
								hour = 12;
							}

							// Retrieve the raw minutes of time and pad it with 0s if it's less than 2 digits.
							min = lpad(dateUpdated_raw.getMinutes(), '0', 2);

							// Put together all the time formats.
							timeUpdated = hour + ":" + min + " " + ampm;

							// Display the names of every event participant.
							dataContent += "<li>" + item.gsx$name.$t + "</li>";
						});

						// Display the full updated date & time and close off the OL tag.
						content += "<p style='margin-left: -24px;'>Last Updated: " + dateUpdated + " at " + timeUpdated + "</p>" + dataContent + "</ol>";
					}
				}
			});
		}
	}

	// Hide the loading animation and display the gathered content.
	container.hide();
	container.before(content);

	// Handle all event handlers for event toggling.
	// This is a special case as the handlers must be created AFTER the content is generated because the script will dynamically generate the content.
	var event0 = $('.event0');
	var event1 = $('.event1');
	var event2 = $('.event2');
	var event3 = $('.event3');
	var event4 = $('.event4');

	<!-- Event Participants - Event 0 -->
	$(document).on('click', "#btn_event0", function() {
		event0.toggle('Blind');
		return false;
	});

	<!-- Event Participants - Event 1 -->
	$(document).on('click', "#btn_event1", function() {
		event1.toggle('Blind');
		return false;
	});

	<!-- Event Participants - Event 2 -->
	$(document).on('click', "#btn_event2", function() {
		event2.toggle('Blind');
		return false;
	});

	<!-- Event Participants - Event 3 -->
	$(document).on('click', "#btn_event3", function() {
		event3.toggle('Blind');
		return false;
	});

	<!-- Event Participants - Event 4 -->
	$(document).on('click', "#btn_event4", function() {
		event4.toggle('Blind');
		return false;
	});

	<!-- Event Participants - Show All -->
	$(document).on('click', "#btn_showEvents", function() {
		event0.show('Blind');
		event1.show('Blind');
		event2.show('Blind');
		event3.show('Blind');
		event4.show('Blind');
	});

	<!-- Event Participants - Hide All -->
	$(document).on('click', "#btn_hideEvents", function() {
		event0.hide('Blind');
		event1.hide('Blind');
		event2.hide('Blind');
		event3.hide('Blind');
		event4.hide('Blind');
	});
});