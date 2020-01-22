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
    $query_object = get_queried_object();

    // echo $query_object->post_type;
    //  var_dump($query_object);

    // IF SINGLE
    if ($query_object->post_type) {
        $page_id = get_queried_object_id();
    }
    if (get_the_post_thumbnail_url(get_queried_object_id(), 'cover')) {
        $cover = get_the_post_thumbnail_url(get_queried_object_id(), 'cover');
    } else {
        $cover = get_header_image();
    }

    // IF TERM TAX ARCHIVE
    if ($query_object->term_id) {
        $title= $query_object->name;
        if (get_field( 'tax_image', $query_object)) {
            $coverfield = get_field( 'tax_image', $query_object);
            $cover=$coverfield['url'];
        } else {
            $cover = get_header_image();
        }
        
    } elseif ($query_object->name) {
        $title = $query_object->label;
    } else {
        $title = get_the_title($page_id);
    }
    
    $logo= get_custom_logo();
    // var_dump($logo);

    ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'labs-by-sedoo' ); ?></a>

<header id="masthead" class="site-header<?php if (!is_front_page()) { echo " wrapper"; } if (is_page_template("template-pole.php")) { echo " cover-pole"; }?>" style="background-image:url(<?php if (is_page_template("template-pole.php")) { echo $cover; } if (is_front_page()) { header_image(); }?>);">
     <div class="wrapper">
        <div id="headerTop">
            <div class="site-branding">
                <?php the_custom_logo(); ?>
            </div><!-- .site-branding -->
            <div class="nav-container">
                <?php if(wp_is_mobile()) { ?>
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
                <?php } else { ?>
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
                }
                ?>
            
            </div>
        </div>
        <div class="wrapper header-title" style="background-image:url(<?php if (!is_page_template("template-pole.php") && !is_front_page()) { echo $cover; }?>);">
            <?php if (is_front_page()) {
            ?>
                <h1 class="site-title screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
                <?php
                // $description = ;
                if ( !empty(get_bloginfo( 'description' )) ) { ?>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                <?php } ?>

                <?php if (get_field('dataterra_home_description', $page_id)) { ?>
                    <p><?php the_field('dataterra_home_description', $page_id);?></p>
                <?php } ?>

                <div id="home-button">

                    <?php if (get_field('dataterra_home_link1', $page_id)) {
                    $link = get_field('dataterra_home_link1', $page_id);
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <div>
                        <a class="homelink1" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    </div>
                    <?php } ?>

                    <?php if (get_field('dataterra_home_link2', $page_id)) { 
                    $link = get_field('dataterra_home_link2', $page_id);
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <div>
                        <a class="homelink2" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    </div>
                    <?php } ?>

                </div>                
            <?php } else { ?>
                <h1 class="site-title"><?php echo $title; ?>  

                <?php if (get_field('dataterra_pole_subtitle', $page_id)) {  ?>
                    <small><?php the_field('dataterra_pole_subtitle', $page_id);?></small>
                <?php } ?>

                </h1>

                <?php if (get_field('dataterra_pole_link', $page_id)) { 
                $link = get_field('dataterra_pole_link', $page_id);
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <div>
                    <a class="homelink1" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                </div>
                <?php } ?>            

            <?php } ?>
            </div>
            


        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
