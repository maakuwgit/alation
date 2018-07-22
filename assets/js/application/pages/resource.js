( function( $ ) {
  $(function(){
		var target = document.querySelector( '.wpcf7' ), 
				is_valid = sessionStorage.getItem('resources_available'),
				div = $('[data-form-href]'),
				href = div.attr('data-form-href'),
				submit_txt = $(target).find('input[type="submit"]');

		function showValid(event) {
			$(target).append('<a href="'+href+'" class="button">'+submit_txt.val()+'</a>');
		}
		
		function showForm(event) {
			$(target).find('form').css('display','block');
		}
		
		submit_txt.val($(target).parent().attr('data-btn-label'));
		
		if ( is_valid ) {
			showValid();
		}else{
			showForm();
		}
		
		if ( target && !is_valid ) {
			target.addEventListener( 'wpcf7submit', function( event ) {
						
				sessionStorage.setItem('resources_available', 'validated');
				$(target).find('form').removeAttr('style');
				showValid(false);
//				window.location.assign(href);
}, false );
		}
		
    
  });
})( jQuery);