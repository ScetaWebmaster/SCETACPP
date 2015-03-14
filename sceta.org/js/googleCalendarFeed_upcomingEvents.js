jQuery(document).ready(function() {
	// Define the calendar ID.
	var parameters = JSON.parse(jQuery('#gCalFeed').html());
	var calendarId = parameters['ID'];

	// Define the public API key.
	var apiKey = 'AIzaSyDvZ3SJpUg6IMFaAIAZ_RNrJnuSFABkfjw';

	// Define today's date & time to only check for future events in Google Calendar.
	var today = new Date();
	var todayFormatted = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate() + 
		'T' + today.getHours() + ':' + today.getMinutes() + ':' + today.getSeconds() + '-08:00'; // YYYY-MM-DDThh:mm:ss-08:00 where 08:00 is Pacific Time Zone

	// Define the JSON feed URL of the calendar sorted by future events only.
	var url = 'https://www.googleapis.com/calendar/v3/calendars/' + calendarId + '/events?fields=items(end%2ChtmlLink%2Clocation%2CoriginalStartTime%2Cstart%2Csummary)&orderBy=startTime&singleEvents=true&timeMin='
		+ todayFormatted + '&key=' + apiKey;

	// Pad single digits to two digits with 0s if needed.
	function lpad(str, pad_string, length) {
		var str = new String(str);
		while (str.length < length)
			str = pad_string + str;
		return str;
	};

	// Convert the day integer to its string value.
	function dayToString(day) {
		var days = ["Sun.", "Mon.", "Tues.", "Wed.", "Thurs.", "Fri.", "Sat."];
		return days[day];
	};

	// Convert the month integer to its string value. Keep note that months are listed starting from 0 - 11.
	function monthToString(month) {
		var months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.", "Jul.", "Aug.", "Sept.", "Oct.", "Nov.", "Dec."];
		return months[month];
	};

	// Check if the year is a leap year.
	function isLeapYear(year) {
		// A leap year must be evenly divisible by 4.
		if (year % 4 == 0) {
			// If the year is not evenly divisible by 400 but is evenly divisible by 100, it is not a leap year.
			if ((year % 400 != 0) && (year % 100 == 0)) {
				return false;
			}

			// Otherwise, the year is a leap year.
			else {
				return true;
			}
		}

		else {
			return false;
		}
	};

	// Check if the month has 31 days.
	function has31Days(month) {
		// If January, March, May, July, August, October, or December, the month has 31 days.
		if (month == 0 || month == 2 || month == 4 || month == 6 || month == 7 || month == 9 || month == 11) {
			return true;
		}

		// Otherwise, it is assumed to have 30 days. (February is individually checked on its own.)
		else {
			return false;
		}
	};

	// Check for the date or dateTime property of the start/end objects.
	function checkAllDay(dateObject) {
		var properties = '';

		// Check for the latest property in the object. In general, we are looking for date or dateTime.
		for (property in dateObject) {
			properties = property;
		}

		if (properties == "date") {
			return true;
		}

		else {
			return false;
		}
	};

	// Process the feed data.
	function processFeed(data) {
		if (data['items'] == '') {
			jQuery("#upcomingEvents li").first().hide();
			jQuery("#upcomingEvents li").last().before(
				"There are no upcoming " + parameters['noneMessage'] + ". Please stay tuned for any future announcements.<br><br>"
			);
		}

		else {
		    for (i in data['items']) {
		    	// If there is at least 1 event, then hide the loading animation.
				if (i == 0) {
					jQuery("#upcomingEvents li").first().hide();
				};

				// Temporarily store the current feed item to an "item" object for simpler code.
		        var item = data['items'][i];

		        // Retrieve the event name & event link.
		        var eventHeader = item.summary;
		        var eventUrl = jQuery.trim(item.htmlLink);

		        // Ensure the event link exists and use it as the header.
		        if (eventUrl.length > 0) {
		        	eventHeader = "<a href='" + eventUrl + "' target='_blank'>" + eventHeader + "</a>";
		        };

		        var rawDate_start = '';
		        var rawDate_end = '';
		        var isAllDay = false; // Use this to track if the event is all-day or not.

		        // Check if the event is an all-day event. If so, the variable is slightly different.
		        if (checkAllDay(item.start)) {
		        	rawDate_start = new Date(item.start.date);
		        	rawDate_end = new Date(item.end.date);
		        	isAllDay = true;
		        }

		        // Otherwise, gather the start & end time from the normal variables.
		        else {
			        rawDate_start = new Date(item.start.dateTime);
			        rawDate_end = new Date(item.end.dateTime);
			    }

			    var date = '';
			    var time = '';
			    var dateRange = true; // Use this to track if the event is a single date or has a date range.

			    // If the event is all day, check if it's a single day or multiple days.
			    if (isAllDay) {
			    	// If the event is a single day event, then the start & end dates are listed only 1 day apart.
			    	// However, we must also check for specific cases, such as the end of the month or the new year.
			    	// If it is leap year and the start month is February, check for 29 to 1,
		    		// or if it is not leap year and the start month is February, check for 28 to 1,
		    		// or if it is a 31-day month, check for 31 to 1,
		    		// or if it is a 30-day month, check for 30 to 1,
		    		// or if it is December 31st, check for January 1st.
			    	if ((rawDate_start.getDate() == rawDate_end.getDate() - 1)
			    		|| (isLeapYear && rawDate_start.getMonth() == 1 && rawDate_start.getDate() == 29 && rawDate_end.getMonth() == 2 && rawDate_end.getDate() == 1)
			    		|| (!isLeapYear && rawDate_start.getMonth() == 1 && rawDate_start.getDate() == 28 && rawDate_end.getMonth() == 2 && rawDate_end.getDate() == 1)
			    		|| (has31Days(rawDate_start.getMonth()) && rawDate_start.getDate() == 31 && rawDate_end.getMonth() == (rawDate_start.getMonth() + 1) && rawDate_end.getDate() == 1)
			    		|| (!has31Days(rawDate_start.getMonth()) && rawDate_start.getDate() == 30 && rawDate_end.getMonth() == (rawDate_start.getMonth() + 1) && rawDate_end.getDate == 1)
			    		|| (rawDate_start.getMonth() == 11 && rawDate_start.getDate() == 31 && rawDate_end.getMonth() == 0 && rawDate_end.getDate() == 1)) {
			    		dateRange = false;
			    	}

			    	// If there is a date range, then assign the date range of the all day event.
			    	// For an all day event with a date range, the start date is 1 day behind.
			    	if (dateRange) {
			    		date = dayToString(rawDate_start.getDay() + 1) + ", " + monthToString(rawDate_start.getMonth()) + " " + (rawDate_start.getDate() + 1) + ", " + rawDate_start.getFullYear() + " to " +
			    			dayToString(rawDate_end.getDay()) + ", " + monthToString(rawDate_end.getMonth()) + " " + rawDate_end.getDate() + ", " + rawDate_end.getFullYear();
			    	}

			    	// If there is no date range, then assign the start date.
			    	else {
			    		date = dayToString(rawDate_end.getDay()) + ", " + monthToString(rawDate_end.getMonth()) + " " + rawDate_end.getDate() + ", " + rawDate_end.getFullYear();
			    	}

			    	// Specify the time as "All Day".
			    	time = 'All Day';
			    }

			    // Otherwise, the event is not all day and will default to listing the current date.
			    else {
			    	date = dayToString(rawDate_start.getDay()) + ", " + monthToString(rawDate_start.getMonth()) + " " + rawDate_start.getDate() + ", " + rawDate_start.getFullYear();
					var hour_start = rawDate_start.getHours();
					var hour_start_ampm = 'AM';
					var hour_end = rawDate_end.getHours();
					var hour_end_ampm = 'AM';

					// Convert to 12-hour time format and change the AMPM tag to "PM".
					if (hour_start >= 12) {
						hour_start_ampm = 'PM';

						// Only deduct 12 if it's greater the hour is greater than 12.
						if (hour_start > 12) {
							hour_start = hour_start - 12;
						}
					};

					if (hour_end >= 12) {
						hour_end_ampm = 'PM';

						if (hour_end > 12) {
							hour_end = hour_end - 12;
						}
					};

					// Pad the minutes with 0s if it's less than 2 digits.
					var min_start = lpad(rawDate_start.getMinutes(), '0', 2);
					var min_end = lpad(rawDate_end.getMinutes(), '0', 2);

					// Put together all the time formats.
					time = hour_start + ':' + min_start + ' ' + hour_start_ampm + ' - ' + hour_end + ':' + min_end + ' ' + hour_end_ampm;
				};

				// Gather the location.
				var where = item.location;

				if (where == null) {
					where = 'Unavailable';
				}

				else {
					where = where + " (<a href='http://maps.google.com/maps?q=" + where + "' target='_blank'>map</a>)";
				};

		        // Render the event.
				jQuery("#upcomingEvents li").last().before(
					eventHeader + "<br>" +
					"<b>Date:</b> " + date + "<br>" +
					"<b>Time:</b> " + time + "<br>" +
					"<b>Location:</b> " +  where + "<br><br>"
				);
		    }
		}
	};

	$.getJSON(url, function(data) {
		processFeed(data)
    });
});