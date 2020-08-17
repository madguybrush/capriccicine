<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
//$container   = get_theme_mod( 'understrap_container_type' );
?>



			<!-- Do the left sidebar check -->
			<?php //get_template_part( 'global-templates/left-sidebar-check' ); ?>

		

				<?php while ( have_posts() ) : the_post(); ?>

					<?php 
					if(in_category('noticias')){
       					 get_template_part('loop-templates/content','noticias');
    				}else{
     					   get_template_part( 'loop-templates/content', 'peliculas' ); 
    				}
					
					?>

						<?php //understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					//if ( comments_open() || get_comments_number() ) :
					//	comments_template();
					//endif;
					?>

				<?php endwhile; // end of the loop. ?>

		

		<!-- Do the right sidebar check -->
		<?php //get_template_part( 'global-templates/right-sidebar-check' ); ?>



<?php get_footer(); ?>
