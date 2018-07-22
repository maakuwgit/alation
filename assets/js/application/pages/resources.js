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
var $resourcesBand = $('.band-resources');
var $resourcesFilterBar = $('.filters', $resourcesBand);
var $resourcesGrid = $('.items', $resourcesBand);
var resourceClasses = { industries: [], uses: [], sizes: [] };

// Build Isotope grid
$resourcesGridIso = $('.items', $resourcesBand).isotope({
  itemSelector: '.item',
  layoutMode: 'fitRows',
  percentPosition: true
});

// filter items on button click
$resourcesFilterBar.on( 'click', '.filter-action', function( e ) {
	var filterValue = $(this).attr('data-filter');
	e.preventDefault();

	if( filterValue ){
		if( filterValue === "*" ){
			$resourcesBand.removeClass("filtered");
		} else {
			$resourcesBand.addClass("filtered");
		}
		$resourcesGridIso.isotope({ filter: filterValue });
	}
});
