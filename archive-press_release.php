<?php
/*
Template Name: Press Release
*/
// Grab the page with the same path, for ACF fields
$alation_current_page = get_page_by_path('press_release', OBJECT, 'page');

get_header(); ?>
<main id="press_release">
	<header class="wrap">
		<h1 class="cell small-12 medium-6 large-4">Press Releases</h1>
		<hr class="cell small-12 medium-6 large-8">
	</header>
	<?php if ( have_posts() ) : ?>
	<section class="wrap align-top">
	<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'partials/content', 'press_release' );
			
			// End the loop.
			endwhile; ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
	</section>
</main>
<?php get_footer(); ?>
