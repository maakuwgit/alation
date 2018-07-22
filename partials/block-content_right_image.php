<section id="<?php the_sub_field('id'); ?>" class="band band-rightimg <?php the_sub_field('class'); ?>">
	<div class="band-container">
		<img src="<?php the_sub_field('download_image') ?>" class="band-img">
		<h4 class="band-title"><?php the_sub_field('title'); ?></h4>
		<div class="band-caption">
			<?php the_sub_field('download_content'); ?>
			<?php echo alation_generate_button(get_sub_field('download_cta'), "button-primary"); ?>
		</div>
	</div>
</section>
