$(document).ready(function() {
	//=========================================================================
	//    SCRIPT EXECUTION
	//=========================================================================

	// Define the single calendar ID.
	var calendarId = 'scetacpp@gmail.com';

	// Define the calendar containers.
	var container = jQuery('div#gcal_nextMeeting');

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
		// Store the next meeting data.
		var meeting = '';

		// Cycle through each item.
	    for (i in data['items']) {
			// Get the current item.
	        var item = data['items'][i];

	        // Get the item's tag.
	        var tag = item.description;

	        // Skip the current iteration if there is no tag.
	        if (tag != 'Meeting') {
	        	continue;
	        }

	        // Retrieve the event URL & define the full event header.
	        var eventUrl = jQuery.trim(item.htmlLink);
	        var eventHeader = '<b><u>' + item.summary + '</b></u>';

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

			// Get the event location.
			var location = item.location;

			// If the location is null, then set it to "Unavailable".
			if (location == null) {
				location = 'Unavailable';
			}

	        // Store the meeting information.
	        meeting += '<div>'
	        	+ eventHeader + '<br>'
	        	+ date + '<br>'
	        	+ time + '<br>'
	        	+ location
	        	+ '</div>';

	        // Exit the for loop because we only want the 1st upcoming meeting.
	        break;
	    }

	    // Hide the loading animation.
		container.first().hide();

		// If the meeting information is still empty, then display the no
		// events message.
		if (meeting == '') {
			container.last().before('There is no upcoming meeting.');
		}

		// Otherwise, display the meeting information.
		else {
			container.last().before(meeting);
		}
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