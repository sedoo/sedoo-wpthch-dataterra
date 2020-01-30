<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aeris
 */

get_header(); 

$format = get_post_format();
$categories = get_the_category();
$terms=array();
if (is_array($categories) || is_object($categories))
{
  foreach ($categories as $term_slug) {        
     array_push($terms, $term_slug->slug);
  }
}

while ( have_posts() ) : the_post();

$themes = get_the_terms( $post->ID, 'category');  
$themeSlugRewrite = "category";
?>
	<div id="primary" class="content-area <?php echo esc_html( $categories[0]->slug );?>">

        <div class="wrapper-layout">
            <main id="main" class="site-main">
                <article id="post-<?php the_ID();?>">	
                    <header>
                        <div>
                            <?php 
                            if( function_exists('sedoo_wpthch_dataterra_show_categories') ){
                            sedoo_wpthch_dataterra_show_categories($themes, $themeSlugRewrite);
                            }
                            ?>
                            <p class="post-meta"><?php the_date(); ?></p>
                        </div>
                    </header>
                    <section>
                        <?php the_content(); ?>
                    </section>
                    <?php if (get_field("sources")){ ?>
                    <footer class="sources">
                        <h2><?php echo __('Sources', 'sedoo-wpth-labs'); ?> :</h2>
                        <p><?php the_field("sources") ?></p>
                    </footer>
                    <?php } ?>
                </article>
            </main><!-- #main -->
            <?php 
            //get_template_part('template-parts/contextual-sidebar-single'); 
            get_sidebar();
            ?>
        </div>
        <footer class="wrapper single-footer">
            <?php
            // sedoo_wpthch_dataterra_postlist_by_term('Plus d\'actualités', );

            $args = array(
                'post_type'             => 'post',
                'post_status'           => array( 'publish' ),
                'posts_per_page'        => '3',           
                'post__not_in'          => array(get_the_ID()), 
                'orderby'               => 'date',
                'order'                 => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => $terms,
                    ),
                ),
            );

            $postsList = get_posts ($args);
    
            if ($postsList){       
            ?>
            <h2><?php echo __('Plus d\'actualités', 'sedoo-wpth-labs') ?></h2>
            <section role="listNews" class="post-wrapper">
                
                <?php

                foreach ($postsList as $post) :
                setup_postdata( $post );
                    ?>
                    <?php
                    get_template_part( 'template-parts/content', 'grid' );
                    ?>
                    <?php
                endforeach;
                ?>	
            </section>

            <?php
            } else {
                // no posts found
            }
            /* Restore original Post Data */
            wp_reset_postdata();
            ?>     
        </footer>
        <?php //get_template_part('template-parts/nav-box'); ?>
	</div><!-- #primary -->
<?php
endwhile; // End of the loop.
 
get_footer();
