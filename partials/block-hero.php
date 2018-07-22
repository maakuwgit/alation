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

	// Hero Styling
	$hero_style = "";
	if( $hero_bg = get_field('hero_bg', $page_id) ){
		$hero_style = "background-image: url('" . $hero_bg . "');";
	}
?>
<section class="band band-hero" style="<?php echo $hero_style; ?>">
	<div class="band-container">
		<div class="band-container-inner">
			<div class="subtitle"><?php the_field('hero_subtitle', $page_id);  ?></div>
			<div class="headline"><?php the_field('hero_title', $page_id);  ?></div>
			<div class="description"><?php the_field('hero_content', $page_id);  ?></div>
		</div>
	</div>
	<a href="#" class="proceed">&nbsp;</a>
</section>
