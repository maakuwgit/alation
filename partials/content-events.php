<?php
	$thumb 		= get_the_post_thumbnail_url($post);
	$start_date = get_field('event_start_date');
	$end_date = get_field('event_end_date');
	$date = $start_date . ' - ' . $end_date;
 
 if($thumb) {
	 $tm = get_the_post_thumbnail_url($post, 'medium');
	 $tl = get_the_post_thumbnail_url($post, 'large');
	 $tf = get_the_post_thumbnail_url($post, 'fullsize');
	 $src = ' src="' . $tm . '" srcset="' . $tm . ' 150w, ' .  $tl . ' 300w, ' . $tf . ' 1000w"';
 }else{
	 $tm = '//via.placeholder.com/600x600';
	 $tl = '//via.placeholder.com/640x640';
	 $tf = '//via.placeholder.com/1000x1000';
	$src = ' src="//via.placeholder.com/600x600" srcset="http://via.placeholder.com/320x320 150w, //via.placeholder.com/640x400 300w, //via.placeholder.com/1000x600 1000w"';
 }
?>
<article id="event-<?php the_ID();?>" class="cell small-12">
	<div class="wrap align-top">
		<time class="cell small-12 medium-2 orange show-for-desktop" datetime="<?php echo $start_date; ?>">
			<?php echo $date; ?>
		</time>
		<div class="cell small-12 medium-5 content">
			<h4 class="orange"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php edit_post_link( __('&nbsp;[edit]') ); ?></h4>
			<time class="orange show-for-tablet-down" datetime="<?php echo $start_date; ?>"><?php echo $date; ?></time>
			<?php the_excerpt(); ?>
		</div>
		<figure class="cell small-12 medium-5 hero" data-href="<?php the_permalink(); ?>">
			<img alt="" <?php echo $src; ?> data-src-medium="<?php echo $tm;?>" data-src-large="<?php echo $tl;?>" data-src-xlarge="<?php echo $tf;?>">
		</figure>
	</div>
</article>