/***********************************
	Slides
***********************************/
$('.band-largeslides .slides').slick({
	infinite: true,
	slidesToShow: 1,
	dots: true,
	arrows: false
});


/***********************************
	Tabs
***********************************/
$tabContainer = $(".band-tabsection .band-tabcontainer");
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

// Activate the first tab
$("a:first", $tabNav).click();
