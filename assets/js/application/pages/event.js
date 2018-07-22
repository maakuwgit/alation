( function( $ ) {
  $(function(){
		var target = document.querySelector( '.wpcf7' ), 
				is_valid = sessionStorage.getItem('attendee'),
				div = $('[data-form-href]'),
				href = div.attr('data-form-href'),
				submit_txt = $(target).find('input[type="submit"]').val();
 
		function showValid(event) {
			$(target).find('form').css('display','none');
			$(target).append('<p>Thank you! We will reply back soon.</p>');
		}
		
		function showForm(event) {
			$(target).find('form').css('display','block');
		}
		
		if ( is_valid ) {
			showValid();
		}else{
			showForm();
		}
		
		if ( target && !is_valid ) {
			target.addEventListener( 'wpcf7submit', function( event ) {
						
				sessionStorage.setItem('attendee', 'registered');

}, false );
		}
    
  });
})( jQuery);