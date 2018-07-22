<?php
$thumb 		= get_the_post_thumbnail_url($post);

 if($thumb) {
	 $tm = get_the_post_thumbnail_url($post, 'medium');
	 $tl = get_the_post_thumbnail_url($post, 'large');
	 $tf = get_the_post_thumbnail_url($post, 'fullsize');
	 $src = ' src="' . $tm . '" srcset="' . $tm . ' 150w, ' .  $tl . ' 300w, ' . $tf . ' 1000w"';
 }else{
	 $tm = '//via.placeholder.com/600x600';
	 $tl = '//via.placeholder.com/640x640';
	 $tf = '//via.placeholder.com/1000x1000';
	$src = ' src="//via.placeholder.com/600x600" srcset="//via.placeholder.com/320x320 150w, //via.placeholder.com/640x640 300w, //via.placeholder.com/1000x1000 1000w"';
 }
 
 $title = get_the_author_meta( 'job_title' );
 $meta = get_user_meta(get_the_author_meta('ID'));
 $avatar = $meta["wp_user_avatar"];
 $avatar = (int) $avatar[0];
 $photo = wp_get_attachment_url($avatar);
 
 if($photo) {
	 $af = wp_get_attachment_image_src($avatar, 'fullsize');
	 $at = wp_get_attachment_image_src($avatar, 'thumbnail');
	 $am = wp_get_attachment_image_src($avatar, 'medium');
	 $al = wp_get_attachment_image_src($avatar, 'large');
	 $src_avatar = ' src="' . $at[0] . '" srcset="' . $at[0] . ' 150w, ' . $al[0]  . ' 300w"';
 }else{
	$src_avatar = ' src="//via.placeholder.com/300x300" srcset=" //via.placeholder.com/150x150 150w, //via.placeholder.com/300x300 300w"';
 }
?>	
<article id="<?php get_the_ID();?>" class="mk-blog-newspaper-item newspaper-<?php get_the_ID();?> mk-isotop-item isotope-item">
	<div class="blog-item-holder">
		<h2 class="the-title">
			<?php echo the_title(); ?>
		</h2>
		<h3 class="subtitle-list"></h3>
		<figure class="featured-image" data-background>
			<a title="<?php echo get_the_title(); ?>" href="<?php echo get_the_permalink(); ?>" class="block">
				<div class="feature">
					<img alt="" title="<?php echo get_the_title(); ?>"<?php echo $src; ?> data-src-medium="<?php echo $tm;?>" data-src-large="<?php echo $tl;?>" data-src-xlarge="<?php echo $tf;?>">
				</div>
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge" href="<?php echo get_the_permalink(); ?>">
					<i class="mk-li-image"></i>
				</div>
			</a>
		</figure>
		<div class="author-time-list">
			<figure class="author-list">
				<img alt=""<?php echo $src_avatar;?>>
				<figcaption class="author-info-list">
					<div class="author-name"><?php the_author();?></div>
					<div class="author-title"><?php echo $title; ?></div>
				</figcaption>
			</figure>
			<time datetime="<?php echo get_the_date('m d, Y'); ?>">
				<div class="day-blog-list"><?php echo get_the_date('d'); ?></div> 
				<div class="extra-date">
					<div class="month-blog-list sub-date-item"><?php echo get_the_date('M'); ?></div> <div class="year-blog-list sub-date-item"> <?php echo get_the_date('Y'); ?></div>
				</div>
			</time>
		</div>
		<div class="mk-blog-meta">
			<div class="the-excerpt">
				<?php the_excerpt(); ?>
			</div>
		</div>
		<div class="newspaper-item-footer">
			<div class="newspaper-item-footer-holder">
				<a class="mk-readmore" href="<?php echo get_the_permalink(); ?>">Read More&hellip;</a>
				<?php edit_post_link( __('&nbsp; Edit') ); ?>
				<?php $comments = get_comments('post_id='.get_the_ID()); ?>
				<span class="newspaper-item-comment newspapre-footer-icons"><i class="mk-moon-bubble-9"></i> <?php echo count($comments[0]); ?></span><span class="newspaper-item-share newspapre-footer-icons"><i class="mk-moon-share-2"></i></span>
				<div class="clearboth"></div>
			</div>
			<?php foreach( $comments as $comment) : ?>
			<ul class="newspaper-comments-list">
				<li>
					<?php echo get_avatar($comment->ID, 35, '','',[35,35,false,'PG','','photo avatar-default avatar avatar-' . $comment->user_id . ' wp-user-avatar wp-user-avatar-' . $comment->user_id]);?>
					<span class="comment-author"><a href="<?php echo $comment->comment_author_url;?>"><?php echo $comment->comment_author;?></a></span>
					<span class="comment-content"><?php echo $comment->comment_content;?></span>
					<div class="clearboth"></div>
				</li>
				<?php endforeach; ?>
			</ul>
			<ul class="newspaper-social-share">
				<li>
					<a class="facebook-share" data-title="<?php echo get_the_title(); ?>" data-url="<?php echo get_the_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-facebook"></i></a>
				</li>
				<li>
					<a class="twitter-share" data-title="<?php echo get_the_title(); ?>" data-url="<?php echo get_the_permalink(); ?>" href="#"><i class="mk-moon-twitter"></i></a>
				</li>
				<li>
					<a class="googleplus-share" data-title="<?php echo get_the_title(); ?>" data-url="<?php echo get_the_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-googleplus"></i></a>
				</li>
				<li><!--http://alation.dev/wp-content/uploads/2016/11/alation_illustrations_Final-15-cp-01.png-->
					<a class="pinterest-share" data-image="<?php echo get_field(' post_pinterest '); ?>" data-title="<?php echo get_the_title(); ?>" data-url="<?php echo get_the_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-pinterest"></i></a>
				</li>
				<li>
					<a class="linkedin-share" data-desc="" data-title="<?php echo get_the_title(); ?>" data-url="<?php echo get_the_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-linkedin"></i></a>
				</li>
			</ul>
		</div>
	</div>
</article>