<?php
	get_header(); 

	// Grab the page with the same path, for ACF fields
	$alation_current_page = get_page_by_path('resource', OBJECT, 'page');
	
	$subheading = get_field('subheading');
	$form_href = get_field('asset_href');
	$promo_img = get_field('thumbnail');
	$cta_label = get_field('cta_label');
 
	if($promo_img) {
		$tm = wp_get_attachment_image_src($promo_img, 'medium');
		$tl = wp_get_attachment_image_src($promo_img, 'large');
		$tf = wp_get_attachment_image_src($promo_img, 'fullsize');
		$tm = $tm[0];
		$tl = $tl[0];
		$tf = $tf[0];
		$src = ' src="' . $tm . '" srcset="' . $tm . ' 150w, ' . $tl  . ' 300w, ' . $tf . ' 1000w"';
	}
	if( $subheading ) {
		$subheading = '<h2>' . $subheading . '</h2>';
	}
?>
<main id="resource" <?php post_class(); ?>>
<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post();?>
	<div class="wrap">
		<figure class="single-featured-image">
			<div class="feature">
				<img alt="" title="<?php echo get_the_title(); ?>"<?php echo $src; ?> data-src-medium="<?php echo $tm;?>" data-src-large="<?php echo $tl;?>" data-src-xlarge="<?php echo $tf;?>">
			</div>
		</figure>
	</div>
	<div class="wrap align-top">
		<div class="cell small-12 medium-7 large-6 content">
			<h1><?php the_title();?></h1>
			<?php echo $subheading; ?>
			<?php the_content(); ?>
		</div>
		<div class="cell small-12 medium-5 large-6" data-form-href="<?php echo $form_href;?>" data-btn-label="<?php echo $cta_label;?>">
			<?php echo do_shortcode('[contact-form-7 id="7277" title="Resources"]'); ?>
		</div>
	</div>
	<?php 
		// Loop through content blocks
		if( have_rows('contributor', $alation_current_page) ):
	?>
	<aside class="wrap align-top">
		<?php
			while ( have_rows('contributor', $alation_current_page) ) : the_row();
				$thumbnail = get_sub_field('thumbnail');
			 
				if($thumbnail) {
					$cm = wp_get_attachment_image_src($thumbnail, 'medium');
					$cl = wp_get_attachment_image_src($thumbnail, 'large');
					$cf = wp_get_attachment_image_src($thumbnail, 'fullsize');
					$cm = $cm[0];
					$cl = $cl[0];
					$cf = $cf[0];
					$csrc = ' src="' . $cm . '" srcset="' . $cm . ' 150w, ' . $cl  . ' 300w, ' . $cf . ' 1000w"';
				}
		?>
		<div class="cell small-12 medium-6 contributor">
			<figure class="wrap align-top">
				<div class="cell small-12 large-4 thumbnail">
					<img alt="" <?php echo $csrc; ?> data-src-medium="<?php echo $tm;?>" data-src-large="<?php echo $tl;?>" data-src-xlarge="<?php echo $cf;?>">
				</div>
				<figcaption class="cell small-12 large-8">
					<h5><?php the_sub_field('name'); ?></h5>
					<?php the_sub_field('description'); ?>
				</figcaption>
			</figure>
		</div>
		<?php endwhile; ?>
	</aside>
	<?php endif;?>
	<?php endwhile; ?>
<?php endif; ?>
</main>
<?php get_footer(); ?>