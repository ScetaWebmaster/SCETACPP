// Fix vertical when there is no overflow.
// Call fullscreenFix() if .fullscreen content changes.
function fullscreenFix() {
    var h = $('body').height();

    // Set .fullscreen height.
    $(".content-b").each(function(i){
        if ($(this).innerHeight() <= h) {
            $(this).closest(".fullscreen").addClass("not-overflow");
        }
    });
}

$(window).resize(fullscreenFix);
fullscreenFix();

// Resize background images.
function backgroundResize() {
    var windowH = $(window).height();

    $(".background").each(function(i) {
        var path = $(this);

        // Variables
        var contW = path.width();
        var contH = path.height();
        var imgW = path.attr("data-img-width");
        var imgH = path.attr("data-img-height");
        var ratio = imgW / imgH;

        // Overflowing difference.
        var diff = parseFloat(path.attr("data-diff"));
        diff = diff ? diff : 0;

        // Let remaining height have fullscreen image only on parallax.
        var remainingH = 0;

        if (path.hasClass("parallax")) {
            var maxH = contH > windowH ? contH : windowH;
            remainingH = windowH - contH;
        }

        // Set img values depending on content.
        imgH = contH + remainingH + diff;
        imgW = imgH * ratio;

        // Fix when too large.
        if (contW > imgW) {
            imgW = contW;
            imgH = imgW / ratio;
        }

        path.data("resized-imgW", imgW);
        path.data("resized-imgH", imgH);
        path.css("background-size", imgW + "px " + imgH + "px");
    });
}

$(window).resize(backgroundResize);
$(window).focus(backgroundResize);
backgroundResize();