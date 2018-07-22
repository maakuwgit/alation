<?php
function alation_register_investors() {
	$labels = array(
		'name'               => _x( 'Investors', 'investors general name', 'alation' ),
		'singular_name'      => _x( 'Investor', 'investors type singular name', 'alation' ),
		'add_new'            => _x( 'Add New Investor', 'investors', 'alation' ),
		'add_new_item'       => __( 'Add New Investor', 'alation' ),
		'edit_item'          => __( 'Edit Investor', 'alation' ),
		'new_item'           => __( 'New Investor', 'alation' ),
		'all_items'          => __( 'All Investors', 'alation' ),
		'view_item'          => __( 'View Investor', 'alation' ),
		'search_items'       => __( 'Search Investors', 'alation' ),
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
		'rewrite'            => apply_filters( 'alation_investors_posttype_rewrite_args', array(
			'feeds'      => true,
			'slug'       => 'investors',
			'with_front' => true,
		) ),
		'capability_type'    => 'post',
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'page-attributes', 'thumbnail' ),
	);

	register_post_type( 'investor', apply_filters( 'alation_investors_posttype_args', $args ) );
}
add_action( 'init', 'alation_register_investors', 0 );
?>