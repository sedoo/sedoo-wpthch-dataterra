<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aeris
 */

get_header(); 

get_template_part( 'template-parts/header-content', 'archive' );

$categories = get_the_terms( $post->ID, 'category');  

?>

	<div id="content-area" class="wrapper wrapper-1240 archives">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

			<section role="listNews" class="post-wrapper">
				
			<?php
				while ( have_posts() ) : the_post();
				?>
				<?php
					get_template_part( 'template-parts/content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				<?php
				endwhile; // End of the loop.
				?>				
			</section>
			<?php 
				the_posts_navigation();
				?>
			<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
		
		</main><!-- #main -->
	</div><!-- #content-area -->
<?php
get_footer();
?>

