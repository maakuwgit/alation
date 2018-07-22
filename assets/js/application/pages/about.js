( function( $ ) {
	var hash = window.location.hash;
	if( hash ) { 
	  var waitForIt = setTimeout(function(){
		  var speed = Math.floor($(document).innerHeight() / 2.5);
		  var scrollto = $(hash).offset().top - $('#masthead').height();
			$('html, body').stop().animate({scrollTop: scrollto }, speed, 'easeInOutQuint');
		}, 2500);
	}
})( jQuery);