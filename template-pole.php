<?php
/**
 * Template Name: Page de pôle
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

get_header();

?>

	<div id="primary" class="content-area pole">
		<main id="main" class="site-main">
            
            <div class="wrapper-content">
                <?php
                while ( have_posts() ) :
                    the_post();

                    if (get_field('dataterra_pole_logo')) { 
                        $image = get_field('dataterra_pole_logo');
                        $size = 'medium';
                        $thumb = $image['sizes'][ $size ];
                    ?>
                    <figure class="logo-pole">
                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                    </figure>
                    <?php }

                    get_template_part( 'template-parts/content', 'page' );
                    
                    if (get_field('dataterra_pole_link')) { 
                        $link = get_field('dataterra_pole_link');
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <div class="wp-block-button aligncenter">
                            <a class="wp-block-button__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        </div>
                    <?php }
                    

                endwhile; // End of the loop.
                ?>
            </div>
		</main><!-- #main -->
        <?php // table_content ( value )
        if (get_field( 'table_content' )):
        ?>
        <aside id="stickyMenu" 
               <?php if(wp_is_mobile()){ ?> 
                    class="" 
               <?php } else { ?> 
                    class="open" 
               <?php } ?>>
            <div>
                <div>
                    <p><?php echo __('Sommaire', 'sedoo-wpth-labs'); ?></p>
                    <nav role="sommaire">
                        <ol id="tocList">

                        </ol>
                    </nav>
                </div>
                <button class="bobinette">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                            <rect fill="none" width="30" height="30"/>
                            <polyline points="
                            10.71,2.41 23.29,15 10.71,27.59 	"/>
                    </svg> 
                </button>
            </div>
        </aside>
        <?php endif; ?>
	</div><!-- #primary -->
<?php

get_footer();
