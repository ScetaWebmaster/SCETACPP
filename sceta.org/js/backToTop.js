// Check here for reference: http://codyhouse.co/redirect/?resource=back-to-top
// Giving credit where it's due :).

jQuery(document).ready(function($) {
	// Browser window scroll (in pixels) after which the "back to top" link is shown.
	var offset = 300,
		// Browser window scroll (in pixels) after which the "back to top" link opacity is reduced.
		offset_opacity = 1200,
		// Duration of the top scrolling animation (in ms).
		scroll_top_duration = 700,
		// Grab the "back to top" link.
		$back_to_top = $('.cd-top');

	// Hide or show the "back to top" link.
	$(window).scroll(function() {
		($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible');
	});	
});