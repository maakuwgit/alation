<?php
 global $user;
	
 $id = $user['ID'];
 
 $userdata = get_userdata($id);
 $name = $userdata->display_name;
 
 $avatar = get_user_meta( $id, 'wp_user_avatar', true );
 $avatar = (int) $avatar;
 $photo = wp_get_attachment_url($avatar);
 
 $description = get_user_meta( $id, 'description', true );
 $description_title = get_field('about_description_title');
 $twitter = get_user_meta( $id, 'twitter', true );
 $linkedin = get_user_meta( $id, 'linkedin', true );
 
 if($photo) {
	 $af = wp_get_attachment_image_src($avatar, 'fullsize');
	 $at = wp_get_attachment_image_src($avatar, 'thumbnail');
	 $am = wp_get_attachment_image_src($avatar, 'medium');
	 $al = wp_get_attachment_image_src($avatar, 'large');
	 $src = ' src="' . $at[0] . '" srcset="' . $at[0] . ' 150w, ' . $al[0]  . ' 300w"';
 }else{
	$src = ' src="http://via.placeholder.com/300x300" srcset=" http://via.placeholder.com/150x150 150w, http://via.placeholder.com/300x300 300w"';
 }
?>
<dl class="vcards cell small-12 medium-6 large-4">
	<dt>
		<figure>
			<div class="wpb_content_element text-center">
			<?php if( is_user_logged_in() ) echo '<a class="iblock" href="' . get_bloginfo('url') . '/wp-admin/user-edit.php?user_id=' . $id . '#wpua-add-existing">';?>
				<img width="300" height="300"<?php echo $src; ?> sizes="(max-width: 300px) 100vw, 300px">
			<?php if( is_user_logged_in() ) echo '</a>';?>
			</div>
			<figcaption class="mk-shortcode mk-fancy-title fancy-title-align-center simple-style exec-head">
				<?php if( is_user_logged_in() ) echo '<a href="' . get_bloginfo('url') . '/wp-admin/user-edit.php?user_id=' . $id . '#display_name">';?>
				<strong class="orange block"><?php echo $name; ?></strong><?php if( is_user_logged_in() ) echo '</a>';?> 
			<?php if( is_user_logged_in() ) echo '<a href="' . get_bloginfo('url') . '/wp-admin/user-edit.php?user_id=' . $id . '#job_title">';?>
				<?php echo get_user_meta( $id, 'job_title', true ); ?>
			<?php if( is_user_logged_in() ) echo '</a>';?>
			</figcaption>
		</figure>
	</dt>
	<dd class="mk-toggle simple-style">
	<?php if($description) : ?>
		<div class="mk-toggle-title">Bio</div>
		<div class="mk-toggle-pane">
			<?php echo $description; ?>
			<?php if( is_user_logged_in() ) echo '<a href="' . get_bloginfo('url') . '/wp-admin/user-edit.php?user_id=' . $id . '#description">[edit]</a>';?>
		</div>
	<?php endif; ?>
		<?php if ( '' !== $linkedin || '' !== $twitter ) : ?>
		<div class="mk-social-network-shortcode social-style-circle wrap medium">
			<ul>
				<?php if ( '' !== $twitter ) : ?>
				<li>
					<a target="_blank" class="twitter-hover" href="<?php echo $twitter; ?>">
						<i class="mk-jupiter-icon-twitter"></i>
					</a>
				</li>
				<?php endif; ?>
				<?php if ( '' !== $linkedin ) : ?>
				<li>
					<a target="_blank" class="linkedin-hover" href="<?php echo $linkedin; ?>">
						<i class="mk-jupiter-icon-linkedin"></i>
					</a>
				</li>
				<?php endif; ?>
			</ul>
		</div>
		<?php endif; ?>
	</dd>
</dl>