<?php
/*
Template Name: Persona
*/
get_header(); ?>
<div id="persona">
	<!-- Hero -->
	<?php
		$hero_style = "";

		if( $hero_bg = get_field('hero_bg') ){
			$hero_style = "background-image: url('" . $hero_bg . "');";
		}
	?>
	<section class="band band-hero" style="<?php echo $hero_style; ?>">
		<div class="band-container">
			<div class="subtitle"><?php the_field('hero_subtitle');  ?></div>
			<div class="headline"><?php the_field('hero_title');  ?></div>
			<div class="description"><?php the_field('hero_content');  ?></div>
		</div>
		<a href="#" class="proceed">&nbsp;</a>
	</section>

	<a id="content-top"></a>
	<?php
		// Loop through content blocks
		if( have_rows('block') ):
			while ( have_rows('block') ) : the_row();
				get_template_part("partials/block", get_row_layout());
			endwhile;
		endif;
	?>
</div>
<?php get_footer(); ?>
