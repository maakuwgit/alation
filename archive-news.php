<?php
/*
Template Name: News
*/
	
// Grab the page with the same path, for ACF fields
$alation_current_page = get_page_by_path('news', OBJECT, 'page');

$headline = get_field('headline', $alation_current_page);

if($headline == '' ) $headline = 'In the News';

get_header(); ?>
<main id="news" class="gradient">
<?php if( have_rows('slate_logos', $alation_current_page) ) : ?>
	<aside class="wrap">
	<?php
		while ( have_rows('slate_logos', $alation_current_page) ) : the_row();
			$lID = get_sub_field('logo');
			$photo = wp_get_attachment_url($lID);
			$alt = get_sub_field('name');

			if($photo) {
				$af = wp_get_attachment_image_src($lID, 'fullsize');
				$at = wp_get_attachment_image_src($lID, 'thumbnail');
				$am = wp_get_attachment_image_src($lID, 'medium');
				$al = wp_get_attachment_image_src($lID, 'large');
				$src_avatar = ' src="' . $at[0] . '" srcset="' . $at[0] . ' 150w, ' . $al[0]  . ' 300w"';
			}
	?>
		<figure class="cell small-6 medium-3">
			<img alt="<?php echo $alt; ?>"<?php echo $src_avatar;?>>
		</figure>
	<?php endwhile; ?>
	</aside>
<?php endif;?>
	<header class="wrap">
		<h1 class="cell small-12 medium-6 large-4"><?php echo $headline; ?></h1>
		<hr class="cell small-12 medium-6 large-8">
	</header>
	<section class="wrap align-top">
	<?php
		$news = new WP_Query( array( 'post_type' => 'news', 'nopaging' => true ) );
		if ( $news->have_posts() ) : ?>
	<?php
			// Start the Loop.
			while ( $news->have_posts() ) : $news->the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'partials/content', 'news' );
			
			// End the loop.
			endwhile; ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
	</section>
</main>
<?php get_footer(); ?>
