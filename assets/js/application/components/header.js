(function($) {
	var is_opened = false,
			vw = window.innerWidth,
			sub_toggle = $('.menu-item-has-children');
			
	function toggleSubnav(event){
		$(this).toggleClass('sub-active').find('> a').next('.sub-menu').toggleClass('active');
	}
	
	function toggleOpened(event){
		vw = window.innerWidth;
		if(vw < 1024 && is_opened ){
			$('body').addClass('mk-opened-nav');
		}else{
			$('body').removeClass('mk-opened-nav');
		}
	}
	function toggleMenu(event){
		$('body').toggleClass('mk-opened-nav');
		if($('body').hasClass('mk-opened-nav')){
			is_opened = true;
		}else{
			is_opened = false;
		}
	}
	
	sub_toggle.on('click.toggleSubnav', toggleSubnav);
	
	$('[data-menu-toggle]').on('click.toggleMenu', toggleMenu);
	$(window).on('resize.toggleOpened', toggleOpened);
	
})(jQuery);
