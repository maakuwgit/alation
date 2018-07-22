<?php
$thumb 		= get_the_post_thumbnail_url($post);
$id 			= get_the_ID();

if($thumb) {
 $tm = get_the_post_thumbnail_url($post, 'medium');
 $tl = get_the_post_thumbnail_url($post, 'large');
 $tf = get_the_post_thumbnail_url($post, 'fullsize');
 $src = ' src="' . $tm . '" srcset="' . $tm . ' 150w, ' .  $tl . ' 300w, ' . $tf . ' 1000w"';
}
?>	
<?php if ($thumb) : ?>
	<figure class="featured-image" data-background>
		<div class="feature">
			<img alt="" title="<?php echo get_the_title(); ?>"<?php echo $src; ?> data-src-medium="<?php echo $tm;?>" data-src-large="<?php echo $tl;?>" data-src-xlarge="<?php echo $tf;?>">
		</div>
	</figure>
<?php endif; ?>
<?php if( has_excerpt() ) : ?>
	<div class="cell small-12 medium-8 large-6">
		<?php the_excerpt(); ?>
	</div>
<?php else: ?>
	<div class="wrap">
		<?php the_content(); ?>
	</div>
<?php endif; ?>