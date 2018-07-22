/***********************************
	Videos
***********************************/
$('.band-features .item-content').matchHeight();
/* $('.band-features .vidlink').magnificPopup({
  disableOn: 700,
  type: 'iframe',
  mainClass: 'mfp-fade',
  removalDelay: 160,
  preloader: false,
  fixedContentPos: false
}); */


/***********************************
	Feature Slides
***********************************/
$('.band-source .slides-screenshots').slick({
	infinite: true,
	dots: false,
	arrows: false,
	fade: true,
	asNavFor: '.slides-descriptions'
});

$('.band-source .slides-descriptions').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	asNavFor: '.slides-screenshots',
	fade: true,
	arrows: false,
	dots: true
});





/***********************************
	Tabs
***********************************/
$tabContainer = $(".band-howcatalog .band-tabcontainer");
$tabNav = $(".band-tab-nav", $tabContainer);
$tabTabs = $(".band-tabs", $tabContainer);

$tabNav.on("click", "a", function(e){
	$this = $(this);
	$target = $($this.attr("href"));

	if( $target && $target.length ){
		$(".band-tab-active", $tabTabs).removeClass("band-tab-active");
		$(".active", $tabNav).removeClass("active");

		$this.addClass("active");
		$target.addClass("band-tab-active");
	}

	e.preventDefault();
});

$tabTabs.on("click", "a.nav-accordian", function(e){
	$this = $(this);
	$target = $($this.attr("href"));
	$parent = $this.parents(".band-tab");

	if( $target && $target.length ){
		if( $parent.attr("id") === $target.attr("id") && $parent.hasClass("band-tab-active") ){
			$parent.removeClass("band-tab-active");
			smoothScroll.animateScroll( $parent[0] );
		} else {
			$(".band-tab-active", $tabTabs).removeClass("band-tab-active");
			$target.addClass("band-tab-active");
			smoothScroll.animateScroll( $target[0] );
		}
	}

	e.preventDefault();
});

// Activate the first tab
$("a:first", $tabNav).click();
