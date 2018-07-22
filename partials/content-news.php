<?php
	
	// Grab the page with the same path, for ACF fields
	$alation_current_page = get_page_by_path('news', OBJECT, 'page');
	
	$num_cols = get_field('num_cols', $alation_current_page);
	if($num_cols) {
		$num_cols = 12/$num_cols;
	}else{
		$num_cols = 3;
	}

	$outlets = get_the_terms($post->ID, 'outlets');
	$outlet_str = $title = '';
	foreach( $outlets as $outlet ) {
	  $outlet_str .= $outlet->name . ' ';
	}
	
	$href = get_field('href');
	if( $href ){
		$title = '<a href="' . $href . '">' . get_the_title() . '</a>';
	}else{
		$title = get_the_title();
	}
?>
<article id="article-<?php get_the_ID();?>" class="cell small-12 medium-6 large-<?php echo $num_cols; ?>">
	<h3>
		<?php echo $title; ?>
	</h3>
	<div class="news-sub">
		<h4 class="inline"><?php echo $outlet_str; ?></h4>
		<time class="pub-date" datetime="<?php echo get_the_date('m d, Y'); ?>">
			<?php echo get_the_date('M d, Y'); ?>
		</time>
	</div>
	<div class="pr-desc">
		<?php the_excerpt(); ?><?php edit_post_link( __('&nbsp;[edit]') ); ?>
	</div>
</article>