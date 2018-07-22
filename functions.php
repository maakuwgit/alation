<?php

function alation_setup() {/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	// Custom Post Types
//	require get_parent_theme_file_path( '/inc/post-types.php' );
	require_once('includes/post-types/resource.php');
	require_once('includes/post-types/customer.php');
	require_once('includes/post-types/investor.php');
	require_once('includes/post-types/events.php');
	require_once('includes/post-types/news.php');
	require_once('includes/post-types/press_release.php');
	
	// Custom Walker
	require_once('includes/primary-nav-walker.php');
	
	// Elements
	require_once('includes/element-button.php');
}
add_action( 'after_setup_theme', 'alation_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alation_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Social', 'alation' ),
		'id'            => 'sidebar-social',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>'
	) );
	
	register_sidebar( array(
		'name'          => __( 'Contact', 'alation' ),
		'id'            => 'sidebar-contact',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>'
	) );
	
	register_sidebar( array(
		'name'          => __( 'Location', 'alation' ),
		'id'            => 'sidebar-location',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>'
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'alation' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Lorem Ipsum', 'alation' ),
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>'
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'alation' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Lorem Ipsum', 'alation' ),
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>'
	) );
}
add_action( 'widgets_init', 'alation_widgets_init' );

/**
 * Enqueue Files
 */
function theme_enqueue_scripts() {
  $type = get_post_type();
	$template = get_page_template_slug();
	$theme_uri = get_stylesheet_directory_uri();
	
	// Theme JS.
	wp_enqueue_script( 'global-js', $theme_uri . '/global.js', array(), '1.0.1', true );	
	
	//Header
	wp_enqueue_script('header-js', $theme_uri . '/assets/js/application/components/header.js', array('jquery'), '0.6', true);
	
//	wp_enqueue_script( 'hero-js', $theme_uri . '/assets/js/application/components/hero.js', array(), '1.0.1', true );	
	
	//AddThis
	wp_register_script('addthis', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56004ef3ccf9f214', array('jquery'), '1', true);
	
	//Map
	wp_register_script('mapbox-js', 'https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.js', array('jquery'), '2.1.5', true);
	wp_register_script('widget-mapbox', $theme_uri . '/assets/js/widgets/widget-mapbox.js', array('jquery', 'mapbox-js'), '2.1.5', true);
	wp_register_style('mapbox-css', 'https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.css', array(), '2.1.5');
	
	if( is_archive() ){
		wp_enqueue_script('blog-js', $theme_uri . '/assets/js/plugins/featured-image.js', array('jquery'), '0.2', true);
	}
	
	//Scripts based on the post type
	switch( $type ) {	
		case 'resource' :
			wp_enqueue_script('resource-js', $theme_uri . '/assets/js/application/pages/resource.js', array('jquery'), '0.3', true);
		break;
		case 'event' :
			wp_enqueue_script('event-js', $theme_uri . '/assets/js/application/pages/event.js', array('jquery'), '0.1', true);
		break;
		default:
		break;
	}
	
	//Scripts based on the template type
	switch( $template ) {
		case 'template-about.php' :
			//About Page
			wp_enqueue_script( 'mapbox-js' );
			wp_enqueue_script( 'widget-mapbox' );
			wp_enqueue_style( 'mapbox-css' );
			wp_enqueue_script('about-js', $theme_uri . '/assets/js/application/pages/about.js', array('jquery'), '0.1', true); 
		break;
		case 'template-careers.php' :
			//Careers Page
			wp_enqueue_script('careers-js', $theme_uri . '/assets/js/widgets/widget-careers.js', array('jquery'), '0.3', true);
		break;
		default;
		break;
	}
	
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

// Input Bugherd
function add_bugherd_script() { ?>
	<script type='text/javascript'>
	(function (d, t) {
	  var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
	  bh.type = 'text/javascript';
	  bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=qirffrl3nechchijdtppjq';
	  s.parentNode.insertBefore(bh, s);
	  })(document, 'script');
	</script>
<?php }
add_action( 'wp_footer', 'add_bugherd_script' );


/**
 * Add page slug to body_class() classes if it doesn't exist
 */
function theme_body_class($classes) {
  // Add post/page slug
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = get_post_type() ."-". basename(get_permalink());
    }
  }
  return $classes;
}
add_filter('body_class', 'theme_body_class');

/**
 * Modifies roles to add a level equal to "Administrator" called "Executive" that we'll use in the template about that can edit their profile and other profiles only
 * @since Alation 2.1
 *
 */
function alation_roles() {
	//Can do anything with users
	add_role( 'exec', 
						'Executive', 
						array( 	'read' => true, 
										'create_users' => true,
										'delete_users' => true,
										'edit_users' => true,
										'list_users' => true,
										'promote_users' => true,
										'remove_users' => true ) );
}
/*Dev note: this needs a different hook. fails on first install, because you're not actually CHANGING themes*/
add_action('switch_theme', 'alation_roles');


if ( ! function_exists( 'alation_user_fields' ) ) :
/**
 * Create additional User fields
 *
 * @since Alation 2.1
 * @author MaakuW
 *
 */
  function alation_user_fields( $user ) { ?>
  <h3>Job Title</h3>
  <table class="form-table">
  	<tr class="form-required">
			<th scope="row"><label for="job_title">Title <span class="description">(required)</span></label></th>
			<td><input class="regular-text ltr" name="job_title" type="text" id="job_title" value="<?php echo esc_attr( get_the_author_meta( 'job_title', $user->ID ) ); ?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60"></td>
		</tr>
  </table>
  <h3>Order</h3>
  <table class="form-table">
  	<tr class="form-required">
			<th scope="row"><label for="order">Order</label></th>
			<td><input name="order" type="number" id="order" value="<?php echo esc_attr( get_the_author_meta( 'order', $user->ID ) ); ?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="3" min="1" style="width:50px;"></td>
		</tr>
  </table>
<?php
	}
  add_action( 'show_user_profile', 'alation_user_fields' );
  add_action( 'edit_user_profile', 'alation_user_fields' );
endif;

if ( ! function_exists( 'alation_save_user_fields' ) ) :

  function alation_save_user_fields( $user_id ) {
  	if ( !current_user_can( 'edit_user', $user_id ) )
      return false;

  	update_usermeta( $user_id, 'job_title', $_POST['job_title'] );
  	update_usermeta( $user_id, 'order', $_POST['order'] );
  }
	
	add_action( 'personal_options_update', 'alation_save_user_fields' );
  add_action( 'edit_user_profile_update', 'alation_save_user_fields' );
endif;