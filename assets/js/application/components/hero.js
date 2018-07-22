// Catch the down arrow and make it scroll
$(".band.band-hero").on("click", "a.proceed", function(e){
	var $this = $(this),
		topOffset = $("#masthead").outerHeight(),
		scrollTarget = document.querySelector("#content-top");

	console.log($this, topOffset, scrollTarget);
	// Stop the link
	e.preventDefault();

	// Smooth scroll down
	smoothScroll.animateScroll( scrollTarget, $this[0], {
		speed: 750,
		easing: 'easeInOutCubic',
		offset: topOffset
	});
});
