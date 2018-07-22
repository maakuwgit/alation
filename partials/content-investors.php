<?php	
 $thumb 		= get_the_post_thumbnail_url($post);
 
 if($thumb) {
	 $src = ' src="' . get_the_post_thumbnail_url($post, 'thumbnail') . '" srcset="' . get_the_post_thumbnail_url($post, 'thumbnail') . ' 150w, ' .  get_the_post_thumbnail_url($post, 'large') . ' 300w, ' . get_the_post_thumbnail_url($post, 'fullsize') . ' 1000w"';
 }else{
	$src = ' src="http://via.placeholder.com/300x300" srcset="http://via.placeholder.com/150x150 150w, http://via.placeholder.com/300x300 300w, http://via.placeholder.com/1000x1000 1000w"';
 }
?>
<dt class="cell small-12 medium-6 large-4 thumbnail">
	<img alt=""<?php echo $src; ?> sizes="(max-width: 300px) 100vw, 300px">
</dt>