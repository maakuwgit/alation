<?php
get_header();
?>
<main id="page">
	<header class="wrap text-center">
		<div class="cell small-12">
			<h1><?php the_title();?></h1>
		</div>
	</header>
	<div class="wrap">
	<?php if ( have_posts() ) : ?>
	<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'partials/content', 'page' );
			
			// End the loop.
			endwhile; ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
	</div>
</main>
<?php get_footer(); ?>
