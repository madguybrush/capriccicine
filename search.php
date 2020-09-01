<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

//$container   = get_theme_mod( 'understrap_container_type' );

?>



<div id="recherche">

	<?php if ( have_posts() ) : ?>

		<header class="container-fluid padding10">

			<div class="row">
				<div class="col">
					<h1 class="recherche">RESULTATS DE LA RECHERCHE POUR 
						<strong>
							« <?php printf(esc_html__( '%s', 'understrap' ),'<span>' . get_search_query() . '</span>' ); ?> »
						</strong>
					</h1>
				</div>
			</div>

		</header>




		<div class="container-fluid padding10 content">


			<div class="row films">
				<div class="col-md-12">
					<?php

						//$categorie =  get_the_terms(get_post(), 'product_cat');
					$categorie = get_categories();
						//print_r($categorie);
					if ( ! empty( $categorie ) && ! is_wp_error( $categorie ) ){
						foreach ($categorie  as $term  ) {
							$product_cat_name = $term->name;
							/*if ($product_cat_name != 'DVD'){ */
									//echo "<h2>" . $product_cat_name . ' ' . "</h2>"; 
								/*}*/
							}
						}

						?>

					</div>
				</div>
				<div class="row films">
					<div class="col-md-12">

						<?php 
						echo "<h2> PELICULAS </h2>";

						?>

					</div>
				</div>			
				<div class=" grid gridcatalogue">
					<div class="gutter-sizer"></div>

					<?php /* Start the Loop */ ?>



					<?php while ( have_posts() ) : the_post(); ?>




						<?php

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			//get_template_part( 'loop-templates/content', 'search' );
			$cat = get_the_category();

			if($cat[0]->name == 'peliculas' ){

				?>


				<div class="grid-item">
					<!--<a href="" alt=""><img src="img/film1.png" alt="after my death"></a>-->

					<a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>">
						<?php if( get_field('affiche_du_film') ): ?>
							<img src="<?php the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>">
						<?php else : // image par défaut ?>
							<img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>">
						<?php endif; ?>
					</a>

					<h3 class="titre"><?php the_title(); ?></h3>
					<?php if (get_field('auteur')) {?>
					<h4><!--de --><span class="auteur"><?php echo get_field('auteur'); ?></span></h4>
					<?php 

				}
				if (get_field('date_de_sortie')){
					$date = get_field('date_de_sortie'); 
					$timestamp = strtotime($date);

					$dateformatannee = "Y";
					$dateformatmois = "F";
					$dateformatjour = "d";
					$annee = date_i18n($dateformatannee, $timestamp);
					$jour =  date_i18n($dateformatjour, $timestamp);
					$mois =  date_i18n($dateformatmois, $timestamp);

					?>

					<h5>sortie le <?php echo (float)$jour. ' ' . $mois . ' ' . $annee; ?></h5>
					<?php
				}

				$categorie =  get_the_terms(get_post(), 'product_cat'); 
				if ( ! empty( $categorie ) && ! is_wp_error( $categorie ) ){
					foreach ($categorie  as $term  ) {
						$product_cat_name = $term->name;
						echo "<h6>" . $product_cat_name . ' ' . "</h6>";
					}
				}

				?>
			</div>


			
			<?php 

	} // endif PELICULAS
	endwhile; ?>


			<!--<div class="grid-item">
				<a href="produit.html" alt=""><img src="img/film4.png" alt="grandeur"></a>
				<h3 class="titre">Grandeur et décadence d’un petit commerce de cinéma</h3>
				<h4>de <span class="auteur">Jean-Luc Godard</span> </h4>
				<h5>sortie le 12 septembre</h5>
				<h5><span class="categorie">Court-Métrage</span></h5>
			</div>-->

		</div>

	</div>


	<div class="container-fluid padding10 content">



		<div class="row films">
			<div class="col-md-12">

				<?php 
				echo "<h2> NOTICIAS </h2>";

				?>

			</div>
		</div>

		

		<div class=" grid gridnoticias">
			<div class="gutter-sizer"></div>

			<?php /* Start the Loop */ 
		 // Reset postdata
			wp_reset_postdata();?>
			<?php //wp_reset_query(); ?>




			<?php while ( have_posts() ) : the_post(); ?>




				<?php


				$cat = get_the_category();

				if($cat[0]->name == 'noticias' ){

					?>



					<div class="grid-item">
						<!--<a href="" alt=""><img src="img/film1.png" alt="after my death"></a>-->

						<a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>">
							<?php if( get_field('affiche_du_film') ): ?>
								<img src="<?php the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>">
							<?php else : // image par défaut ?>
								<img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>" style="width:100%;height:160px">
							<?php endif; ?>
						</a>

						<h3 class="titre"><?php the_title(); ?></h3>
						<?php if (get_field('auteur')) {?>
						<h4><!--de --><span class="auteur"><?php echo get_field('auteur'); ?></span></h4>
						<?php 

					}
					if (get_field('date_de_sortie')){
						$date = get_field('date_de_sortie'); 
						$timestamp = strtotime($date);

						$dateformatannee = "Y";
						$dateformatmois = "F";
						$dateformatjour = "d";
						$annee = date_i18n($dateformatannee, $timestamp);
						$jour =  date_i18n($dateformatjour, $timestamp);
						$mois =  date_i18n($dateformatmois, $timestamp);

						?>

						<h5>sortie le <?php echo (float)$jour. ' ' . $mois . ' ' . $annee; ?></h5>
						<?php
					}

					$categorie =  get_the_terms(get_post(), 'product_cat'); 
					if ( ! empty( $categorie ) && ! is_wp_error( $categorie ) ){
						foreach ($categorie  as $term  ) {
							$product_cat_name = $term->name;
							echo "<h6>" . $product_cat_name . ' ' . "</h6>";
						}
					}

					?>
				</div>



				<?php 

	} // endif NOTICIAS
	endwhile; ?>


			<!--<div class="grid-item">
				<a href="produit.html" alt=""><img src="img/film4.png" alt="grandeur"></a>
				<h3 class="titre">Grandeur et décadence d’un petit commerce de cinéma</h3>
				<h4>de <span class="auteur">Jean-Luc Godard</span> </h4>
				<h5>sortie le 12 septembre</h5>
				<h5><span class="categorie">Court-Métrage</span></h5>
			</div>-->

		</div>

	</div>





<?php else : ?>

	<header class="container-fluid padding10">

		<div class="row">
			<div class="col">
				<h1 class="recherche">PAS DE RESULTATS POUR LA RECHERCHE  
					<strong>
						« <?php printf(esc_html__( '%s', 'understrap' ),'<span>' . get_search_query() . '</span>' ); ?> »
					</strong>
				</h1>
			</div>
		</div>

	</header>


	<?php //get_template_part( 'loop-templates/content', 'none' ); ?>

<?php endif; ?>


</div>







<?php get_footer(); ?>
