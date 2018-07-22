/***********************************
	Videos slides
***********************************/
$('.band-videos .band-slides').slick({
	infinite: true,
	slidesToShow: 3,
	slidesToScroll: 3,
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

$('.band-videos .band-slides a.modal-video').magnificPopup({
  disableOn: 700,
  type: 'iframe',
  mainClass: 'mfp-fade',
  removalDelay: 160,
  preloader: false,
  fixedContentPos: false
});

/***********************************
	Customer Grid
***********************************/
var $customersBand = $('.band-customers');
var $customersFilterBar = $('.filters', $customersBand);
var $customersGrid = $('.items', $customersBand);
var customerClasses = { industries: [], uses: [], sizes: [] };

// Build Isotope grid
$customersGridIso = $('.items', $customersBand).isotope({
  itemSelector: '.item',
  layoutMode: 'fitRows',
  percentPosition: true
});

// filter items on button click
$customersFilterBar.on( 'click', '.filter-action', function( e ) {
	var filterValue = $(this).attr('data-filter');
	e.preventDefault();

	if( filterValue ){
		if( filterValue === "*" ){
			$customersBand.removeClass("filtered");
		} else {
			$customersBand.addClass("filtered");
		}

		$customersGridIso.isotope({ filter: filterValue });
	}
});
