<?php
function alation_register_events() {
	$labels = array(
		'name'               => _x( 'Events', 'events general name', 'alation' ),
		'singular_name'      => _x( 'Event', 'events type singular name', 'alation' ),
		'add_new'            => _x( 'Add Event', 'event', 'alation' ),
		'add_new_item'       => __( 'Add Event', 'alation' ),
		'edit_item'          => __( 'Edit Event', 'alation' ),
		'new_item'           => __( 'Event', 'alation' ),
		'all_items'          => __( 'All Events', 'alation' ),
		'view_item'          => __( 'View Event', 'alation' ),
		'search_items'       => __( 'Search Events', 'alation' ),
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
		'rewrite'            => apply_filters( 'alation_events_posttype_rewrite_args', array(
			'feeds'      => true,
			'slug'       => 'events',
			'with_front' => true,
		) ),
		'capability_type'    => 'post',
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
	);

	register_post_type( 'event', apply_filters( 'alation_events_posttype_args', $args ) );
}
add_action( 'init', 'alation_register_events', 0 );
?>