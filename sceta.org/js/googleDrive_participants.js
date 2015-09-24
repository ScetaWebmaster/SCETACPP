$(document).ready(function() {
	//=========================================================================
	//    SCRIPT EXECUTION
	//=========================================================================

	// Grab all necessary parameters.
	var parameters = JSON.parse(jQuery('#gdrive_participants').html());
	var numEvents = parameters['NumEvents'];
	var name, date, priority, legend, id;
	var counter = 0;
	var event = [];
	
	// Define the content container.
	var container = $('img#img_participants');

	// Store the content.
	var content = '';

	// If the number of events is 0, then display the no participants message.
	if (numEvents == 0) {
		content += '<p>There are no upcoming events with participants to list. Please stay tuned for any future announcements.</p>';

		// Hide the loading animation and display the menu content.
		container.hide();
		container.before(content);
	}

	// Otherwise, process the number of events.
	else {
		// Display the list of all events available with toggleable links.
		content += '<ul class="eventsList">';

		// Cycle through each event.
		for (i = 0; i < numEvents; i++) {
			// Get the name, date, and priority.
			name = parameters['Name[' + i + ']'];
			date = parameters['Date[' + i + ']'];
			priority = parameters['Priority[' + i + ']'];

			// Add the event as a list item.
			content += '<li><a href="javascript:void(0);" id="btn_event' + i + '">' 
				+ '[' + date + '] ' + name;

			// If the event is sorted by signup time, then add the asterisk
			// indicator.
			if (priority == 'true') {
				content += ' ***';
			}

			// Close the list item tag.
			content += '</a></li>';
		}

		// Close the list of events.
		content += '</ul>';

		// Display the Show All / Hide All buttons.
		content += '<p class="eventsList"><a href="javascript:void(0);" class="button" id="btn_showEvents">Show All</a> <a href="javascript:void(0);" class="button" id="btn_hideEvents">Hide All</a></p>';

		// Display but initially hide the events list content.
		container.before(content);
		$('.eventsList').hide();

		// Gather the data content of each event.
		processFeed();
	}

	//=========================================================================
	//    FUNCTIONS
	//=========================================================================

	// Processes the JSON feed of a defined event.
	function processFeed() {
		// Retrieve the current sheet ID.
		id = parameters['ID[' + counter + ']'];

		// Define the JSON feed URL of the current event.
		sheetUrl = 'https://spreadsheets.google.com/feeds/list/' + id + '/1/public/values?alt=json&prettyprint=true';

		// If we have not reached our maximum number of events, then continue.
		if (counter < numEvents) {
			// Get the JSON data for the current event.
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
					content = '<hr class="event' + counter + '"><h3 class="event' + counter + '">' + name;

					// If the priority is enabled, then add the indicator.
					if (priority == 'true') {
						content += ' ***';
					}	

					// Close the event name header.
					content += '</h3>';

					// Create the ordered list for the current event and
					// display it.
					content += '<ol class="event' + counter + '">';
					container.before(content);

					// If there is no data, then display the no participants message.
					if (data.feed.entry == null) {
						$('ol.event' + counter).append(
							'<p class="eventsListContent">There are currently no participants signed'
							+ 'up for this event. If you' + "'" 
							+ 'd like to sign up for this event, please sign up through our '
							+ '<a href="../signups/">Signups page</a>.</p>'
						);
					}

					// Otherwise, begin parsing the data.
					else {
						// Store the date and time when the event was last updated.
						var dateUpdated, timeUpdated;
						
						// Store the data content.
						var dataContent = '';

						// Parse and render each event.
						$.each(data.feed.entry, function(j, item) {
							// Retrieve the raw date and format it to Day (abbreviated), 
							// Month (abbreviated) Date, 4-Digit Year.
							var dateUpdated_raw = new Date(item.updated.$t);
							dateUpdated = dayToString(dateUpdated_raw.getDay()) 
								+ ', ' + monthToString(dateUpdated_raw.getMonth()) 
								+ ' ' + dateUpdated_raw.getDate() 
								+ ', ' + dateUpdated_raw.getFullYear();

							// Get the time's hour.
							var hour = dateUpdated_raw.getHours();

							// Initialize the ampm variable.
							var ampm = 'AM';

							// If the hour is greater than or equal to 12, then
							// change the AMPM tag to "PM" and convert to 
							// 12-hour time format.
							if (hour >= 12) {
								ampm = 'PM';

								// If the hour is greater than 12, then deduct 12.
								if (hour > 12) {
									hour -= 12;
								}
							}

							// Else if the hour is 0, then set it to 12.
							else if (hour == 0) {
								hour = 12;
							}

							// Get the raw minutes of time and pad it with 
							// zeroes if it's less than 2 digits.
							var min = lpad(dateUpdated_raw.getMinutes(), '0', 2);

							// Put together all the time formats.
							timeUpdated = hour + ':' + min + ' ' + ampm;

							// Store names of every event participant.
							dataContent += '<li>' + item.gsx$name.$t + '</li>';
						});

						// If there is an additional legend, then display it.
						if (legend != '') {
							$('ol.event' + counter).append(
								'<p class="eventsListContent">' + legend + '</p>'
							);
						}

						// Display the data of each event.
						$('ol.event' + counter).append(
							'<p class="eventsListContent">Last Updated: ' 
							+ dateUpdated + " at " + timeUpdated + '</p>' 
							+ dataContent
						);

						// If there is no priority set, then sort the list alphabetically. 
						if (priority == 'false') {
							sortListAbc($('ol.event' + counter));
						}
					}

					// Store the object of the new event.
					event[counter] = $('.event' + counter);

					// Increment the events counter.
					counter++;

					// If the counter is still less than the number of events,
					// then process the feed again.
					if (counter < numEvents) {
						processFeed();	
					}

					// Otherwise, display the content.
					else {
						// Hide the loading animation.
						container.hide();

						// Show the list of events since everything has finally loaded.
						$('.eventsList').show();

						// Define each event toggle.
						defineToggles();

						// Define the "Show All" button.
						$(document).on('click', '#btn_showEvents', function() {
							for (i = 0; i < numEvents; i++) {
								event[i].show('Blind');
							}
						});

						// Define the "Hide All" button.
						$(document).on('click', '#btn_hideEvents', function() {
							for (i = 0; i < numEvents; i++) {
								event[i].hide('Blind');
							}
						});
					}
				}
			});
		}
	}

	// Defines the individual button toggles.
	// WARNING: Due to limitations, this function is unable to loop through
	// the elements. If you need to add more, then you will need to manually 
	// add more.
	function defineToggles() {
		$(document).on('click', '#btn_event0', function() {
			event[0].toggle('Blind');
		});

		$(document).on('click', '#btn_event1', function() {
			event[1].toggle('Blind');
		});

		$(document).on('click', '#btn_event2', function() {
			event[2].toggle('Blind');
		});

		$(document).on('click', '#btn_event3', function() {
			event[3].toggle('Blind');
		});

		$(document).on('click', '#btn_event4', function() {
			event[4].toggle('Blind');
		});
	}

	// Sorts the passed in list alphabetically.
	function sortListAbc(list) {
		// Get all the list items.
		var listItems = list.children('li').get();

		// Sort the list items alphabetically.
		listItems.sort(function(a, b) {
			return $(a).text().toUpperCase().localeCompare($(b).text().toUpperCase());
		})

		// Return an alphabetically sorted list.
		$.each(listItems, function(id, item) {
			list.append(item);
		});
	}

	// Pads single digits to two digits with 0s if needed.
	function lpad(str, pad_string, length) {
		// Force the input into a string.
		var str = new String(str);

		// While the length of the string is less than the defined length, pad
		// the string with the pad string.
		while (str.length < length) {
			str = pad_string + str;
		}

		// Return the padded string.
		return str;
	}

	// Converts the day integer to its string value.
	function dayToString(day) {
		var days = ["Sun.", "Mon.", "Tue.", "Wed.", "Thu.", "Fri.", "Sat."];
		return days[day];
	}

	// Converts the month integer to its string value.
	function monthToString(month) {
		var months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.", "Jul.", "Aug.", "Sep.", "Oct.", "Nov.", "Dec."];
		return months[month];
	}
});