<section id="<?php the_sub_field('id'); ?>" class="band band-centered <?php the_sub_field('class'); ?>">
	<div class="band-container">
		<div class="band-title-containter">
			<h4 class="band-title"><?php the_sub_field('title'); ?></h4>
		</div>
		<div class="band-caption">
			<?php the_sub_field('caption'); ?>
		</div>

		<?php if( $img = get_sub_field('image') ): ?>
			<img class="band-img" src="<?php echo $img; ?>">
		<?php endif; ?>
	</div>
</section>
