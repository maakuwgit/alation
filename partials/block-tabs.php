<section id="<?php the_sub_field('id'); ?>" class="band band-tabsection band-bg-parallax <?php the_sub_field('class'); ?>">
	<div class="band-container">
		<h4 class="band-title"><?php the_sub_field('title'); ?></h4>
		<div class="band-caption">
			<?php the_sub_field('caption'); ?>
		</div>
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
						<div class="band-tab-sidebar band-tab-sidebar-iconlist">
							<h6><?php the_sub_field('sidebar_title'); ?></h6>

							<?php
								// Loop through content blocks
								if( have_rows('sidebar_content') ):
									while ( have_rows('sidebar_content') ) : the_row();
										switch ( get_row_layout() ) {
											case 'content':
							?>
								<div class="list-title">
									<i class="list-title-icon icon-storage-circle"></i>
									<?php the_sub_field('icon'); ?>
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
										}
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

	<?php if( $hero_bg = get_field('hero_bg') ): ?>
		<div class="band-bg-parallax"><img src="<?php echo $hero_bg; ?>"></div>
	<?php endif; ?>
</section>
