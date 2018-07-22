/***********************************
	Hero Slides
***********************************/
var $headlineType = $('.band-hero .headline .type');
var $dataSlides = $('.band-hero .dataslides .dataslide');
var $bgSlideContainer = $('.band-hero .bgslides');
var $subtitleSlideContainer = $('.band-hero .subtitles');
var slideObjects = {};
var slideKeywords = [];

// Match container height for dataSlides
//$('.band-hero .dataslides, .band-hero .dataslides .dataslide').matchHeight();

// Loop through slides
$dataSlides.each(function(){
	var $this = $(this);

	// Grab keyword to be typed
	var keyword = $this.data("keyword");

	// Create the background image
	$bg = $('<img />', { src: $this.data("bg") });
	$bg.appendTo( $bgSlideContainer );

	// Create the subtitle
	$subtitle = $('<div>', { class: "subtitle" }).text( $this.data("subtitle") );
	$subtitle.appendTo( $subtitleSlideContainer );

	// Create object for reference later
	slideObjects[keyword] = {
		'element': $this,
		'background': $bg,
		'subtitle': $subtitle
	};

	// Add to keyword array
	slideKeywords.push(keyword);
});

// Function to grab a slide object by index
function get_slide( idx ){
	return slideObjects[ slideKeywords[idx] ];
}

// Function to grab the next slide, loops when reaching the end
function next_slide( current_idx ){
	// Is this the last slide?
	if( current_idx >= ( slideKeywords.length - 1 ) ){
		return get_slide( 0 );
	} else {
		return get_slide( current_idx + 1 );
	}
}

// Set up the first slide
var $first_slide = next_slide(-1);
$first_slide.background.addClass("slide-active");
$first_slide.subtitle.addClass("slide-active");

// Initialize Type.js
$headlineType.typed({
	strings: slideKeywords,
	typeSpeed: 50, // typing speed
	startDelay: 0, // time before typing starts
	backSpeed: 0, // backspacing speed
	backDelay: 7000, // time before backspacing
	loop: true, // loop

    // starting callback function before each string
    preStringTyped: function( idx ) {
    	var $current_slide = get_slide(idx);
    },

    // Called when typing is complete
    onStringTyped: function( idx ) {
    	var $current_slide = get_slide(idx);
    	var $next_slide = next_slide(idx);
    	var backDelay = this.backDelay;
    	var transitionLength = 300;
    	var transitionDelay = backDelay - transitionLength;

    	// Wait for just before next cycle starts
    	setTimeout(function(){
    		// Fade out current slide info
			// Cross-fade background images
			$current_slide.background.removeClass("slide-active");
			$current_slide.subtitle.removeClass("slide-active");

			$next_slide.background.addClass("slide-active");
			$next_slide.subtitle.addClass("slide-active");
    	}, transitionDelay);
    }
});



/***********************************
	Feature Slides
***********************************/
$('.band-features .features .feature-imgs').slick({
	infinite: true,
	slidesToShow: 3,
	dots: false,
	arrows: false,
	centerMode: true,
	centerPadding: '60px',
	asNavFor: '.feature-data',
	responsive: [{
      breakpoint: 760,
      settings: {
        slidesToShow: 1
      }
    }]
});

$('.band-features .features .feature-data').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	asNavFor: '.feature-imgs',
	fade: true,
	arrows: true
});



/***********************************
	Recognition slides
***********************************/
// Match all their heights
$('.band-recognition .band-slides .band-slide').matchHeight();

// Create slide
$('.band-recognition .band-slides').slick({
	infinite: true,
	slidesToShow: 2,
	slidesToScroll: 2,
	dots: true,
	arrows: false,
	responsive: [{
      breakpoint: 760,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
});



/***********************************
	Video Pop Up link
***********************************/
$('.band-video').magnificPopup({
  disableOn: 700,
  type: 'iframe',
  mainClass: 'mfp-fade',
  removalDelay: 160,
  preloader: false,
  fixedContentPos: false
});
