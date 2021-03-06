<?php
add_action( 'wp_enqueue_scripts', 'sedoo_wpthch_dataterra_theme_enqueue_styles' );
function sedoo_wpthch_dataterra_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'), false );

}

function sedoo_wpthch_dataterra_widgets_init() {
    
    register_sidebar( array(
		'name'          => 'Footer menu 1',
		'id'            => 'footer_menu_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
		'name'          => 'Footer menu 2',
		'id'            => 'footer_menu_2',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
		'name'          => 'Footer menu 3',
		'id'            => 'footer_menu_3',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'sedoo_wpthch_dataterra_widgets_init' );


function sedoo_wpthch_dataterra_postlist_by_term($title, $term, $layout, $limit, $offset, $buttonLabel, $button) {
    global $post;
    
    $argsListPost = array(
        'posts_per_page'   => $limit,
        'offset'           => $offset,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'suppress_filters' => true 
    );

    if ($term !== "all") {
        $argsListPost['tax_query'] = array(
                        array(
                            "taxonomy" => "category",
                            "field"    => "slug",
                            "terms"    => $term,
                        )
                        );
        $url = get_term_link($term, 'category');
        } else {
        $url = get_permalink( get_option( 'page_for_posts' ) );
        }

    switch ($layout) {
        case "grid" :
            $listingClass = "post-wrapper";
            break;

        case "grid-noimage" :
            $listingClass = "post-wrapper noimage";
            break;

        default:
            $listingClass = "content-list";
    }    

    $postsList = get_posts ($argsListPost);
    
    if ($postsList){       
    ?>
    <h2><?php echo __($title, 'sedoo-wpth-labs') ?></h2>
    <section role="listNews" class="<?php echo $listingClass;?>">
        
        <?php

        foreach ($postsList as $post) :
          setup_postdata( $post );
            ?>
            <?php
            get_template_part( 'template-parts/content', $layout );
            ?>
            <?php
        endforeach;
        ?>	
    </section>
    <?php if ($button == 1) { ?>    
        <div class="wp-block-button aligncenter">
            <a href="<?php echo $url; ?>" class="wp-block-button__link btn"><?php echo $buttonLabel; ?></a>
        </div>
    <?php
        }
    ?>
    
    <?php 
    the_posts_navigation();
    wp_reset_postdata();
    }
}

/****
 * DEFAULT IMAGE ATTACHMENT SETTINGS
 */

add_action( 'after_setup_theme', 'sedoo_wpthch_dataterra_default_image_settings' );

function sedoo_wpthch_dataterra_default_image_settings() {
    update_option( 'image_default_align', 'center' );
    update_option( 'image_default_link_type', 'none' );
    update_option( 'image_default_size', 'medium' );
}

/**
 * TAG CLOUD LIMIT HOOK
 */

//Register tag cloud filter callback
add_filter('widget_tag_cloud_args', 'sedoo_wpthch_dataterra_tag_widget_limit');
 
//Limit number of tags inside widget
function sedoo_wpthch_dataterra_tag_widget_limit($args){
 
 //Check if taxonomy option inside widget is set to tags
 if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
  $args['number'] = 0; //Limit number of tags
 }
 
 return $args;
}

/******************************************************************
 * Afficher les archives des custom taxonomies
 * $categories = get_the_terms( $post->ID, 'category');  
 */

function sedoo_wpthch_dataterra_show_categories($categories, $slugRewrite) {
 
    if( $categories ) {
    ?>
    <div class="tag">
    <?php
        foreach( $categories as $categorie ) { 
            if ($categorie->slug !== "non-classe") {
                // if ( "en" == pll_current_language()) {
                //     echo '<a href="'.site_url().'/'.pll_current_language().'/'.$slugRewrite.'/'.$categorie->slug.'" class="'.$categorie->slug.'">';
                // } else {
                    echo '<a href="'.site_url().'/'.$slugRewrite.'/'.$categorie->slug.'" class="'.$categorie->slug.'">';
                // }
                echo $categorie->name; 
                ?>                    
            </a>
    <?php 
            }
        }
    ?>
    </div>
  <?php
      } 
  }


function sedoo_wpthch_dataterra_custom_scripts() {
    wp_enqueue_script( 'dataterra-anim-js', get_stylesheet_directory_uri() . '/js/anim.js', array( 'jquery' ),'',true );
}
add_action( 'wp_enqueue_scripts', 'sedoo_wpthch_dataterra_custom_scripts' );

/***
 * REGISTER MENU AREA
 */

// register_nav_menus(array('footer-menu' => 'Navigation footer'));

/**
 * Include ACF Fields
 */
require 'inc/dataterra-acf-config.php';
require 'inc/dataterra-acf-block.php';
require 'inc/dataterra-custom-post.php';




?>