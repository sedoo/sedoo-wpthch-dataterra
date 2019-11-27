<?php
/**
 * Registers the `data-terra-success-story` post type.
 */
function sedoo_wpthch_dataterra_cpt_init() {
	register_post_type( 'success-story', array(
		'labels'                => array(
			'name'                  => __( 'Success stories', 'sedoo-wpthch-dataterra' ),
			'singular_name'         => __( 'Success story', 'sedoo-wpthch-dataterra' ),
			'all_items'             => __( 'All Success stories', 'sedoo-wpthch-dataterra' ),
			'archives'              => __( 'Success story Archives', 'sedoo-wpthch-dataterra' ),
			'attributes'            => __( 'Success story Attributes', 'sedoo-wpthch-dataterra' ),
			'insert_into_item'      => __( 'Insert into Success story', 'sedoo-wpthch-dataterra' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Success story', 'sedoo-wpthch-dataterra' ),
			'featured_image'        => _x( 'Featured Image', 'data-terra-success-story', 'sedoo-wpthch-dataterra' ),
			'set_featured_image'    => _x( 'Set featured image', 'data-terra-success-story', 'sedoo-wpthch-dataterra' ),
			'remove_featured_image' => _x( 'Remove featured image', 'data-terra-success-story', 'sedoo-wpthch-dataterra' ),
			'use_featured_image'    => _x( 'Use as featured image', 'data-terra-success-story', 'sedoo-wpthch-dataterra' ),
			'filter_items_list'     => __( 'Filter Success stories list', 'sedoo-wpthch-dataterra' ),
			'items_list_navigation' => __( 'Success stories list navigation', 'sedoo-wpthch-dataterra' ),
			'items_list'            => __( 'Success stories list', 'sedoo-wpthch-dataterra' ),
			'new_item'              => __( 'New success story', 'sedoo-wpthch-dataterra' ),
			'add_new'               => __( 'Add New', 'sedoo-wpthch-dataterra' ),
			'add_new_item'          => __( 'Add New success story', 'sedoo-wpthch-dataterra' ),
			'edit_item'             => __( 'Edit success story', 'sedoo-wpthch-dataterra' ),
			'view_item'             => __( 'View success story', 'sedoo-wpthch-dataterra' ),
			'view_items'            => __( 'View Success stories', 'sedoo-wpthch-dataterra' ),
			'search_items'          => __( 'Search Success stories', 'sedoo-wpthch-dataterra' ),
			'not_found'             => __( 'No Success stories found', 'sedoo-wpthch-dataterra' ),
			'not_found_in_trash'    => __( 'No Success stories found in trash', 'sedoo-wpthch-dataterra' ),
			'parent_item_colon'     => __( 'Parent success story:', 'sedoo-wpthch-dataterra' ),
			'menu_name'             => __( 'Success stories', 'sedoo-wpthch-dataterra' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
        'menu_position'         => 30,
        'taxonomies'                => array( 'category' ),
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-awards',
		'show_in_rest'          => true,
		'rest_base'             => 'success-story',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'sedoo_wpthch_dataterra_cpt_init' );


?>