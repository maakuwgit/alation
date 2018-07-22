<?php
	get_header(); 
	
	$heading = get_field('heading');
	$subheading = get_field('subheading');
	$form_href = get_field('cta_link');
	$promo_img = get_field('promo_image');

	$thumb 		= get_the_post_thumbnail_url($post);
 
	if( $promo_img ) {
		$tm = wp_get_attachment_image_src($promo_img, 'medium');
		$tl = wp_get_attachment_image_src($promo_img, 'large');
		$tf = wp_get_attachment_image_src($promo_img, 'fullsize');
		$tm = $tm[0];
		$tl = $tl[0];
		$tf = $tf[0];
		$src_avatar = ' src="' . $tm . '" srcset="' . $tm . ' 150w, ' . $tl  . ' 300w, ' . $tf . ' 1000w"';
	} elseif( $thumb ) {
		$tm = get_the_post_thumbnail_url($post, 'medium');
		$tl = get_the_post_thumbnail_url($post, 'large');
		$tf = get_the_post_thumbnail_url($post, 'fullsize');
		$src = ' src="' . $tm . '" srcset="' . $tm . ' 150w, ' .  $tl . ' 300w, ' . $tf . ' 1000w"';
	}
	
	if( $heading ) {
		$heading = '<h1>' . $heading . '</h1>';
	}else{
		$heading = '<h1>' . get_the_title() . '</h1>';
	}
	if( $subheading ) {
		$subheading = '<h2>' . $subheading . '</h2>';
	}
?>
<main id="event" <?php post_class(); ?>>
<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post();?>
	<div class="wrap">
		<figure class="single-featured-image" data-background>
			<div class="feature">
				<img alt="" title="<?php echo get_the_title(); ?>"<?php echo $src; ?> data-src-medium="<?php echo $tm;?>" data-src-large="<?php echo $tl;?>" data-src-xlarge="<?php echo $tf;?>">
			</div>
		</figure>
	</div>
	<?php endwhile; ?>
	<div class="wrap align-top">
		<div class="cell small-12 medium-7 large-6">
			<?php echo $heading; ?>
			<?php echo $subheading; ?>
			<?php the_content(); ?>
		</div>
		<div class="cell small-12 medium-5 large-6" data-form-href="<?php echo $form_href;?>">
			<?php echo do_shortcode('[contact-form-7 id="7333" title="Event"]'); ?>
		</div>
	</div>
<?php endif; ?>
</main>
<?php get_footer(); ?>