/* 
 * Gallery Toggle
 */

$(document).ready(function() {
	var gallery_2005 = $('ul.gallery_2005');
	var gallery_2006 = $('ul.gallery_2006');
	var gallery_2009 = $('ul.gallery_2009');
	var gallery_2010 = $('ul.gallery_2010');
	var gallery_2011 = $('ul.gallery_2011');
	var gallery_2012 = $('ul.gallery_2012');
	var gallery_2013 = $('ul.gallery_2013');
	var gallery_2014 = $('ul.gallery_2014');

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
		gallery_2009.hide('Blind');
		gallery_2010.hide('Blind');
		gallery_2011.hide('Blind');
		gallery_2012.hide('Blind');
		gallery_2013.hide('Blind');
		gallery_2014.hide('Blind');
	});
});
