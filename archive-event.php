<?php
/*
Template Name: Events
*/
	
// Grab the page with the same path, for ACF fields
$alation_current_page = get_page_by_path('events', OBJECT, 'page');

get_header(); ?>
<main id="events">
	<div class="pulse">
		<header class="wrap text-center band">
			<div class="cell small-12">
				<h1><?php the_field('headline', $alation_current_page) ?></h1>
				<h2><?php the_field('subheadline', $alation_current_page) ?></h2>
			</div>
		</header>
	</div>
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
				get_template_part( 'partials/content', 'events' );
			
			// End the loop.
			endwhile; ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
	</section>
</main>
<?php get_footer(); ?>
