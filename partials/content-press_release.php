<article id="<?php the_ID();?>" class="cell small-12 medium-6 large-3">
	<h3 class="inline">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
	</h3>
	<time class="block" datetime="<?php echo get_the_date('M d, Y'); ?>">
		<?php echo get_the_date('M d, Y'); ?>
	</time>
</article>