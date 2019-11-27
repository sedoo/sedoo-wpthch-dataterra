<?php
/*
Template Name: Homepage
*/
// Description (slogan)
$description = get_bloginfo( 'description', 'display' );

get_header();
?>
<div id="primary" class="content-area wrapper-layout home-content">
    <main id="main" class="site-main">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <?php the_content(); ?>
        </div>
        <?php endwhile; endif; ?>

    </main><!-- #main -->

    <?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
    <aside id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
        <?php dynamic_sidebar( 'home_right_1' ); ?>


    </div><!-- #primary-sidebar -->
    <?php endif; ?>

</div><!-- #primary -->

<?php
/**
 * SUCCESS STORY AREA
 */
$args = array(
    'post_type'             => 'success-story',
    'post_status'           => array( 'publish' ),
    'posts_per_page'        => '1',           
    'orderby'               => 'date',
    'order'                 => 'DESC',
    // 'tax_query' => array(
    //     array(
    //         'taxonomy' => 'category',
    //         'field'    => 'slug',
    //         'terms'    => $terms,
    //     ),
    // ),
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {              
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        if (get_the_post_thumbnail_url(get_the_ID(), 'cover')) {
            $cover = get_the_post_thumbnail_url(get_the_ID(), 'cover');
        } else {
            $cover = get_header_image();
        }
        ?>
        <section id="success-story-area" style="background-image:url(<?php echo $cover; ?>);">
            <div class="wrapper-story">
                <h2><span>Success story</span></h2>
                <a class="post-preview" href="<?php the_permalink(); ?>">   
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt();?></p>

                    
                </a>
            </div>
        </section>
    <?php
    }
} 
/* Restore original Post Data */
wp_reset_postdata();
?>     

<?php
get_footer();