<?php
/*
Template Name: Case Study
*/
get_header(); ?>
<div id="theme-page">
	<!-- Hero -->
	<section class="band band-hero">
		<div class="band-container">
			<img class="logo" alt="<?php the_field('client_name'); ?>" src="<?php the_field('client_logo'); ?>">
			<div class="subtitle"><?php the_field('hero_subtitle'); ?></div>
		</div>
	</section>

	<div class="band case-study">
		<div class="band-container">
			<div class="col-content mk-text-block">
				<?php the_field('content_main'); ?>
			</div>

			<div class="col-sidebar mk-text-block">
				<?php if( get_field('has_video') ): ?>
					<a class="modal-video" href="<?php the_field("video_link"); ?>">
						<img src="<?php the_field("video_image"); ?>">
					</a>
				<?php endif; ?>

				<?php if( get_field('has_quote') ): ?>
					<blockquote class="client-quote">
						<p><?php the_field("quote_body"); ?></p>
						<cite><?php the_field("quote_author"); ?></cite>
					</blockquote>
				<?php endif; ?>

				<?php the_field('content_sidebar'); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
