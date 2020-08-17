<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

		
<div id="agenda">

	<header class="container-fluid">
		<div class="row">
			<div class="col-lg-11 offset-lg-1 "> <!-- col-md-10 offset-md-1-->
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</header>
	<div class="container-fluid content">
		<div class="row">
			<div class="col-lg-10 offset-lg-1"> <!-- col-md-10 offset-md-1-->

				<?php //the_content(); ?>

				<?php if (get_field('mentions_legales')){ ?>
					<h3>MENTIONS LEGALES</h3>
					<div style="font-family: 'Lora', serif;"><?php echo get_field('mentions_legales'); ?></div>
				<?php } ?>

				<?php //if (get_field('conditions')){ ?>
						
					<?php //echo get_field('conditions'); ?>
				<?php// } ?>


  					 <?php if( have_rows('conditions') ): ?>
						<h3>CONDITIONS GENERALES DE VENTES</h3>	
	                            <?php while( have_rows('conditions') ): the_row(); 

			                          // vars
	                                        $titre = get_sub_field('titre');
	                                        $texte = get_sub_field('texte');

	                                    ?>
	                            
									
											<h3 style="color:#919191; padding-top: .2rem;"><?php echo $titre; ?></h3>
											<?php echo $texte; ?>
									
								<?php endwhile; ?>

							<?php endif; ?>

				
			</div>

		</div>
	</div>
</div>

