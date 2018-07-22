<section id="<?php the_sub_field('id'); ?>" class="band band-largeslides <?php the_sub_field('class'); ?>">
	<div class="band-container">
		<div class="band-title-containter">
			<h4 class="band-title"><?php the_sub_field('title'); ?></h4>
		</div>
		<div class="slides">
			<?php
				// Loop through content blocks
				if( have_rows('slides') ):
					while ( have_rows('slides') ) : the_row();
			?>
				<div class="slide">
					<?php if( $slide_title = get_sub_field('title') ): ?>
						<div class="slide-title"><?php echo $slide_title; ?></div>
					<?php endif; ?>

					<img src="<?php the_sub_field('slide_image'); ?>">
				</div>
			<?php
					endwhile;
				endif;
			?>
		</div>
	</div>
</section>
