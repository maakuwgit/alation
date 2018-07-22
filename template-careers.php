<?php
/*
Template Name: Careers
*/
get_header();
?>
<main id="careers">
	<header class="wrap text-center band">
		<div class="cell small-12">
			<h1><?php the_title();?></h1>
		</div>
	</header>
	<?php if ( have_posts() ) : ?>
	<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'partials/content', 'careers' );
			

		// Loop through content blocks

		// Loop through content blocks
		if( have_rows('generic_content') ) {
			while ( have_rows('generic_content') ) : the_row();
				get_template_part('partials/acf', get_row_layout());
			endwhile;
		}
			// End the loop.
			endwhile; ?>
			<section class="wrap">
				<div class="cell small-12 text-center">
					<h2>Join Us Now</h2>
					<h4>Openings in Redwood City, CA</h4>
				</div>
				<div class="cell small-12 medium-8 large-6">
					<dl class="alation-job-list" data-jobs></dl>
				</div>
			</section>
	<?php else : ?>
		<div class="wrap">
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		</div>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
