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

	// Process the JSON feed of a defined event.
	function processFeed() {
		// Retrieve the current sheet ID.
		id = parameters['ID[' + counter + ']'];

		// Define the JSON feed URL of the current event.
		sheetUrl = "https://spreadsheets.google.com/feeds/list/" + id + "/1/public/values?alt=json&prettyprint=true";

		if (counter < numEvents) {
			// Gather all the data for each event.
			$.ajax({
				url: sheetUrl, 
				async: true,
				type: 'GET',
				dataType: 'json',
				success: function(data) {
					// Gather all the parameters of the current event.
					name = parameters['Name[' + counter + ']'];
					date = parameters['Date[' + counter + ']'];
					priority = parameters['Priority[' + counter + ']'];
					legend = parameters['Legend[' + counter + ']'];

					// Display the header of each event.
					content = "<h4 class='event" + counter + "'>" + name + " (" + date + ")";

					if (priority == "true") {
						content += " ***";
					}	

					content += "</h4>";
					content += "<ol class='event" + counter + "'>";
					container.before(content);

					// If there is no data, then display the no participants message.
					if (data.feed.entry == null) {
						$("ol.event" + counter).append("<p class='eventsListContent'>There are currently no participants signed up for this event. If you'd like to sign up for this event, please sign up through our <a href='../signups/'>Signups page</a>.</p>");
					}

					// Otherwise, begin parsing the data.
					else {
						var sheetUrl, dateUpdated_raw, dateUpdated, timeUpdated, hour, min, ampm;
						var dataContent = "";

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

						// If there is an additional legend, display it.
						if (legend != "") {
							$("ol.event" + counter).append("<p class='eventsListContent'>" + legend + "</p>");
						}

						// Display the data of each event.
						$("ol.event" + counter).append("<p class='eventsListContent'>Last Updated: " + dateUpdated + " at " + timeUpdated + "</p>" + dataContent);

						if (priority == "false") {
							sortListAbc($("ol.event" + counter));
						}
					}

					// Store the object of the new event.
					event[counter] = $('.event' + counter);

					counter++;

					if (counter < numEvents) {
						processFeed();	
					}

					else {
						// Hide the loading animation.
						container.hide();

						// Show the list of events since everything has finally loaded.
						$('.eventsList').show();

						defineToggles();

						// Define the Show All button.
						$(document).on('click', "#btn_showEvents", function() {
							for (i = 0; i < numEvents; i++) {
								event[i].show('Blind');
							}
						});

						// Define the Hide All button.
						$(document).on('click', "#btn_hideEvents", function() {
							for (i = 0; i < numEvents; i++) {
								event[i].hide('Blind');
							}
						});
					}
				}
			});
		}
	}

	// This function defines the individual button toggles.
	// WARNING: Due to limitations, this function is unable to loop through the elements.
	// If you need to add more, you need to manually add more.
	function defineToggles() {
		$(document).on('click', "#btn_event0", function() {
			event[0].toggle('Blind');
		});

		$(document).on('click', "#btn_event1", function() {
			event[1].toggle('Blind');
		});

		$(document).on('click', "#btn_event2", function() {
			event[2].toggle('Blind');
		});

		$(document).on('click', "#btn_event3", function() {
			event[3].toggle('Blind');
		});

		$(document).on('click', "#btn_event4", function() {
			event[4].toggle('Blind');
		});
	}

	// Sort the passed in list in ABC order.
	function sortListAbc(list) {
		var listItems = list.children('li').get();
		listItems.sort(function(a, b) {
			return $(a).text().toUpperCase().localeCompare($(b).text().toUpperCase());
		})
		$.each(listItems, function(id, item) {
			list.append(item);
		});
	}

	// Grab all necessary parameters.
	var parameters = JSON.parse(jQuery('#gDriveFeed').html());
	var numEvents = parameters['NumEvents'];
	var name, date, priority, legend, id;
	var counter = 0;
	var event = [];
	
	// Define the constant container parameter and a variable to manage content.
	var container = $("img#list");
	var content = "";

	// If the number of events is 0, then display the no participants message.
	if (numEvents == 0) {
		content += "<p>There are no upcoming events with participants to list. Please stay tuned for any future announcements.</p>";

		// Hide the loading animation and display the menu content.
		container.hide();
		container.before(content);
	}

	// Otherwise, we assume the number of events is greater than 0 (granted the webmaster doesn't mess up).
	else {
		// Display the list of all events available with togglable links.
		content += "<ul class='eventsList'>";

		for (i = 0; i < numEvents; i++) {
			name = parameters['Name[' + i + ']'];
			date = parameters['Date[' + i + ']'];
			priority = parameters['Priority[' + i + ']'];

			content += "<li><a href='javascript:void(0);' id='btn_event" + i + "'>" + name + " (" + date + ")";

			if (priority == "true") {
				content += " ***";
			}

			content += "</a></li>";
		}

		content += "</ul>";

		// Display the Show All / Hide All buttons.
		content += "<p class='eventsList'>[<a href='javascript:void(0);' id='btn_showEvents'>Show All</a>] / [<a href='javascript:void(0);' id='btn_hideEvents'>Hide All</a>]</p>";

		// Display but initially hide the events list content.
		container.before(content);
		$('.eventsList').hide();

		// Gather the data content of each event. Results will be stored in dataContentArray.
		processFeed();
	}
});