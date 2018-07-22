<?php
	// Check to see if there's a page override, used on Archives
	global $alation_current_page;

	if( is_archive() && $alation_current_page ){
		// Yep, lets use that for our ACF calls
		$page_id = $alation_current_page->ID;
	} else {
		 // Nope, tell ACF to use current page ID
		$page_id = false;
	}

	$show_form = get_field('has_form', $page_id);

	if( $show_form ):
		$title = get_field('footer_demo_title', $page_id);
		$caption = get_field('footer_demo_caption', $page_id);
		$embed_code = get_field('footer_demo_embed', $page_id);
		$num_fields = get_field('num_fields', $page_id);

		$ga_category = get_field('ga_category', $page_id);
		$ga_action = get_field('ga_action', $page_id);
		$ga_label = get_field('ga_label', $page_id);

		// Building our own Embed code so we can manage load events

		// Regular expressions to pull out IDs
		$regex_portal = '/portalId: \'([0-9]*?)\'/i';
		$regex_form = '/formId: \'([a-z0-9-]*?)\'/i';

		// Check for matches
		if( preg_match($regex_portal, $embed_code, $portal_matches) && preg_match($regex_form, $embed_code, $form_matches) ):
			$portal_id = $portal_matches[1];
			$form_id = $form_matches[1];

?>
<section class="form-demo band band-form band-blue form-fields-<?php echo $num_fields; ?>">
	<div class="band-container">
		<h4 class="band-title"><?php echo $title; ?></h4>
		<p class="band-caption"><?php echo $caption; ?></p>
		<!--[if lte IE 8]>
		<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
		<![endif]-->
		<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
		<script>
		  hbspt.forms.create({
		    css: '',
		    portalId: '<?php echo $portal_id; ?>',
		    formId: '<?php echo $form_id; ?>',
		    onFormReady: function( $form, ctx ){
		    	$form.addClass("select-replaced");

		    	// Style the select box
		    	$selectEl = jQuery("select", $form);
		    	if( $selectEl && $selectEl.length ){
					new Select({
					  el: $selectEl[0]
					});
		    	}
		    },
			onFormSubmit: function(){
				try{
					<?php if( $ga_category !== "" ): ?>
						ga('send', {
							'hitType': 'event',
							'eventCategory': '<?php echo $ga_category ?>',
							'eventAction': '<?php echo $ga_action ?>',
							'eventLabel': '<?php echo $ga_label ?>'
						});
					<?php else: ?>
						var pageTitle = document.title;
						ga('send', {
							'hitType': 'event',
							'eventCategory': 'footer-form',
							'eventAction': 'submit',
							'eventLabel': pageTitle
						});
					<?php endif; ?>
				} catch( e ){
					console.log("Hubspot/GA event tracking error", e);
				}
			}
		  });
		</script>
	</div>
</section>
<?php endif; endif; ?>
