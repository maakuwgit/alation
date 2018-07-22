<?php
	get_header(); 
	
	$home = get_bloginfo('url');
	$subheading = get_field('subheading');
	//Solution delivers simple and powerful data governance for insights without sacrificing self-service speed, freedom, or agility;
?>
<main id="press_release" <?php post_class(); ?>>
	<div class="wrap align-top">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
		<div class="cell small-12">
			<h1><?php the_title(); ?><?php echo edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( '&nbsp;<em class="fa fa-pencil"></em>', 'pillar' ),
				$title
			),
			'',
			'', get_the_id(), 'edit-post'
		);;?></h1>
			<?php if( $subheading ) : ?>
			<h2 class="subtitle"><?php echo $subheading; ?></h2>
			<?php endif; ?>
		</div>
		<article class="relative cell small-12 column">
			<?php the_content(); ?>
		</article>
		<?php
		if( have_rows('details') ) {
			while ( have_rows('details') ) : the_row();			
				if( have_rows('companies') ) {
					while ( have_rows('companies') ) : the_row();
						get_template_part( 'partials/acf', 'companies-details' );
					endwhile;
				}
				if( get_field( 'has_resources' ) !== 'Show a Tweet') {
					get_template_part( 'partials/acf', 'supporting-resources' );
				}else{
					if( get_sub_field('tweet') ) {
						get_template_part( 'partials/acf', 'tweet' );
					}
				}
				if( have_rows('contact') ) {
					while ( have_rows('contact') ) : the_row();
						get_template_part( 'partials/acf', 'media-contact' );
					endwhile;
				}
			endwhile;
		}
		?>
	<?php endwhile; ?>
	</div>
</main>
<?php get_footer(); ?>