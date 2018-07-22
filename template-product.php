<?php
/*
Template Name: Product
*/
get_header(); ?>
<div id="theme-page">
	<!-- Hero -->

	<?php
		// Hero Styling
		$hero_style = "";
		if( $hero_bg = get_field('hero_bg') ){
			$hero_style = "background-image: url('" . $hero_bg . "');";
		}
	?>
	<section class="band band-hero" style="<?php echo $hero_style; ?>">
		<div class="band-container">
			<div class="band-container-inner">
				<div class="subtitle"><?php the_field('hero_subtitle');  ?></div>
				<div class="headline"><?php the_field('hero_title');  ?></div>
			</div>
		</div>
		<a href="#" class="proceed">&nbsp;</a>
	</section>

	<a id="content-top"></a>
	<section class="band band-intro band-grey">
		<div class="band-container">
			<h4 class="band-title"><?php the_field('intro_large'); ?></h4>
			<p class="band-caption"><?php the_field('intro_smaller'); ?></p>
		</div>
	</section>

	<section class="band band-grid band-features">
		<div class="band-container">
			<h4 class="band-title"><?php the_field('apps_title'); ?></h4>
			<p class="band-caption"><?php the_field('apps_description'); ?></p>

			<div class="items">
				<?php
					if( have_rows('apps') ):
						while ( have_rows('apps') ) : the_row();
				?>
					<div class="item">
						<div class="item-container">
							<div class="vidlink">
								<img src="<?php the_sub_field('image'); ?>">
							</div>
							<div class="item-content">
								<div class="title"><?php the_sub_field('title'); ?></div>
								<div class="tag"><?php the_sub_field('tag'); ?></div>
								<div class="description"><?php the_sub_field('description'); ?></div>
							</div>
						</div>
					</div>
				<?php
						endwhile;
					endif;
				?>
			</div>
		</div>
	</section>

	<section class="band band-source">
		<div class="band-container">
			<h4 class="band-title"><?php the_field('screens_title'); ?></h4>
		</div>

		<div class="band-container">
			<?php if( have_rows('screens_slides') ): ?>
				<div class="slides slides-screenshots">
					<?php while ( have_rows('screens_slides') ) : the_row(); ?>
						<img src="<?php the_sub_field('image'); ?>">
					<?php endwhile; ?>
				</div>

				<div class="slides slides-descriptions">
					<?php while ( have_rows('screens_slides') ) : the_row(); ?>
						<div class="slide">
							<div class="description">
								<div class="questions"><?php the_sub_field('questions'); ?></div>

								<h4><?php the_sub_field('title'); ?></h4>
								<p><?php the_sub_field('description'); ?></p>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="band band-cols band-cols-three">
		<div class="band-container">
			<?php
				if( have_rows('screens_columns') ):
					while ( have_rows('screens_columns') ) : the_row();
			?>
				<div class="band-col">
					<h5 class="coltitle"><?php the_sub_field('title'); ?></h5>
					<?php the_sub_field('content'); ?>
				</div>
			<?php
					endwhile;
				endif;
			?>
		</div>
	</section>




	<section class="band band-howcatalog band-tabsection" style="<?php echo $hero_style; ?>">
		<div class="band-container">
			<h4 class="band-title"><?php the_field('tabs_title'); ?></h4>
		</div>

		<div class="band-tabcontainer">
			<div class="band-container">
				<div class="band-tab-nav">
					<?php
						// Loop through content blocks
						if( have_rows('tabs') ):
							while ( have_rows('tabs') ) : the_row();
					?>
						<a href="#<?php echo sanitize_title( get_sub_field('tab_label') ); ?>"><?php the_sub_field('tab_label'); ?></a>
					<?php
							endwhile;
						endif;
					?>
				</div>
				<div class="band-tabs">
					<?php
						// Loop through tabs
						if( have_rows('tabs') ):
							while ( have_rows('tabs') ) : the_row();
					?>
					<div id="<?php echo sanitize_title( get_sub_field('tab_label') ); ?>" class="band-tab">
						<a href="#<?php echo sanitize_title( get_sub_field('tab_label') ); ?>" class="nav-accordian"><?php the_sub_field('tab_label'); ?></a>
						<div class="band-tab-inner">
							<div class="band-tab-content">
								<h5 class="band-tab-title"><?php the_sub_field('tab_title'); ?></h5>
								<?php the_sub_field('tab_content'); ?>
							</div>
							<div class="band-tab-sidebar">
								<h6><?php the_sub_field('sidebar_title'); ?></h6>

								<?php
									// Loop through content blocks
									if( have_rows('sidebar_content') ):
										while ( have_rows('sidebar_content') ) : the_row();
								?>
									<div class="sidebar-block sidebar-block-<?php echo get_row_layout(); ?>">
										<?php
											switch ( get_row_layout() ) :
												case 'content':
										?>
										<div class="list-title">
											<?php the_sub_field('title'); ?>
										</div>
										<?php the_sub_field('content'); ?>
										<?php
													break;
												case 'image':
										?>
										<img class="sidebar-img" src="<?php the_sub_field('image'); ?>">
										<?php
												break;
											endswitch;
										?>
									</div>
								<?php
										endwhile;
									endif;
								?>
							</div>
						</div>

						<div class="clearfix"></div>
					</div> <!-- /.band-tab -->
					<?php
							endwhile;
						endif;
					?>

				</div>
			</div>
		</div>
	</section>



	<section class="band band-platforms band-grey">
		<div class="band-container">
			<h4 class="band-title"><?php the_field('platforms_title'); ?></h4>

			<ul class="logos">
				<?php
					if( have_rows('logos') ):
						while ( have_rows('logos') ) : the_row();
				?>
					<li><img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('name'); ?>" class="item-logo"></li>
				<?php
						endwhile;
					endif;
				?>
			</ul>
		</div>
	</section>


	<section class="band band-pointicons band-cols band-cols-four">
		<div class="band-container">
			<h4 class="band-title"><?php the_field('reveal_title'); ?></h4>
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
</div>
<?php get_footer(); ?>
