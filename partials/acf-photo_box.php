<?php
$id 			= get_the_ID();

$img_id = get_sub_field('box_image');
$is_full = get_sub_field('is_fullwidth');

if($img_id !== '') {
	$position = get_sub_field('box_image_position');
	$has_img 		= wp_get_attachment_image_src($img_id);
	
	if($has_img) {
	 $tm = wp_get_attachment_image_src($img_id, 'medium');
	 $tl = wp_get_attachment_image_src($img_id, 'large');
	 $tf = wp_get_attachment_image_src($img_id, 'fullsize');
	 $src = ' src="' . $tm[0] . '" srcset="' . $tm[0] . ' 150w, ' .  $tl[0] . ' 300w, ' . $tf[0] . ' 1000w"';
	}
}

if ($is_full) {
	$feature_img = '<figure class="cell small-12 medium-6 photo text-center">';
}else{
	$feature_img = '<figure class="cell small-12 medium-5 photo text-center">';
}
$feature_img .= '<img alt="" ' . $src . ' data-src-medium="'. $tm[0] . '" data-src-large="' . $tl[0] . '" data-src-xlarge="' . $tf[0] . '">';
$feature_img .= '</figure>';
?>	
<section class="wrap photo_box<?php if ($is_full) echo ' stretch';?>">
<?php if ($has_img && $position == 'left') echo $feature_img ?>
	<div class="cell small-12 <?php echo ( $is_full ) ? 'medium-6' : 'medium-7'; ?>">
	<?php if (get_sub_field('box_headline') !== '') : ?>
		<h3><?php the_sub_field('box_headline'); ?></h3>
	<?php endif; ?>
		<?php the_sub_field('box_copy'); ?>
	</div>
<?php if ($has_img && $position == 'right') echo $feature_img ?>
</section>