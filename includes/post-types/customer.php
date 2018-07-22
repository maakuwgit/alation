<?php
function post_type_customer() {
	register_post_type('customer',
		array(
			'label' => __('Customers'),
			'singular_label' => __('Customer'),
			'public' => true,
			'show_ui' => true,
			'menu_icon' => 'dashicons-portfolio',
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array("slug" => "customer"),
			'query_var' => "customer",
			'supports' => array('title','thumbnail','page-attributes'),
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'has_archive' => 'customers',
			'show_in_rest' => false
		));
}
add_action('init', 'post_type_customer');

function customer_taxonomies() {
	register_taxonomy(
		'customer_industry',
		'customer',
		array(
			'labels' => array(
				'name' => 'Industry',
				'add_new_item' => 'Add Industry',
				'new_item_name' => "New Industry"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			'args' => array( 'orderby' => 'term_order' ),
			'rewrite' => array( 'slug' => 'customer-industry', 'with_front' => false ),
			'query_var'  => false,
			'capabilities' => array('manage_terms' => 'edit_pages')
		)
	);

	register_taxonomy(
		'customer_usecase',
		'customer',
		array(
			'labels' => array(
				'name' => 'Use Case',
				'add_new_item' => 'Add Use Case',
				'new_item_name' => "New Use Case"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			'args' => array( 'orderby' => 'term_order' ),
			'rewrite' => array( 'slug' => 'customer-usecase', 'with_front' => false ),
			'query_var'  => false,
			'capabilities' => array('manage_terms' => 'edit_pages')
		)
	);


	register_taxonomy(
		'customer_access',
		'customer',
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
			'rewrite' => array( 'slug' => 'composer-access', 'with_front' => false ),
			'query_var'  => false,
			'capabilities' => array('manage_terms' => 'edit_pages')
		)
	);

	/* register_taxonomy(
		'customer_size',
		'customer',
		array(
			'labels' => array(
				'name' => 'Size',
				'add_new_item' => 'Add Size',
				'new_item_name' => "New Size"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			'args' => array( 'orderby' => 'term_order' ),
			'rewrite' => array( 'slug' => 'customer-size', 'with_front' => false ),
			'query_var'  => false,
			'capabilities' => array('manage_terms' => 'edit_pages')
		)
	); */
}
add_action( 'init', 'customer_taxonomies', 10 );
