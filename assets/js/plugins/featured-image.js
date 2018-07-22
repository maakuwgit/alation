( function( $ ) {
	var vw,vh;
	var breakpoint = {};
	
		breakpoint.xsmall = 320;
		breakpoint.small = 640;
		breakpoint.medium = 1024;
		breakpoint.large = 1280;
		breakpoint.xlarge = 1600;
	
	function setSize(){
		vw = $(window).width();
		vh = $(window).height();
	}
	
	function getSize(){
		var size = 'small';
		if(vw >= breakpoint.xlarge){
			size = 'fullsize';
		}else if(vw >= breakpoint.large && vw < breakpoint.xlarge) {
			size = 'large';	
		}else if(vw > breakpoint.small && vw < breakpoint.large) {
			size = 'medium';
		}
		return size;
	}
	
	function refactor(){
		setSize();
		
		var size = getSize();
		
		$('[data-background]').each(function(args){
			var feat	 	= $(this).find('div.feature');
			var target  = feat;
			if(feat.length <= 0){ target = $(this);}
			
			var img 		= $(target).find('img');

			if(img.length > 0) {
				var src = $(img).attr('src');
				
				if($(img).attr('data-src-xlarge') && size === 'fullsize'){ src = $(img).attr('data-src-xlarge');}
				if($(img).attr('data-src-large') && size === 'large'){ src = $(img).attr('data-src-large');}
				if($(img).attr('data-src-medium') && size === 'medium'){ src = $(img).attr('data-src-medium');}
				if($(this).attr('style')){
					$(feat).delay(500).fadeOut(2000);
					$(this).css('background-image', 'url('+src+')');
				}else{
					$(feat).delay(500).fadeOut(2000);
					$(this).css('background-image','url('+src+')');
				}
			}
		});
	}
	
	function init(){
		var size = getSize();
		refactor();
	}
	
	$(document).ready(function(){
		init();
	});

} )( jQuery );