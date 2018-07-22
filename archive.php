<?php
	/*
Template Name: Blog
*/
// Grab the page with the same path, for ACF fields
$alation_current_page = get_page_by_path('blog', OBJECT, 'page');

get_header(); ?>
<main id="archive">
	<?php
		if ( have_posts() ) :
			$cc = 0;
			$col1 = [];
			$col2 = [];
			
				// Start the Loop.
				while ( have_posts() ) : the_post();
	
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					if ( $cc%2==0 ) {
						ob_start();
						get_template_part( 'partials/content', get_post_format() );
						$col1[] = ob_get_contents();
						ob_end_clean();
					}else{
						ob_start();
						get_template_part( 'partials/content', get_post_format() );
						$col2[] = ob_get_contents();
						ob_end_clean();
					}
				// End the loop.
				$cc++;
				endwhile;
	?>
	<div class="wrap align-top">
		<div class="cell small-12 medium-6">
		<?php 
			foreach($col1 as $content1) {
				echo $content1;
			}
		?>
		</div>
		<div class="cell small-12 medium-6">
		<?php 
			foreach($col2 as $content2) {
				echo $content2;
			}
		?>
		</div>
	</div>
	<div class="wrap table">
		<footer class="cell small-12">
		<?php
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( '', 'pillar' ),
					'next_text'          => __( '', 'pillar' ),
					'before_page_number' => '',
				) );
				$curr_pg = $page;
				$total_pgs = $wp_query->max_num_pages;
				?>
			<div class="page-count cell small-12 medium-6 text-right">page <?php echo $curr_pg . ' of ' . $total_pgs; ?></div>
		</footer>
	</div>
	<?php else : ?>
	<div class="wrap align-top">
		<?php	get_template_part( 'template-parts/content', 'none' ); ?>
	</div>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
