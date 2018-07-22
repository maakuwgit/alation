<?php
function alation_register_press_release() {
	$labels = array(
		'name'               => _x( 'Press Releases', 'press release general name', 'alation' ),
		'singular_name'      => _x( 'Release', 'press release type singular name', 'alation' ),
		'add_new'            => _x( 'Add New Release', 'press release', 'alation' ),
		'add_new_item'       => __( 'Add New Release', 'alation' ),
		'edit_item'          => __( 'Edit Release', 'alation' ),
		'new_item'           => __( 'New Release', 'alation' ),
		'all_items'          => __( 'All Press Releases', 'alation' ),
		'view_item'          => __( 'View Release', 'alation' ),
		'search_items'       => __( 'Search Press Releases', 'alation' ),
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
		'rewrite'            => apply_filters( 'alation_press_release_posttype_rewrite_args', array(
			'feeds'      => true,
			'slug'       => 'press_releases',
			'with_front' => true,
		) ),
		'capability_type'    => 'post',
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' ),
	);

	register_post_type( 'press_release', apply_filters( 'alation_press_release_posttype_args', $args ) );
}
add_action( 'init', 'alation_register_press_release', 0 );
?>