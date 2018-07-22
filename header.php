<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Alation
 * @since 3.0
 * @version 3.2
 * @Dev need to move this JS before launch. ALL js should be enqueued. No JS in the DOM!
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="masthead" class="fixed fullwidth">
		<div class="wrap">
			<figure class="cell small-6 medium-2 large-5">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="iblock">
					<img class="logo" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-alation.png" width="121" height="55">
				</a>
			</figure>
			<?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
				<?php wp_nav_menu( array(
																'theme_location' => 'primary-menu',
																'container' => 'nav',
																'container_id' => false,
																'container_class' => 'main_menu cell small-12 medium-10 large-7',
																'menu_class' => 'main-navigation-ul wrap',
																'echo' => true,
																'fallback_cb' => 'link_to_menu_editor',
																'walker' => new alation_headernav_walker,
																	) ); ?>
				<nav class="show-for-phablet-down wrap small-6 align-end">
						<button data-menu-toggle>
	            <em class="mk-css-icon-menu-line-1"></em>
	            <em class="mk-css-icon-menu-line-2"></em>
	            <em class="mk-css-icon-menu-line-3"></em>
						</button>
				</nav>
			<?php endif; ?>
		</div>
	</header>
