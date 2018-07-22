<?php
/*
Template Name: About
*/
get_header();

$copy = get_field('about_copy');
$executive_title = get_field('about_executive_title');
$investors_title = get_field('about_investors_title');
$location_title = get_field('about_location_title');
?>
<main id="about">
	<div class="pulse">
		<header class="wrap text-center band">
			<div class="cell small-12">
				<h1><?php the_title();?></h1>
				<?php echo get_the_excerpt();?>
			</div>
		</header>
	</div>
	<?php
		$args = array(
		 'orderby' => 'ID',
		 'order' => 'ASC',
		 'role' => 'exec'
		);
		
		$users = get_users( $args );
	
		if ( sizeof($users) > 0 ) : ?>
	<section id="execs" class="band mk-page-section">
		<div class="wrap">
			<h2 class="cell small-12 medium-6 large-4 text-center"><?php echo $executive_title; ?></h2>
			<hr class="cell small-12 medium-6 large-8">
		</div>
		<div class="wrap align-top">
		<?php
			$execs = [];
			foreach($users as $userraw) {
				$exec = get_user_meta( $userraw->ID );
				$execs[$userraw->ID] = array(
					'order' => $exec['order'], 
					'ID' => $userraw->ID,
				);
			}
			
			sort($execs);
			foreach($execs as $user ) {
				include( locate_template('partials/content-execs.php' ) );
			}
			//Dev Note: is a reset needed for a standard get_user call?
			wp_reset_query();
		?>
		</div>
	</section>
	<?php endif; ?>
	<section id="investors" class="band mk-page-section">
		<div class="wrap">
			<h2 class="cell small-12 medium-6 large-4 text-center"><?php echo $investors_title; ?></h2>
			<hr class="cell small-12 medium-6 large-8">
		</div>
		<dl class="wrap thumbnails">
		<?php			 
			 $args = array( 
										'post_type' 		=> 'investor',
										'order' 				=> 'ASC'
									);
									
				$investor_query = new WP_Query( $args );
	
				if($investor_query) {

					while ( $investor_query->have_posts() ) : $investor_query->the_post();
						get_template_part( 'partials/content', 'investors' );
					endwhile;
					
				}
				
				wp_reset_query();
		?>
		</dl>
	</section>
	<section id="location" class="band">
		<div class="wrap">
			<h2 class="cell small-12 medium-6 large-4 text-center"><?php echo $location_title; ?></h2>
			<hr class="cell small-12 medium-6 large-8">
		</div>
		<?php get_template_part( 'includes/widget', 'mapbox' ); ?>
	</section>
</main>
<?php get_footer(); ?>
