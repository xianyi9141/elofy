
jQuery(document).ready(function(){

	jQuery(function() {
	    jQuery('#Grid').mixitup();
	});
	
    // hide #back-top first
    jQuery("#back-top").hide();
    
    jQuery('.hover').bind('touchstart', function(e) {
        e.preventDefault();
        jQuery(this).toggleClass('cs-hover');
    });
    
    // fade in #back-top
    jQuery(function () {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 100) {
                jQuery('#back-top').fadeIn();
            } else {
                jQuery('#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        jQuery('#back-top a').click(function () {
            jQuery('body,html').animate({
                scrollTop: 0
            }, 500);
            return false;
        });
    });

	

	jQuery(document).on('click','a.smooth', function(e){
	    e.preventDefault();
	    var jQuerylink = jQuery(this);
	    var anchor = jQuerylink.attr('href');
	    jQuery('html, body').stop().animate({
	        scrollTop: jQuery(anchor).offset().top
	    }, 1000);
	});
	
});


