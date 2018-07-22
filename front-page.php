<?php get_header(); ?>
<div id="theme-page">
	<!-- Hero -->
	<section class="band band-hero">
		<div class="band-container">
			<div class="band-container-inner">
				<div class="subtitles"></div>

				<div class="headline">Leverage what is known to <br> <em class="type"></em> your data</div>

				<div class="dataslides">
					<?php
						if( have_rows('hero_slides') ):
							while ( have_rows('hero_slides') ) : the_row();
					?>
						<div class="dataslide" data-subtitle="<?php the_sub_field('subtitle'); ?>" data-keyword="<?php the_sub_field('action'); ?>" data-bg="<?php the_sub_field('bg'); ?>">
							<blockquote>
								<p>"<?php the_sub_field('quote'); ?>"</p>
								<cite><?php the_sub_field('quote_author'); ?></cite>
							</blockquote>
						</div>
					<?php
							endwhile;
						endif;
					?>
				</div>
			</div>
		</div>

		<div class="bgslides"></div>
		<a href="#" class="proceed">&nbsp;</a>
	</section>

	<a id="content-top"></a>
	<section class="band band-promo band-grey">
		<div class="band-container">
			<div class="promos">
			<?php
				if( have_rows('promos') ):
					while ( have_rows('promos') ) : the_row();
			?>
				<a href="<?php the_sub_field('link'); ?>" class="promo">
					<i class="icon-<?php the_sub_field('icon'); ?> promo-icon"></i>
					<div class="promo-details">
						<strong><?php the_sub_field('title'); ?></strong>
						<em><?php the_sub_field('subtitle'); ?></em>
					</div>
				</a>
			<?php
					endwhile;
				endif;
			?>
			</div>
		</div>
	</section>


	<section class="band band-features">
		<div class="band-container">
			<h4 class="band-title"><?php the_field('feature_title'); ?></h4>
			<p class="band-caption"><?php the_field('feature_description'); ?></p>
		</div>

		<?php if( have_rows('features') ): ?>
		<div class="features">
			<div class="feature-imgs">
				<?php while ( have_rows('features') ) : the_row(); ?>
					<div class="feature-img">
						<img src="<?php the_sub_field('image') ?>">
					</div>
				<?php endwhile; ?>
			</div>

			<div class="feature-data">
				<?php while ( have_rows('features') ) : the_row(); ?>
					<div class="feature">
						<div class="feature-title"><?php the_sub_field('title') ?></div>
						<div class="feature-description"><?php the_sub_field('description') ?></div>
						<a href="/product/" class="button button-primary">Learn More</a>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
		<?php endif; ?>
	</section>

	<a href="<?php the_field('video_url'); ?>" class="band band-video band-abscenter">
		<div class="band-container">
			<h4 class="band-title"><?php the_field('video_title'); ?></h4>
		</div>
	</a>

	<?php if (have_rows('personas')) { ?>
	<section class="band band-audience band-grid">
		<h4 class="band-title">I am a...</h4>

		<div class="items">
			<?php while (have_rows('personas')) { the_row(); ?>
			<a href="<?php the_sub_field('persona_link'); ?>" class="item">
				<img src="<?php the_sub_field('persona_image'); ?>" class="item-thumb">
				<div class="description"><?php the_sub_field('persona_title'); ?></div>
				<span class="learn">Learn More</span>
			</a>
			<?php } ?>
		</div>

	</section>
	<?php } ?>

	<section class="band band-customers band-grey">
		<div class="band-container">
			<h4 class="band-title">Featured Customers</h4>

			<div class="logos">
				<?php
					if( have_rows('logos') ):
						while ( have_rows('logos') ) : the_row();
				?>
					<img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('name'); ?>" class="item-logo">
				<?php
						endwhile;
					endif;
				?>
			</div>

			<a href="/customers/" class="button button-primary">View All</a>
		</div>
	</section>



	<section class="band band-carousel band-recognition">
		<div class="band-container">
			<h4 class="band-title">Recognition</h4>

			<div class="band-slides slides-cards">
				<?php
					if( have_rows('recognition') ):
						while ( have_rows('recognition') ) : the_row();
				?>
					<a href="<?php the_sub_field('target'); ?>" class="band-slide">
						<img src="<?php the_sub_field('image'); ?>" class="slide-thumb">
						<div class="slide-caption">
							<div class="title"><?php the_sub_field('title'); ?></div>
							<div class="description"><?php the_sub_field('description'); ?></div>
						</div>
					</a>
				<?php
						endwhile;
					endif;
				?>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>
