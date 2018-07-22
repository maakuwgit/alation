<?php
function alation_register_news() {
	$labels = array(
		'name'               => _x( 'News', 'news general name', 'alation' ),
		'singular_name'      => _x( 'Article', 'news type singular name', 'alation' ),
		'add_new'            => _x( 'Add New Article', 'news', 'alation' ),
		'add_new_item'       => __( 'Add New Article', 'alation' ),
		'edit_item'          => __( 'Edit Article', 'alation' ),
		'new_item'           => __( 'New Article', 'alation' ),
		'all_items'          => __( 'All Articles', 'alation' ),
		'view_item'          => __( 'View Article', 'alation' ),
		'search_items'       => __( 'Search News', 'alation' ),
		'not_found'          => __( 'Nothing found', 'alation' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'alation' ),
		'parent_item_colon'  => '',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'can_export'         => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'has_archive'        => true,
		'rewrite'            => apply_filters( 'alation_news_posttype_rewrite_args', array(
			'feeds'      => true,
			'slug'       => 'news',
			'with_front' => true,
		) ),
		'capability_type'    => 'post',
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'page-attributes', 'editor', 'excerpt' ),
	);
	

	register_post_type( 'news', apply_filters( 'alation_news_posttype_args', $args ) );
}
add_action( 'init', 'alation_register_news', 0 );

function alation_register_news_outlets() {
	$labels = array(
		'name'              => _x( 'Outlets', 'taxonomy general name', 'alation' ),
		'singular_name'     => _x( 'Outlets', 'taxonomy singular name', 'alation' ),
		'search_items'      => __( 'Search News Outlets', 'alation' ),
		'all_items'         => __( 'All News Outlets', 'alation' ),
		'parent_item'       => __( 'Parent Outlet', 'alation' ),
		'parent_item_colon' => __( 'Parent Outlet:', 'alation' ),
		'edit_item'         => __( 'Edit Outlet', 'alation' ),
		'update_item'       => __( 'Update Outlet', 'alation' ),
		'add_new_item'      => __( 'Add New Outlet', 'alation' ),
		'new_item_name'     => __( 'News Outlet Name', 'alation' ),
		'menu_name'         => __( 'Outlet', 'alation' ),
	);
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'outlet' ),
		'capabilities' => array(
			'manage_terms' => 'edit_pages'
		),
	);
	
	register_taxonomy( 'outlets', array( 'news' ), $args );
}
add_action( 'init', 'alation_register_news_outlets', 0 );
?>