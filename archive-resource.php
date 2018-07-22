<?php
/*
Template Name: Resources
*/

// Grab the page with the same path, for ACF fields
$alation_current_page = get_page_by_path('resources', OBJECT, 'page');

get_header(); ?>
<main id="theme-page">
	<?php get_template_part("partials/block", "hero"); ?>

	<a id="content-top"></a>
	<section class="band band-videos band-carousel band-grey">
		<div class="band-container">
			<h4 class="band-title"><?php the_field('slider_headline', $alation_current_page) ?></h4>
			<div class="band-slides slides-cards">
				<?php
					// Loop through content blocks
					if( have_rows('slider', $alation_current_page) ):
						while ( have_rows('slider', $alation_current_page) ) : the_row();
				?>
					<a href="<?php the_sub_field('target') ?>" class="<?php the_sub_field('popup_type'); ?> band-slide">
						<div class="slide-thumb">
							<img src="<?php the_sub_field('image'); ?>">
						</div>
						<div class="name"><?php the_sub_field('title'); ?></div>
					</a>
				<?php
						endwhile;
					endif;
				?>
			</div>
		</div>
	</section>

	<section class="band band-resources band-filterable">
		<div class="band-container">
			<?php if( $intro = get_field('filter_intro', $alation_current_page) ): ?>
				<div class="band-caption"><?php echo $intro; ?></div>
			<?php endif; ?>
			<h4 class="band-title"><?php the_field('filter_headline', $alation_current_page) ?></h4>
			<div class="filters">
				<?php
					// Get post type taxonomies.
					$taxonomies = get_object_taxonomies( 'resource', 'objects' );

					foreach ( $taxonomies as $taxonomy_slug => $taxonomy ):
				?>
					<div class="filter filter-hasmenu">
						<a class="control" href="#"><span><?php echo $taxonomy->labels->singular_name; ?></span></a>
						<ul class="filter-menu">
							<?php
								$terms = get_terms( array( 'taxonomy' => $taxonomy_slug) );
								foreach( $terms as $term ):
							?>
								<li><a href="#" class="filter-action" data-filter=".<?php echo $taxonomy_slug . "-" . $term->slug; ?>"><?php echo $term->name; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>

				<div class="filter filter-button">
					<a class="control filter-action filter-reset" href="#" data-filter="*">View All</a>
				</div>
			</div>

			<div class="items">
				<?php
					$items = new WP_Query( array( 'post_type' => 'resource', 'nopaging' => true ) );

					if ( $items->have_posts() ):
						while ( $items->have_posts() ):
							$items->the_post();

							$filterclasses = [];
							foreach ( $taxonomies as $taxonomy_slug => $taxonomy ):
								// Get the terms related to post.
								$terms = get_the_terms( get_the_ID(), $taxonomy_slug );

								foreach ( $terms as $term ) {
									$filterclasses[] = $taxonomy_slug."-".$term->slug;
								}
							endforeach;
	
							$has_cta = get_field('has_cta');
							$is_external = get_field('is_external');

							if( $is_external == false){
								$href = get_the_permalink();
							}else{
								$href = get_field('cta_link');
							}
				?>
				<a href="<?php echo $href; ?>" class="item <?php echo implode(" ", $filterclasses); ?>">
					<div class="item-content">
						<div class="face-front">
							<div class="face-inner">
								<div class="item-thumbnail">
									<?php the_post_thumbnail( 'medium' ); ?>
								</div>
								<div class="description">
									<?php the_field('front-description'); ?>
								</div>
								<img class="icon-plus" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon-plus.svg">
							</div>
						</div>
						<div class="face-back">
							<div class="face-inner">
								<blockquote>
									<p>"<?php the_field('quote') ?>"</p>
									<?php if( get_field('quote_author') ) :?>
									<cite>&mdash; <?php the_field('quote_author') ?></cite>
									<?php endif; ?>
								</blockquote>
								<?php if( $has_cta ): ?>
									<div class="button button-outline"><?php the_field('cta_label') ?></div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</a>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
