$(document).ready(function() {
	//=========================================================================
	//    SCRIPT EXECUTION
	//=========================================================================

	// Define the single calendar ID.
	var calendarId = 'scetacpp@gmail.com';

	// Define the calendar containers.
	var container = {
		WORKSHOPS  : {object: jQuery('ul#gcal_workshops li')},
		TOURS      : {object: jQuery('ul#gcal_tours li')},
		SOCIALS    : {object: jQuery('ul#gcal_socials li')},
		SPEAKERS   : {object: jQuery('ul#gcal_speakers li')},
		ACTIVITIES : {object: jQuery('ul#gcal_activities li')},
		CPP        : {object: jQuery('ul#gcal_cpp li')}
	};

	// Define the public API key.
	var apiKey = 'AIzaSyDvZ3SJpUg6IMFaAIAZ_RNrJnuSFABkfjw';

	// Define today's date & time to only check for future events in Google Calendar.
	// YYYY-MM-DDThh:mm:ss-08:00 where 08:00 is Pacific Time Zone (GMT -8:00)
	var today = new Date();
	var todayFormatted = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate() + 
		'T' + today.getHours() + ':' + today.getMinutes() + ':' + today.getSeconds() + '-08:00'; 

	// Define the JSON feed URL of the calendar sorted by future events only.
	var calendarUrl = 'https://www.googleapis.com/calendar/v3/calendars/' + calendarId 
		+ '/events?fields=items(end%2ChtmlLink%2Clocation%2CoriginalStartTime%2Cstart%2Csummary%2Cdescription)'
		+ '&orderBy=startTime&singleEvents=true&timeMin=' + todayFormatted 
		+ '&key=' + apiKey;

	// Process the Google Calendar feed.
	processFeed(feedCallback);

	//=========================================================================
	//    FUNCTIONS
	//=========================================================================

	// Processes the actual JSON feed for Google Calendar.
	function processFeed(callback) {
		$.ajax({
			url: calendarUrl,
			success: callback
		});
	}

	// Processes the JSON feed data.
	function feedCallback(data) {
		// If there are no events, then hide the loading animations and display
		// the no events message.
		if (data['items'] == '') {
			// Hide the loading animations.
			container.WORKSHOPS.object.first().hide();
			container.TOURS.object.first().hide();
			container.SOCIALS.object.first().hide();
			container.SPEAKERS.object.first().hide();
			container.ACTIVITIES.object.first().hide();
			container.CPP.object.first().hide();

			// Display the no events messages.
			container.WORKSHOPS.object.last().before(
				'<h3>There are no upcoming workshops. Please stay tuned for any future announcements.'
			);
			container.TOURS.object.last().before(
				'<h3>There are no upcoming tours. Please stay tuned for any future announcements.'
			);
			container.SOCIALS.object.last().before(
				'<h3>There are no upcoming socials. Please stay tuned for any future announcements.'
			);
			container.SPEAKERS.object.last().before(
				'<h3>There are no upcoming guest speakers. Please stay tuned for any future announcements.'
			);
			container.ACTIVITIES.object.last().before(
				'<h3>There are no upcoming activities. Please stay tuned for any future announcements.'
			);
			container.CPP.object.last().before(
				'<h3>There are no upcoming Cal Poly Pomona events. Please stay tuned for any future announcements.'
			);
		}

		// Otherwise, process each event.
		else {
			// Store the data for workshops, tours, socials, guest speakers, activities,
			// and CPP events.
			var workshops  = '',
				tours      = '',
				socials    = '',
				speakers   = '',
				activities = '',
				cpp        = '';

			// Cycle through each item.
		    for (i in data['items']) {
				// Get the current item.
		        var item = data['items'][i];

		        // Get the item's tag.
		        var tag = item.description;

		        // Skip the current iteration if there is no tag.
		        if (tag == '') {
		        	continue;
		        }

		        // Retrieve the event URL & define the full event header.
		        var eventUrl = jQuery.trim(item.htmlLink);
		        var eventHeader = '<a href="' + eventUrl + '" target="_blank">' + item.summary + '</a>';

		        // Store the raw start and end times of the date.
		        var rawDate_start, rawDate_end;

		        // Track if the event is all-day or not.
		        var isAllDay = false;

		        // If the event is all day, then retrieve the "date" objects
		        // and set the tracker variable to true.
		        if (checkAllDay(item.start)) {
		        	rawDate_start = new Date(item.start.date);
		        	rawDate_end = new Date(item.end.date);
		        	isAllDay = true;
		        }

		        // Otherwise, retrieve the "dateTime" objects.
		        else {
			        rawDate_start = new Date(item.start.dateTime);
			        rawDate_end = new Date(item.end.dateTime);
			    }

			    // Store the date and time.
			    var date, time;

			    // Track if the event has a date range.
			    var dateRange = true;

			    // If the event is all day, then check if it's a single day or
			    // multiple days.
			    if (isAllDay) {
			    	// If the event is a single day event, then the start & end
			    	// dates are listed only 1 day apart. However, we must also 
			    	// check for specific cases, such as the end of the month 
			    	// or the new year. 
			    	// If it is leap year and the start month is February, then check for 29 to 1,
		    		// or if it is not leap year and the start month is February, then check for 28 to 1,
		    		// or if it is a 31-day month, then check for 31 to 1,
		    		// or if it is a 30-day month, then check for 30 to 1,
		    		// or if it is December 31, then check for January 1.
			    	if ((rawDate_start.getDate() == rawDate_end.getDate() - 1)
			    		|| (isLeapYear && (rawDate_start.getMonth() == 1) && (rawDate_start.getDate() == 29) && (rawDate_end.getMonth() == 2) && (rawDate_end.getDate() == 1))
			    		|| (!isLeapYear && (rawDate_start.getMonth() == 1) && (rawDate_start.getDate() == 28) && (rawDate_end.getMonth() == 2) && (rawDate_end.getDate() == 1))
			    		|| (has31Days(rawDate_start.getMonth()) && (rawDate_start.getDate() == 31) && (rawDate_end.getMonth() == (rawDate_start.getMonth() + 1)) && (rawDate_end.getDate() == 1))
			    		|| (!has31Days(rawDate_start.getMonth()) && (rawDate_start.getDate() == 30) && (rawDate_end.getMonth() == (rawDate_start.getMonth() + 1)) && (rawDate_end.getDate == 1))
			    		|| ((rawDate_start.getMonth() == 11) && (rawDate_start.getDate() == 31) && (rawDate_end.getMonth() == 0) && (rawDate_end.getDate() == 1))) {
			    		dateRange = false;
			    	}

			    	// If there is a date range, then assign the date range of
			    	// the all day event. For an all day event, the start date
			    	// is listed as the previous date.
			    	if (dateRange) {
			    		date = dayToString(rawDate_start.getDay() + 1) + ', ' 
			    			+ monthToString(rawDate_start.getMonth()) + ' ' 
			    			+ (rawDate_start.getDate() + 1) + ', ' 
			    			+ rawDate_start.getFullYear() 
			    			+ ' to ' 
			    			+ dayToString(rawDate_end.getDay()) + ', ' 
			    			+ monthToString(rawDate_end.getMonth()) + ' ' 
			    			+ rawDate_end.getDate() + ', ' 
			    			+ rawDate_end.getFullYear();
			    	}

			    	// Otherwise, assign the start date.
			    	else {
			    		date = dayToString(rawDate_end.getDay()) + ', ' 
			    			+ monthToString(rawDate_end.getMonth()) + ' ' 
			    			+ rawDate_end.getDate() + ', ' 
			    			+ rawDate_end.getFullYear();
			    	}

			    	// Specify the time as "All Day".
			    	time = 'All Day';
			    }

			    // Otherwise, list the current date.
			    else {
			    	// Get the current date.
			    	date = dayToString(rawDate_start.getDay()) + ", " 
			    		+ monthToString(rawDate_start.getMonth()) + " " 
			    		+ rawDate_start.getDate() + ", " 
			    		+ rawDate_start.getFullYear();

			    	// Get the start and end hours.
					var hour_start = rawDate_start.getHours();
					var hour_start_ampm = 'AM';
					var hour_end = rawDate_end.getHours();
					var hour_end_ampm = 'AM';

					// If the start hour is greater than or equal to 12, then
					// change the AMPM tag to "PM" and convert it to 12-hour 
					// time format.
					if (hour_start >= 12) {
						hour_start_ampm = 'PM';

						// If the start hour is greater than 12, then deduct 12.
						if (hour_start > 12) {
							hour_start -= 12;
						}
					}

					// Else if the start hour is 0, then set it to 12.
					else if (hour_start == 0) {
						hour_start = 12;
					}

					// If the end hour is greater than or equal to 12, then
					// change the AMPM tag to "PM" and convert it to 12-hour
					// time format.
					if (hour_end >= 12) {
						hour_end_ampm = 'PM';

						// If the end hour is greater than 12, then deduct 12.
						if (hour_end > 12) {
							hour_end -= 12;
						}
					}

					// Else if the end hour is 0, then set it to 12.
					else if (hour_end == 0) {
						hour_end = 12;
					}

					// Pad the minutes with zeros if they are less than 2 digits.
					var min_start = lpad(rawDate_start.getMinutes(), '0', 2);
					var min_end = lpad(rawDate_end.getMinutes(), '0', 2);

					// Put together all the time formats.
					time = hour_start + ':' + min_start + ' ' + hour_start_ampm 
						+ ' - ' 
						+ hour_end + ':' + min_end + ' ' + hour_end_ampm;
				}

				// Get the event location and define the Google Maps URL.
				var location = item.location;
				var mapsUrl = 'http://maps.google.com/maps?q=' + location;

				// Create the location URL.
				var locationUrl;

				// If the location is null, then set the location URL to "Unavailable".
				if (location == null) {
					locationUrl = 'Unavailable';
				}

				// Otherwise, define the location URL.
				else
				{
					locationUrl = '<a href="' + mapsUrl + '" target="_blank">' + location + '</a>';
				}

		        // Store the event information for the particular tag.
		        var eventInfo = '<hr>'
					+ '<b>Event:</b> ' + eventHeader + '<br>'
					+ '<b>Date:</b> ' + date + '<br>' 
					+ '<b>Time:</b> ' + time + '<br>' 
					+ '<b>Location:</b> ' +  locationUrl + '<br><br>'
					+ '<ul>'
					+ '<li><a href="' + eventUrl + '" target="_blank"><img src="../img/ic_calendar.png" alt="[Add to Google Calendar]" title="Add to Google Calendar"></a></li>'
					+ '<li><a href="' + mapsUrl + '" target="_blank"><img src="../img/ic_map.png" alt="[View in Google Maps]" title="View in Google Maps"></a></li>'
					+ '</ul>';

				switch(tag) {
					case 'Workshops':
						workshops += eventInfo;
						break;

					case 'Tours':
						tours += eventInfo;
						break;

					case 'Socials':
						socials += eventInfo;
						break;

					case 'Speakers':
						speakers += eventInfo;
						break;

					case 'Activities':
					case 'Meetings':
						activities += eventInfo;
						break;

					case 'CPP':
						cpp += eventInfo;
						break;
				}
		    }

		    // Hide the loading animations.
			container.WORKSHOPS.object.first().hide();
			container.TOURS.object.first().hide();
			container.SOCIALS.object.first().hide();
			container.SPEAKERS.object.first().hide();
			container.ACTIVITIES.object.first().hide();
			container.CPP.object.first().hide();

			if (workshops == '') {
				container.WORKSHOPS.object.last().before(getNoEventsMessage('workshops'));
			}

			else {
				container.WORKSHOPS.object.last().before(workshops);
			}

			if (tours == '') {
				container.TOURS.object.last().before(getNoEventsMessage('tours'));
			}

			else {
				container.TOURS.object.last().before(tours);
			}

			if (socials == '') {
				container.SOCIALS.object.last().before(getNoEventsMessage('socials'));
			}

			else {
				container.SOCIALS.object.last().before(socials);
			}

			if (speakers == '') {
				container.SPEAKERS.object.last().before(getNoEventsMessage('guest speakers'));
			}

			else {
				container.SPEAKERS.object.last().before(workshops);
			}

			if (activities == '') {
				container.ACTIVITIES.object.last().before(getNoEventsMessage('activities'));
			}

			else {
				container.ACTIVITIES.object.last().before(workshops);
			}

			if (cpp == '') {
				container.CPP.object.last().before(getNoEventsMessage('Cal Poly Pomona events'));
			}

			else {
				container.CPP.object.last().before(cpp);
			}
		}
	}

	// Generates the default no events message with the specified category.
	function getNoEventsMessage(category) {
		return '<hr><h3>There are no upcoming ' + category 
			+ '. Please stay tuned for any future announcements.</h3>';
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

	// Checks if the year is a leap year.
	function isLeapYear(year) {
		// If the year is evenly divisible by 4, then continue.
		if (year % 4 == 0) {
			// If the year is not evenly divisible by 400 but is evenly
			// divisible by 100, then return false.
			if ((year % 400 != 0) && (year % 100 == 0)) {
				return false;
			}

			// Otherwise, return true.
			else {
				return true;
			}
		}

		// Otherwise, return false.
		else {
			return false;
		}
	}

	// Checks if the month has 31 days.
	function has31Days(month) {
		// If the month is January, March, May, July, August, October, or
		// December, then return true.
		if (month == 0 || month == 2 || month == 4 || month == 6 
			|| month == 7 || month == 9 || month == 11) {
			return true;
		}

		// Otherwise, return false.
		else {
			return false;
		}
	}

	// Checks for the date or dateTime property of the start/end objects.
	function checkAllDay(dateObject) {
		// Store the properties of the start/end objects.
		var properties = '';

		// Store the property if it is found.
		for (property in dateObject) {
			properties = property;
		}

		// If the property is "date", then return true.
		if (properties == "date") {
			return true;
		}

		// Otherwise, return false.
		else {
			return false;
		}
	}
});