<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package labs_by_Sedoo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- <link href="https://fonts.googleapis.com/css?family=Cormorant+Infant:500|Montserrat:700|Poppins:200&display=swap" rel="stylesheet">  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700|Open+Sans:400,400i,600,700&display=swap" rel="stylesheet"> 
    
    <?php 
    wp_head(); 
    $page_id = get_queried_object_id();
    // $cover = get_the_post_thumbnail_url($page_id, 'cover');
    if (get_the_post_thumbnail_url($page_id, 'cover')) {
        $cover = get_the_post_thumbnail_url($page_id, 'cover');
    } else {
        $cover = get_header_image();
    }
    $title = get_the_title($page_id);
    ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'labs-by-sedoo' ); ?></a>

<header id="masthead" class="site-header " style="background-image:url(<?php if (!is_front_page()) { echo $cover; } else { header_image(); }?>);">
     <div class="wrapper">
            <div class="site-branding">
                <?php the_custom_logo(); ?>
            </div><!-- .site-branding -->
            <div class="nav-container">
                <?php if(wp_is_mobile()): ?>
                <nav id="primary-navigation" class="main-navigation">
                    <?php 
                    if (has_nav_menu('burger-menu')){
                        wp_nav_menu( array(
                            'theme_location' => 'burger-menu',
                            'menu_id'        => 'burger-menu',
                        ) );
                    } else{
                        wp_nav_menu( array(
                            'theme_location' => 'primary-menu',
                            'menu_id'        => 'primary-menu',
                        ) );                      
                    }  
                    ?>
                    <button class="burger">
                        <div class="burger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <label for="burger"><?php echo __('Menu', 'sedoo-wpth-labs'); ?></label>
                    </button>
                </nav>
                <?php else : ?>
                <?php if (has_nav_menu('primary-menu')) { ?>
                <nav id="primary-navigation" class="main-navigation">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary-menu',
                            'menu_id'        => 'primary-menu',
                        ) );
                    ?>
                    <button class="burger">
                        <div class="burger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <label for="burger"><?php echo __('Menu', 'sedoo-wpth-labs'); ?></label>
                    </button>
                </nav>
                <?php } ?>
                <?php if (has_nav_menu('burger-menu')) {?>
<!--
                    <nav id="burger-navigation" class="second-navigation">
                        <button class="burger">
                            <div class="burger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <label for="burger">Menu</label>
                        </button>
                        <div class="overlay">
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'burger-menu',
                                'menu_id'        => 'burger-menu',
                            ) );
                            ?>
                        </div>
                    </nav>
-->
                <?php 
                    }
                   endif;
                ?>
            </div>
            
            <div class="wrapper header-title">
            <?php if (is_front_page()) {
            ?>
                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                <?php
                if ( $description || is_customize_preview() ) { ?>
                <h2 class="site-description"><?php echo $description; ?></h2>
                    <?php
                }
                ?>
            <?php } else { ?>
                <h1 class="site-title"><?php echo $title ?>
                <?php if (get_field('dataterra_subtitle')) {
                    ?>
                    <small><?php the_field('dataterra_subtitle');?></small>
                <?php
                }
                ?>
                </h1>
                
            <?php

            }
                ?>
            </div>
            


        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
