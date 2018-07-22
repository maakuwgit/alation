<?php
	get_header(); 
	
	$thumb 		= get_the_post_thumbnail_url($post);
 
 if($thumb) {
	 $tm = get_the_post_thumbnail_url($post, 'medium');
	 $tl = get_the_post_thumbnail_url($post, 'large');
	 $tf = get_the_post_thumbnail_url($post, 'fullsize');
	 $src = ' src="' . $tm . '" srcset="' . $tm . ' 150w, ' .  $tl . ' 300w, ' . $tf . ' 1000w"';
 }else{
	 $tm = 'http://via.placeholder.com/600x600';
	 $tl = 'http://via.placeholder.com/640x640';
	 $tf = 'http://via.placeholder.com/1000x1000';
	$src = ' src="http://via.placeholder.com/600x600" srcset="http://via.placeholder.com/320x320 150w, http://via.placeholder.com/640x640 300w, http://via.placeholder.com/1000x1000 1000w"';
 }
?>
<main id="single" <?php post_class('blog-bg'); ?>>
<?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
	<div class="wrap">
		<figure class="single-featured-image" data-background>
			<div class="feature">
				<img alt="" title="<?php echo get_the_title(); ?>"<?php echo $src; ?> data-src-medium="<?php echo $tm;?>" data-src-large="<?php echo $tl;?>" data-src-xlarge="<?php echo $tf;?>">
			</div>
		</figure>
		<header class="relative">
			<div>
	<?php if(isset($mk_options['blog_single_title']) && !empty($mk_options['blog_single_title']) ? $mk_options['blog_single_title'] : 'true') : ?>
		<?php if($mk_options['blog_single_title'] == 'true') : ?>
				<?php if (get_field('rich_text_title')): ?>
				<h1 class="rt-blog-title-single"> <?php the_field('rich_text_title'); ?></h1>
				<?php else: ?>
				<h1 class="blog-single-title"><?php the_title(); ?><?php echo edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						__( '&nbsp;<em class="fa fa-pencil"></em>', 'pillar' ),
						$title
					),
					'',
					'', get_the_id(), 'edit-post'
				);;?></h1>
				<?php endif; ?>
				<?php if(get_field('subtitle')): ?>
				<h2 class="subtitle"><?php the_field('subtitle'); ?></h2>
				<?php endif; ?>
			<?php endif; ?>
			<section class="social-share-inline">
				<nav class="addthis_sharing_toolbox"></nav>
			</section>
 	<?php endif; ?>
 	<?php if($mk_options['single_meta_section'] == 'true' && get_post_meta( $post->ID, '_disable_meta', true ) != 'false') : ?>
			<section class="author-info-page">
				<figure class="author-info wrap align-start">
					<?php echo get_avatar( get_the_author_meta('email'), '200'); ?>
						<figcaption class="author-info-list">
							<strong class="author-name block"> 
						<?php the_author_meta( 'first_name' ); ?>  <?php the_author_meta( 'last_name' );  ?> 
							</strong>
							<small class="author-title"> 
								<?php the_author_meta('job_title'); ?>
							</small>
						</figcaption>
				</figure>
			</section>
			<time datetime="<?php  echo get_the_date('F j, Y'); ?>" class="post-date-single"><?php  echo get_the_date('F j, Y'); ?></time>
	<?php endif; ?>
		</div>
	</header>
	<article class="mk-single-content" itemprop="mainContentOfPage">
		<?php the_content(); ?>
	</article>
	<section class="single-post-tags">
		<?php if($mk_options['diable_single_tags'] == 'true' && get_post_meta( $post->ID, '_disable_tags', true ) != 'false') : ?>
			<?php the_tags(); ?>
		<?php endif; ?>
	</section>
	<?php
	if($mk_options['enable_blog_single_comments'] == 'true') {
		if ( get_post_meta( $post->ID, '_disable_comments', true ) != 'false' ) {
			comments_template( '', true );
		}
	}
	?>
	<?php endwhile; ?>
	</div>
</main>
<?php get_footer(); ?>