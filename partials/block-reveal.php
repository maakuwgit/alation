<section id="<?php the_sub_field('id'); ?>" class="band band-pointicons band-cols <?php the_sub_field('class'); ?>">
	<div class="band-container">
		<?php if( get_sub_field('title') ): ?>
			<h4 class="band-title"><?php the_sub_field('title'); ?></h4>
		<?php endif; ?>

		<?php
			// Loop through content blocks
			if( have_rows('cols') ):
				while ( have_rows('cols') ) : the_row();
		?>
			<div class="band-col">
				<div class="item-icon">
					<img src="<?php the_sub_field('image'); ?>">
				</div>
				<h5 class="coltitle"><?php the_sub_field('title'); ?></h5>
				<p class="colcontent"><?php the_sub_field('content'); ?></p>
			</div>
		<?php
				endwhile;
			endif;
		?>
	</div>
</section>
