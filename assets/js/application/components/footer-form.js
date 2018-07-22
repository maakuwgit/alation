// Catch the down arrow and make it scroll
$form = $(".band-form.form-demo");

if( $form.length ){

	// Handle Labels
	$form.on("focus", "input", function( e ){

	});

	// Stylize Dropdown
	$("select", $form).each(function(){
		var select_el = new Select({
		  el: $(this)[0]
		});
	});
}


/* .on("click", "a.proceed", function(e){
	var $this = $(this),
		topOffset = $("#mk-header").data("height"),
		scrollTarget = document.querySelector("#content-top");

	// Stop the link
	e.preventDefault();

	// Smooth scroll down
	smoothScroll.animateScroll( scrollTarget, $this[0], {
		speed: 750,
		easing: 'easeInOutCubic',
		offset: topOffset
	});
}); */
