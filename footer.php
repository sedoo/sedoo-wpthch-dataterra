<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package labs_by_Sedoo
 */
$options_list_footer = get_field('list_choice', 'option');

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="wrapper-layout">
            <div><!--footer menus-->
                <?php if ( is_active_sidebar( 'footer_menu_1' ) ) : ?>
                <div class="footer-menu widget-area" id="footer_menu_1" role="complementary">
                    <?php dynamic_sidebar( 'footer_menu_1' ); ?>
                </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer_menu_2' ) ) : ?>
                <div class="footer-menu widget-area" id="footer_menu_2" role="complementary">
                    <?php dynamic_sidebar( 'footer_menu_2' ); ?>
                </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer_menu_3' ) ) : ?>
                <div class="footer-menu widget-area" id="footer_menu_3" role="complementary">
                    <?php dynamic_sidebar( 'footer_menu_3' ); ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="social-partenaires">
                 <?php if( have_rows('reseaux_sociaux', 'option') ): ?>
                <div class="social-list">
                    <ul class="inline-list">
                    <?php while( have_rows('reseaux_sociaux', 'option') ): the_row(); 
                        // vars
                        $link = get_sub_field('lien_reseau_social', 'option');
                        ?>
                        <li class="list">
                            <?php if( $link ): ?>
                                <a href="<?php echo $link; ?>">
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php 
                 if(get_field('sedoo_labs_footer_replace_logo', 'option') == true) {
                    if(get_field('sedoo_labs_footer_url_image', 'option')) { 
                        echo '<a class="footer_img" href="'.get_field('sedoo_labs_footer_url_image', 'option').'">';
                    }
                        ?>
                        <figure>
                            <img alt="" class=" object-fit-contain" src="<?php echo get_field('sedoo_labs_image_in_footer', 'option'); ?>" >
                        </figure>
                        <?php 
                    if(get_field('sedoo_labs_footer_url_image', 'option')) { 
                        echo '</a>';
                    }
                } else {
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
                }
                ?>
                <img class="object-fit-contain" src="<?php echo $image[0]; ?>" alt="" />
                
            </div>
        </div>

        <?php if( have_rows('partenaires', 'option') ): ?>
            <div class="partners-list">
                <ul id="partners-sidebar" class="inline-list wrapper-layout" role="complementary">
                <?php while( have_rows('partenaires', 'option') ): the_row(); 

                    // vars
                    $link = get_sub_field('lien_partenaire', 'option');
                    $logo = get_sub_field('logo_partenaire', 'option');

                    ?>

                    <li class="list">

                        <?php if( $link ): ?>
                            <a href="<?php echo $link; ?>">
                        <?php endif; ?>
                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt'] ?>" />
                        <?php if( $link ): ?>
                            </a>
                        <?php endif; ?>

                    </li>

                <?php endwhile; ?>

                </ul>
            </div>
        <?php endif; ?>
        <?php if (has_nav_menu('mentions-menu') || get_field('footer_show_copyright', 'option') ) { ?>
            <div class="copyright">
                <div class="site-info wrapper">
                    <?php if (has_nav_menu('mentions-menu')) { 
                    ?>
                    <nav>
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'mentions-menu',
                            'menu_id'        => 'mentions-menu',
                        ) );
                    ?>
                    </nav>
                    <?php
                    } ?>                    
                    <?php 
                    // show copyright
                    if (get_field('footer_show_copyright', 'option')) {
                        ?>
                        <p>
                        <?php echo get_field('footer_copyright_text', 'option');?> - <a href="https://www.sedoo.fr" title="Visit Sedoo website">SEDOO (<?php echo __('Data service OMP', 'sedoo-wpth-labs');?>)</a>
                        </p>
                    <?php
                    }
                    ?>    
                </div><!-- .site-info -->
            </div>
        <?php } ?>  
	</footer><!-- #colophon -->
    <?php
    if ( wp_is_mobile() ) {
    // end div mp-pusher    
    ?>
    </div> 
    <?php } ?>
</div><!-- #page -->

<?php wp_footer(); 
if (wp_is_mobile() ) {
?>
<script>
new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {type : 'cover'} );
</script>
<?php
}
?>   
</body>
</html>
