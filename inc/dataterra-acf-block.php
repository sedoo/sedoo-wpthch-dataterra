<?php
/**
 * ACF gutenberg Block
 */

function sedoo_wpthch_dataterra_register_acf_block_types() {

    // register a post list block.
    acf_register_block_type(array(
        'name'              => 'postlist',
        'title'             => __('Sedoo Post list block'),
        'description'       => __('List post by categories and choose layout.'),
        'render_template'   => 'template-parts/blocks/sedoo-post-list/sedoo-post-list.php',
        'category'          => 'widgets',
        'icon'              => 'grid-view',
        'keywords'          => array( 'post', 'grid', 'categories' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'sedoo_wpthch_dataterra_register_acf_block_types');
}

/** 
 * ACF OPTIONS PAGES 
 */
function sedoo_wpthch_dataterra_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Data Terra General Settings'),
            'menu_title'    => __('DT Theme Settings'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}
if( function_exists('acf_add_options_page') ) {
    add_action('acf/init', 'sedoo_wpthch_dataterra_acf_op_init');
}

?>