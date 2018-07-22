<?php
function post_type_resource() {
	register_post_type('resource',
		array(
			'label' => __('Resources'),
			'singular_label' => __('Resource'),
			'public' => true,
			'show_ui' => true,
			'menu_icon' => 'dashicons-portfolio',
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array("slug" => "resource"),
			'query_var' => "resource",
			'supports' => array('title','thumbnail','page-attributes', 'editor'),
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'has_archive' => 'resources',
			'show_in_rest' => false
		));
}
add_action('init', 'post_type_resource');


function resource_taxonomies() {
	register_taxonomy(
		'resource_topic',
		'resource',
		array(
			'labels' => array(
				'name' => 'Topics',
				'add_new_item' => 'Add Topic',
				'new_item_name' => "New Topic"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			'args' => array( 'orderby' => 'term_order' ),
			'rewrite' => array( 'slug' => 'resource-topic', 'with_front' => false ),
			'query_var'  => false,
			'capabilities' => array('manage_terms' => 'edit_pages')
		)
	);

	register_taxonomy(
		'resource_type',
		'resource',
		array(
			'labels' => array(
				'name' => 'Types',
				'add_new_item' => 'Add Type',
				'new_item_name' => "New Type"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			'args' => array( 'orderby' => 'term_order' ),
			'rewrite' => array( 'slug' => 'resource-type', 'with_front' => false ),
			'query_var'  => false,
			'capabilities' => array('manage_terms' => 'edit_pages')
		)
	);

	register_taxonomy(
		'resource_access',
		'resource',
		array(
			'labels' => array(
				'name' => 'Access',
				'add_new_item' => 'Add Access',
				'new_item_name' => "New Access"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			'args' => array( 'orderby' => 'term_order' ),
			'rewrite' => array( 'slug' => 'resource-access', 'with_front' => false ),
			'query_var'  => false,
			'capabilities' => array('manage_terms' => 'edit_pages')
		)
	);
}
add_action( 'init', 'resource_taxonomies', 10 );
