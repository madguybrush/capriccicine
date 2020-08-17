<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  Automattic
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;



// no need for post_excerpt (ACF used)
// cf meta Copie.php for old code (original plugin code)

?>


 <header class="container-fluid animated fadeInDown slower" style="background-image: linear-gradient(rgba(239, 245, 242, 0), rgba(4, 4, 15, .1), rgba(4, 4, 15, .5)), url(<?php 
        
        if( get_the_post_thumbnail_url() ): 
            the_post_thumbnail_url(); 
        else : // image par défaut 
            bloginfo('stylesheet_directory'); 
            echo "/img/FondPageProduit.jpg"; 
        endif; 
        
        

        ?>); background-size: cover; background-position: top; background-repeat: no-repeat;">



        <div class="row infosheader animated fadeInUp">
            <div class="col-md-4 col-lg-3 text-center padding2">
                <?php if( get_field('affiche_du_film') ): ?>
                                    <img src="<?php the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>" class="imgaffiche animated fadeInUp">
                                <?php else : // image par défaut ?>
                                    <img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>" class="imgaffiche animated fadeInUp">
                                <?php endif; ?>
                <!--<img src="img/film1.png" alt="after my death" class="imgaffiche animated fadeInUp">-->
            </div>
            <div class="col-md-8 col-lg-9 padding0">
                <h1 class="animated fadeInUp"><?php the_title(); ?></h1>

                                <?php 
                               $product_categories = get_the_terms($product->get_id(), 'product_cat');
                                if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) {
                                        $categories = wp_list_pluck( $product_categories, 'name' );
                                   
                         /* $category = get_the_terms( $product->get_id(), 'product_cat' );
                                   $category_array = array();
                                  if ( ! empty( $category ) && ! is_wp_error( $category ) ){
                                        foreach ($category  as $term  ) {

                                            $category_array[] = $term->name;


                                        }*/
                                
                                ?>
                        <?php if( get_field('sous_titre') ): ?>
                            <h2 class="animated fadeInUp">
                               <?php echo get_field('sous_titre');   ?>
                                </h2>
                                 <?php endif; ?>

                <h2 class="animated fadeInUp"><?php //if (($categories[0] === "DVD" ) || ($categories[0] === "Films" )) { echo "un film de ";}
                                //else { echo "un livre de "; } ?> <?php echo get_field('auteur'); ?></h2>

<?php  } ?>

            </div>
            
        </div>

    </header>



<div class="content container-fluid"> <!--container -->

		<div class="row infoscontent animated fadeInUp">
		<!--<div class="row">-->
			<div class="col-md-4 col-lg-3 colgauche padding25 order-md-1 order-sm-1">
				
				<div class="row">
				
<?php

 					/*		$annonce = get_field('annonce');
                            $sortie = get_field('date_de_sortie');
                            $vod = get_field('date_de_sortie_vod');
                            $dvd = get_field('date_de_sortie_dvd');
                            $mea = get_field('date_de_sortie_mea');


if( $annonce || $sortie || $vod || $dvd ){*/

?>

					<div class="col-12">
						<h3>
							<?php
									 global $product;
									$category = get_the_terms( $product->get_id(), 'product_cat' );
									$category_array = array();
									if ( ! empty( $category ) && ! is_wp_error( $category ) ){
										foreach ($category  as $term  ) {
										    //$product_cat_id = $term->term_id;
										    //$product_cat_name = $term->name;
										    $category_array[] = $term->name;
										   // if (($product_cat_name == "DVD") || ($product_cat_name == "Livres")){
										    //   echo $product_cat_name;
											//}
										        // break;
										      	}
										 }

							/*if (category == 'Livres')*/
							if (in_array("Livres", $category_array)){ 

								$sortie = get_field('date_de_sortie');
								$date = get_field('date_de_sortie'); 
								
	                            $timestamp = strtotime($date);
	                           
	                            $dateformatannee = "Y";
	                            $dateformatmois = "F";
	                            $dateformatjour = "d";
	                            $annee = date_i18n($dateformatannee, $timestamp);
	                            $jour =  date_i18n($dateformatjour, $timestamp);
	                            $mois =  date_i18n($dateformatmois, $timestamp);
                            	echo "EN LIBRAIRIE "; 
                            	
								//$today = getdate();
								
								//$today = date("d-m-Y");
								$today = strtotime(date("d-m-Y"));

								/*$todayJour = date("d");
								$todayMois = date("m");
								$todayAnnee = date("Y");*/

								//echo $today;
								//$timestamptoday = strtotime($today);
								//print_r($today); 
                            	//if($timestamp < $timestamptoday){ 


								//echo $date;
								//echo $timestamp . '<br>';
								//echo $today;

                            	if($timestamp > $today){ 

                            		echo "<br> LE " . (float)$jour. ' ' . $mois; echo ' ' . $annee; 

                            	}
								//echo "EN LIBRAIRIE LE ";
								}
							else { // FILM
							?>
							
                            <?php
                            $annonce = get_field('annonce');
                            $sortie = get_field('date_de_sortie');
                            $vod = get_field('date_de_sortie_vod');
                            $dvd = get_field('date_de_sortie_dvd');
                            $mea = get_field('date_de_sortie_mea');
                            //echo $mea;
                            if ((!$sortie) && (!$vod) && (!$dvd)){
                            		echo $annonce;
                            }
                            else{
                            if ($mea == "salle") {
                          		$date = get_field('date_de_sortie'); 
	                            $timestamp = strtotime($date);
	                           
	                            $dateformatannee = "Y";
	                            $dateformatmois = "F";
	                            $dateformatjour = "d";
	                            $annee = date_i18n($dateformatannee, $timestamp);
	                            $jour =  date_i18n($dateformatjour, $timestamp);
	                            $mois =  date_i18n($dateformatmois, $timestamp);
                            	echo "SORTIE EN SALLE <br> LE " . (float)$jour. ' ' . $mois; echo ' ' . $annee;
                            }
                            if ($mea == "vod") {
                            	$date = get_field('date_de_sortie_vod'); 
	                            $timestamp = strtotime($date);
	                           
	                            $dateformatannee = "Y";
	                            $dateformatmois = "F";
	                            $dateformatjour = "d";
	                            $annee = date_i18n($dateformatannee, $timestamp);
	                            $jour =  date_i18n($dateformatjour, $timestamp);
	                            $mois =  date_i18n($dateformatmois, $timestamp);
                            	echo "SORTIE EN VOD <br> LE " . (float)$jour. ' ' . $mois; echo ' ' . $annee;
                            }
                            if ($mea == "dvd") {
                          		$date = get_field('date_de_sortie_dvd'); 
	                            $timestamp = strtotime($date);
	                           
	                            $dateformatannee = "Y";
	                            $dateformatmois = "F";
	                            $dateformatjour = "d";
	                            $annee = date_i18n($dateformatannee, $timestamp);
	                            $jour =  date_i18n($dateformatjour, $timestamp);
	                            $mois =  date_i18n($dateformatmois, $timestamp);                            	
                            	echo "SORTIE EN DVD <br> LE " . (float)$jour. ' ' . $mois; echo ' ' . $annee;
                        }

                        
                   		 }

                        	}
            
                            ?>
                            
                        
                        </h3>
					</div>


<?php //} ?>

				<div class="col-12">
<?php 
// possibilité d'appeler directement 
//template_loop_add_to_cart ici ?

//cf add-to-cart/simple.php
// /!\ variation-add-to-cart.php

global $product;
if ( !  $product->is_purchasable() ) {
//	return;
//	echo "produit non disponible à la vente";
}

else {
echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php //do_action( 'woocommerce_before_add_to_cart_form' ); 	?>


	<!--<form class="cart" action="--><?php //echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?><!--" method="post" enctype='multipart/form-data'>-->

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>


<?php


// si dvd on lance le popup au lieu d'ajouter directement au panier...
if ((in_array("DVD", $category_array))){ 

	?>

 <a href="#" class="voirenboutique" title="Voir en boutique"><button class=" cta ctapopup">Voir en boutique</button></a>

<?php

}
else{
/******* AJOUTER AU PANIER ********/
woocommerce_template_loop_add_to_cart(); 
// 1171 woocommerce/includes/wc-templates-functions.php 
// >> loop/add-to-cart.php

 do_action( 'woocommerce_after_add_to_cart_button' ); 
}


	/*	
function woocommerce_template_loop_add_to_cart( $args = array() ) {
	global $product;

		if ( $product ) {
			$defaults = array(
				'quantity'   => 1,
				'class'      => implode( ' ', array_filter( array(
					'button',
					'product_type_' . $product->get_type(),
					$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
				) ) ),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
			);

			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = strip_tags( $args['attributes']['aria-label'] );
			}

			wc_get_template( 'loop/add-to-cart.php', $args );
		}
	}
	*/


//do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' );



?>

		<?php
		// par défaut : ajout d'un seul article
		//do_action( 'woocommerce_before_add_to_cart_quantity' );

		//woocommerce_quantity_input( array(
		//	'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
		//	'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
		//	'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		//) );

		//do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>



		
	<!-- </form> -->

	<?php //do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php 
//} 
endif; 

}

?>


</div>

					<!--<div class="col-12">-->
                        <?php 
                        //$woocommerce->cart->add_to_cart( $group_product_id, 1); 
                        //[add_to_cart_url id="99"]
                      
                        ?>
					<!--<button class="cta" >ACHETER EN DVD/BLU-RAY</button>
					<br />
					<button class="cta">VOIR EN VOD</button>
					</div>-->


					<?php 
						
						if ((in_array("DVD", $category_array)) || (in_array("Films", $category_array))){ 
					?>


					<!--<div class="col-12 hidewhenmobile">-->

					<!--<h4>--><?php //echo $annee . ' / ' . get_field('pays_dorigine') .  ' / ' . get_field('duree'); ?> <!--</h4>--
					<!--<h4 class="visa">VISA--> <?php //echo get_field('visa'); ?><!--</h4>-->
					<!--</div>-->

					<div class="col-12 order-sm-12 hidewhenmobile">
					<!--<div class="centerTab">-->

					<?php 
					$date_de_sortie = get_field('date_de_sortie');
					$date_de_sortie_vod = get_field('date_de_sortie_vod');
					$date_de_sortie_dvd = get_field('date_de_sortie_dvd');
					if((($date_de_sortie) && ($mea != "salle")) || (($date_de_sortie_vod) && ($mea != "vod")) || (($date_de_sortie_dvd) && ($mea != "dvd"))){ ?>
						<table class="tableFilm" style="margin-bottom: 0;">
						<tbody>
							
                            <?php

                          /*  $date = get_field('date_de_sortie'); 
                            $timestamp = strtotime($date);
                            
                            $dateformatannee = "Y";
                            $dateformatmois = "F";
                            $dateformatjour = "d";
                            $annee = date_i18n($dateformatannee, $timestamp);
                            $jour =  date_i18n($dateformatjour, $timestamp);
                            $mois =  date_i18n($dateformatmois, $timestamp);
                            
                            echo (float)$jour. ' ' . $mois; echo ' ' . $annee;*/

                            ?>

                            <?php //$pays_dorigine = get_field('pays_dorigine');
							$date_de_sortie = get_field('date_de_sortie');	
                                    if (($date_de_sortie) && ($mea != "salle")){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Sortie en salle</b></td>
								<td class="colRight"><?php echo $date_de_sortie; ?></td>
							</tr>
                            <?php } ?>

                           <?php //$pays_dorigine = get_field('pays_dorigine');
							$date_de_sortie_vod = get_field('date_de_sortie_vod');
                                    if (($date_de_sortie_vod) && ($mea != "vod")){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Sortie VOD</b></td>
								<td class="colRight"><?php echo $date_de_sortie_vod; ?></td>
							</tr>
                            <?php } ?>

                               <?php //$pays_dorigine = get_field('pays_dorigine');
							$date_de_sortie_dvd = get_field('date_de_sortie_dvd');	
                                    if (($date_de_sortie_dvd) && ($mea != "dvd")){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Sortie DVD</b></td>
								<td class="colRight"><?php echo $date_de_sortie_dvd; ?></td>
							</tr>
                            <?php } ?>


						</tbody>
						</table>

						<?php } ?>


						<table class="tableFilm">
						<tbody>

														<?php 
							if (in_array("DVD", $category_array)) {


								 if ($product->get_type() == 'simple'){ 
								if ( $price_html = $product->get_price_html() ) : ?>
									<tr class="acteurs">
										<td valign="top" class="colLeft"><b>Prix</b></td>
										<td class="colRight" style="color :#A78A3C; font-family: Lora; font-weight: bold;">
											<?php echo $price_html; ?>
										</td>
									</tr>

								<?php endif;  ?>


							<?php } else { ?>
							<?php 	
							$variation_max_price = $product->get_variation_price('max');
							if ($variation_max_price) : ?>
								<tr class="acteurs">
									<td valign="top" class="colLeft"><b>Prix</b></td>
									<td class="colRight" style="color :#A78A3C; font-family: Lora; font-weight: bold;">
										<?php echo $variation_max_price; ?>€
									</td>
								</tr>

							<?php endif; } 

						}

							?>


						<?php //$pays_dorigine = get_field('pays_dorigine');
						$annee_de_production = get_field('annee_de_production');
                                    if ($annee_de_production){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Année de production</b></td>
								<td class="colRight"><?php echo $annee_de_production; ?></td>
							</tr>
                            <?php } ?>

                            						<?php //$pays_dorigine = get_field('pays_dorigine');
						$date_de_tournage = get_field('date_de_tournage');
                                    if ($date_de_tournage){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Date de tournage</b></td>
								<td class="colRight"><?php echo $date_de_tournage; ?></td>
							</tr>
                            <?php } 
                            						$lieu_de_tournage = get_field('lieu_de_tournage');
                                    if ($lieu_de_tournage){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Lieu de tournage</b></td>
								<td class="colRight"><?php echo $lieu_de_tournage; ?></td>
							</tr>
                            <?php } ?>

						<?php $pays_dorigine = get_field('pays_dorigine');	
                                    if ($pays_dorigine){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Pays</b></td>
								<td class="colRight"><?php echo get_field('pays_dorigine'); ?></td>
							</tr>
                            <?php } ?>

                                                        <?php $langue = get_field('langue');	
                                    if ($langue){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Langue</b></td>
								<td class="colRight"><?php echo get_field('langue'); ?></td>
							</tr>
                            <?php } ?>

						<?php $duree = get_field('duree');	
                                    if ($duree){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Durée</b></td>
								<td class="colRight"><?php echo get_field('duree'); ?></td>
							</tr>
                            <?php } ?>

						<?php $visa = get_field('visa');	
                                    if ($visa){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Visa</b></td>
								<td class="colRight"><?php echo get_field('visa'); ?></td>
							</tr>
                            <?php } ?>



                            <?php $titre = get_field('titre_original');	
                                    if ($titre){?>
							<tr class="titre">
								<td class="colLeft"><b>Titre original </b></td>
								<td class="colRight"><?php echo $titre; ?></td>
							</tr>
                            <?php } ?>
                            

                            
						</tbody>
						</table>




						<table class="tableFilm">
						<tbody>



                            
                            <?php if( have_rows('acteurs') ): ?>
		
	                            <?php while( have_rows('acteurs') ): the_row(); 

			                          // vars
	                                        $role = get_sub_field('role');
	                                        $acteur = get_sub_field('acteur');

	                                    ?>
	                            
										<tr class="acteurs">
											<td class="colLeft"><b><?php echo $role; ?></b></td>
											<td class="colRight"><?php echo $acteur; ?></td>
										</tr>
								<?php endwhile; ?>

							<?php endif; ?>
                            
						</tbody>
						</table>




						<table class="tableFilm">
						<tbody>

				                        <?php 
		                                 $technique = get_field('technique');	
		                                   if ($technique['realisation']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Réalisation</b></td>
										<td class="colRight"><?php echo $technique['realisation']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['scenario']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Scénario</b></td>
										<td class="colRight"><?php echo $technique['scenario']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['photographie']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Photographie</b></td>
										<td class="colRight"><?php echo $technique['photographie']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['prise_de_son']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Prise de son</b></td>
										<td class="colRight"><?php echo $technique['prise_de_son']; ?></td>
									</tr>

									<?php }   ?>
										<?php
        							if ($technique['costumes']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Costumes</b></td>
										<td class="colRight"><?php echo $technique['costumes']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['maquillage']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Maquillage</b></td>
										<td class="colRight"><?php echo $technique['maquillage']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['decors']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Décors</b></td>
										<td class="colRight"><?php echo $technique['decors']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['direction_artistique']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Direction artistique</b></td>
										<td class="colRight"><?php echo $technique['direction_artistique']; ?></td>
									</tr>

									<?php }   ?>
								<?php
        							if ($technique['montage_image']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Montage image</b></td>
										<td class="colRight"><?php echo $technique['montage_image']; ?></td>
									</tr>

									<?php }   ?>
								<?php
        							if ($technique['montage_son']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Montage son</b></td>
										<td class="colRight"><?php echo $technique['montage_son']; ?></td>
									</tr>

									<?php }   ?>
						
								<?php
        							if ($technique['musique']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Musique</b></td>
										<td class="colRight"><?php echo $technique['musique']; ?></td>
									</tr>

									<?php }   ?>
															<?php
        							if ($technique['mixage']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Mixage</b></td>
										<td class="colRight"><?php echo $technique['mixage']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['effets_speciaux']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Effets spéciaux</b></td>
										<td class="colRight"><?php echo $technique['effets_speciaux']; ?></td>
									</tr>

									<?php }   ?>


									<?php
        							if ($technique['producteur']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Producteur</b></td>
										<td class="colRight"><?php echo $technique['producteur']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['production']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Production</b></td>
										<td class="colRight"><?php echo $technique['production']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['coproduction']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Coproduction</b></td>
										<td class="colRight"><?php echo $technique['coproduction']; ?></td>
									</tr>

									<?php }   ?>
									
									<?php
        							if ($technique['direction_de__la_production']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Direction de la Production</b></td>
										<td class="colRight"><?php echo $technique['direction_de__la_production']; ?></td>
									</tr>

									<?php }   ?>

									
									<?php
        							if ($technique['avec_la_participation_de']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Avec la participation de</b></td>
										<td class="colRight"><?php echo $technique['avec_la_participation_de']; ?></td>
									</tr>

									<?php }   ?>


									<?php
        							if ($technique['avec_le_soutien_de']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Avec le soutien de</b></td>
										<td class="colRight"><?php echo $technique['avec_le_soutien_de']; ?></td>
									</tr>

									<?php }   ?>


									<?php
        							if ($technique['en_partenariat_avec']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>En partenariat avec</b></td>
										<td class="colRight"><?php echo $technique['en_partenariat_avec']; ?></td>
									</tr>

									<?php }   ?>

																		<?php
        							if ($technique['en_association_avec']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>En association avec</b></td>
										<td class="colRight"><?php echo $technique['en_association_avec']; ?></td>
									</tr>

									<?php }   ?>


																											<?php
        							if ($technique['attachee_de_presse']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Attaché(e) de presse</b></td>
										<td class="colRight"><?php echo $technique['attachee_de_presse']; ?></td>
									</tr>

									<?php }   ?>

																<?php
        							if ($technique['distribution']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Distribution</b></td>
										<td class="colRight"><?php echo $technique['distribution']; ?></td>
									</tr>

									<?php }   ?>

																									<?php
        							if ($technique['programmation']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Programmation</b></td>
										<td class="colRight"><?php echo $technique['programmation']; ?></td>
									</tr>

									<?php }   ?>


						</tbody>
						</table>
					<!--</div>-->
					</div>

<?php } else { //Livres ?>


					<div class="col-12 order-sm-12 hidewhenmobile">
					<!--<div class="centerTab">-->
						<table class="tableFilm">
						<tbody>
                            
                            <?php if( have_rows('technique') ): ?>
	
                           		<?php while( have_rows('technique') ): the_row(); 

		                          // vars
                                        $titre = get_sub_field('titre');
                                        $valeur = get_sub_field('valeur');

                                    ?>
                            
									<tr>
										<td valign="top" class="colLeft"><b><?php echo $titre; ?></b></td>
										<td class="colRight"><?php echo $valeur; ?></td>
									</tr>
								<?php endwhile; ?>

							<?php endif; ?>

								                            <?php 
		                                    $technique = get_field('technique');	
		                                    //print_r($technique);
		                                   if ($technique){
		                            ?>

					                            <?php if ($technique['format']){ ?>
					                            <tr>
													<td class="colLeft"><b>Format</b></td>
													<td class="colRight"><?php echo $technique['format']; ?></td>
												</tr>
												<?php } ?>
												<?php if ($technique['diffusion']){ ?>
												<tr>
													<td class="colLeft"><b>Diffusion</b></td>
													<td class="colRight"><?php echo $technique['diffusion']; ?></td>
												</tr>
												<?php } ?>
												<?php if ($technique['parution']){ ?>
												<tr>
													<td class="colLeft"><b>Parution</b></td>
													<td class="colRight"><?php echo $technique['parution']; ?></td>
												</tr>
					                            <?php } ?>
												<?php if ($technique['isbn']){ ?>
												<tr>
													<td class="colLeft"><b>ISBN</b></td>
													<td class="colRight"><?php echo $technique['isbn']; ?></td>
												</tr>
					                            <?php } ?>
		                            <?php } ?>


		                    <?php if ($product->get_type() == 'simple'){ ?>
								<?php if ( $price_html = $product->get_price_html() ) : ?>
									<tr class="acteurs">
										<td valign="top" class="colLeft"><b>Prix</b></td>
										<td class="colRight" style="color :#A78A3C; font-family: Lora; font-weight: bold;">
											<?php echo $price_html; ?>
										</td>
									</tr>

								<?php endif;  ?>


							<?php } else { ?>
							<?php 	
							$variation_max_price = $product->get_variation_price('max');
							if ($variation_max_price) : ?>
								<tr class="acteurs">
									<td valign="top" class="colLeft"><b>Prix</b></td>
									<td class="colRight" style="color :#A78A3C; font-family: Lora; font-weight: bold;">
										<?php echo $variation_max_price; ?>€
									</td>
								</tr>

							<?php endif; } ?>

                            
						</tbody>
						</table>

					<!--</div>-->
					</div>


<?php } //Livres ?>

				</div>
			
				
			</div>
			<div class="col-md-8 col-lg-9 order-md-2 order-sm-2 coldroite">
				
				<div class="row">
					<div class="col-lg-9 order-lg-1 order-md-2 order-sm-1"> <!-- col-xl-10 -->
					
						<div class="row">
						
						<?php 
							if ((in_array("DVD", $category_array)) || (in_array("Films", $category_array))){ 
						?>


		                            <?php 
		                                    $prix = get_field('prix');
		                                 if ($prix){	
		                                    if (($prix['gauche']) && ($prix['droite'])){
		                            ?>
		                            
													<div class="col-md-6  prix">
														<?php echo $prix['gauche']; ?>
													</div>
													<div class="col-md-6 prix prix2">
						                                <?php echo $prix['droite']; ?>
													</div>
					                            
					                            <?php } 
					                            else if (($prix['gauche']) || ($prix['droite'])){
					                            ?>
					                            
													<div class="col-md-12 prix" style="padding-left: 6rem; <?php if ($prix['droite']){ echo 'padding-top: 0;'; } ?>">
														<?php echo $prix['gauche']; ?>
													</div>
													<div class="col-md-12 prix prix2" style="padding-right: 6rem; <?php if ($prix['gauche']){ echo 'padding-top: 0;'; } ?>">
						                                <?php echo $prix['droite']; ?>
													</div>
					                            
					                            <?php } ?>
		                            <?php } ?>
						<?php } else { //Livres ?>

								    <?php 
		                                $citation = get_field('citation');	
		                                $auteur_citation = get_field('auteur_citation');
		                             if ($citation){
		                            ?>
		                            
										<div class="col-md-12 citation">
											<?php echo $citation; ?>
										</div>
										<?php if ($auteur_citation){ ?>
											<div class="col-md-12 auteurcitation">
												<img src="<?php bloginfo('stylesheet_directory');?>/img/trait-debut-paragraphe.svg" alt="" class="petittrait">
				                                <?php echo $auteur_citation; ?>
											</div>
		                             	<?php } ?>
		               				 <?php } ?>

		                <?php } //livres ?>
						
						<?php if (get_field('synopsis')){ ?>
							<div class="col-lg-12 resume ">
								<!--<img src="--><?php //bloginfo('stylesheet_directory');?><!--/img/trait-debut-paragraphe.svg" alt="" class="trait">-->
								<?php //echo get_field('synopsis', false, false);  // enleve le p qui wrap le texte, et tous les p d'ailleurs
									the_field('synopsis');
								?>
								<?php //echo get_field('synopsis');  ?>

						<?php //if (get_field('details')){ ?>
							<!--<div class="col-lg-12 details ">-->
								<?php //the_field('details'); ?>
							<!--</div>-->
						<?php //} ?>
								
							</div>
						<?php } ?>

						<?php if (get_field('preface')){ ?>
							<div class="col-lg-12 resume" <?php if (get_field('preface')){ echo 'style="padding-top:0;"'; } ?> >
                                <?php echo get_field('preface');  ?>

							</div>
							<?php } ?>


						<?php if (get_field('lauteur')){ ?>
							<div class="col-lg-12 lauteur">
								<h3>L’AUTEUR </h3>
								<img src="<?php bloginfo('stylesheet_directory');?>/img/trait-debut-paragraphe.svg" alt="" class="trait">
                                <?php echo get_field('lauteur', false, false);  ?>

							</div>
							<?php } ?>
                                 
<?php
$video = get_field('video_page_produit');
$images = get_field('galerie');
if (( $video ) || ( $images )) {

?>

							<div class="col-lg-12 cadreblanc">
                                 <?php 
                                    $video = get_field('video_page_produit');
                                    if( $video ) { ?>
								<div class="video-responsive">
									<!-- <iframe width="420" height="315" src="https://www.youtube.com/embed/xc446vOqXm8" frameborder="0" allowfullscreen ></iframe>		-->
									<iframe width="640" height="564" src="<?php echo $video; ?>" frameborder="0" controls allowFullScreen mozallowfullscreen webkitAllowFullScreen></iframe>									
								</div>
                                
                                <?php } 


 							$images = get_field('galerie');

                                  if( $images ): 

                                ?>
						
								<div class="gallery" <?php if(!($video)) {echo "style='padding-top:0;'";} ?> >
									<div id="demo" class="carousel slide" data-ride="carousel">

									  <!-- Indicators -->
									 <!-- <ul class="carousel-indicators">
										<li data-target="#demo" data-slide-to="0" class="active"></li>
										<li data-target="#demo" data-slide-to="1"></li>
										<li data-target="#demo" data-slide-to="2"></li>
									  </ul>-->

									  <!-- The slideshow -->
									  <div class="carousel-inner">
                                          
                                        <?php  
           	 	                          /* $i =1;
                                          $postID = get_the_ID();
                                             $gallery = get_post_gallery_images($postID);
                                          if (!empty($gallery)){
                                            foreach( $gallery as $image_url ){*/
                                          $i =1;
                                         // $images = get_field('galerie');

                                        //    if( $images ): 
                                          foreach( $images as $image ): ?>
<!-- <?php echo trim($image['url'], "?"); ?>-->
										<div class="lol carousel-item <?php if ($i ==1) { echo "active"; $i++; } ?>">
										  <img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>"> 
										</div>
                                          
                                        <?php endforeach;  ?>

                                        <?php //endif; ?> 
									  
                                        </div>

								
									  <!-- Left and right controls -->
									  <a class="carousel-control-prev" href="#demo" data-slide="prev">
										<span class="carousel-control-prev-icon"></span>
									  </a>
									  <a class="carousel-control-next" href="#demo" data-slide="next">
										<span class="carousel-control-next-icon"></span>
									  </a>
 							


									</div>
								</div>


 						<?php endif; ?> 

							</div> <!-- cadreblanc -->

<?php } ?>
							
						</div> <!-- row --> 
						
					</div> <!-- col lg 9 -->
					
						<?php 
							if ((in_array("DVD", $category_array)) || (in_array("Films", $category_array))){ 
						?>




					<div class="col-lg-3 order-lg-2 order-md-1 order-sm-2 colbuttons "> <!-- col-xl-2 -->
						


								      <?php 
		                                    $telechargements = get_field('telechargements');	
		                                   // print_r($telechargements);
		                                   if ($telechargements){
		                            ?>

									<?php //echo $technique['format']; ?>

						<div class="row">

							<?php 


							$ba = $telechargements['bande-annonce']; 
							$affiche = $telechargements['affiche_hd']; 
							$dp = $telechargements['dossier_de_presse']; 
							$revue = $telechargements['revue_de_presse']; 
							$photos = $telechargements['photos_hd']; 
							$extraits = $telechargements['extraits']; 
							$touslesdocuments = $telechargements['tous_les_documents']; 
							//print_r($ba);
							//$ba 
							$hd = $ba['hd']; 
							//print_r($hd);
							$dcp = $ba['dcp'];
							


							?>
                            <?php if( $hd || $dcp /*get_field('bande-annonce')*/ ){?>
								<div class="col-6 col-md-4 col-lg-12">
	                                <?php //the_field('bande-annonce'); ?>
	                               <!-- <a href="#" alt="">-->
	                                	<button class="download opensubmenuba">BANDE-ANNONCE</button>
	                              <!--  </a>-->
	                                <div class="submenuba animated fadeIn">
	                                	<?php //print_r($hd);
	                                		if ($hd){
	                                	?>
	                                	<a href="<?php echo $hd; //echo $srchd; ?>" target="blank">HD</a><br />
	                                	<?php 		} // endif $hd
	                                	 
	                                	if ($dcp){
	                                	?>
	                                		<a href="<?php echo $dcp; ?>" target="blank">DCP</a>
	                                	<?php }// endif  $dcp ?>
	                                </div>
								</div>
                            <?php } // endif $hd ou $dcp ?>


                             <?php if( $affiche /*get_field('affiche_hd')*/ ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $affiche; //the_field('affiche_hd'); ?>" alt="" download><button class="download">AFFICHE HD</button></a>
							</div>
                            <?php } ?>

                             <?php if( $dp ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $dp; ?>" alt="" download><button class="download">DOSSIER DE PRESSE</button></a>
							</div>
                            <?php } ?>  
                            

                             <?php if( $revue ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $revue; ?>" alt="" download><button class="download">REVUE DE PRESSE</button></a>
							</div>
                            <?php } ?>  
                            


                             <?php if( $photos ){?>

								<div class="col-6 col-md-4 col-lg-12">
									 <a href="<?php echo $photos; ?>" alt="" download><button class="download">PHOTOS HD</button></a>
								</div>

							<!--<div class="col-6 col-md-4 col-lg-12">
								 	<button class="download opensubmenuphotos">PHOTOS HD</button>
									<div class="submenuphotos animated fadeIn">-->
		  								<?php 
		  									//foreach ($photos as $photo) {
		  								 	//$nom = $photo['nom_de_la_photo'];
		                                       //$url = $photo['fichier'];
		                                ?>
		                                <!--<a href="--><?php //echo $url; ?><!--" download>--><?php //echo $nom; ?><!--</a><br />-->
		                                <?php //}	?>
			                <!--        </div>
			                </div>-->

                            <?php } ?>


                             <?php if( $extraits ){?>
                             <?php //if( have_rows('photos_hd') ): ?>
							<div class="col-6 col-md-4 col-lg-12">
								<!-- <a href="#" alt="">-->
								 	<button class="download opensubmenuextraits">EXTRAITS</button>
								<!-- </a>-->
							
									<div class="submenuextraits animated fadeIn">

		  									 <?php 
		  									 //print_r($photos);
		  									foreach ($extraits as $extrait) {
		  									 	$nom = $extrait['nom_de_lextrait'];
		                                        $url = $extrait['fichier'];
		  									
		  									// while( have_rows('photos_hd') ): the_row();

		                                   //     $nom= get_sub_field('nom_de_la_photo');
		                                    //    $url= get_sub_field('fichier');
		                                        ?>
		                                        
		                                        <a href="<?php echo $url; ?>" target="blank"><?php echo $nom; ?></a><br />

		                                    
		                                <?php //endwhile; 
			                                	 }
										?>
			                        </div>
			                </div>
                            <?php } ?>





                            <?php if( $touslesdocuments ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $touslesdocuments; ?>" alt="" download><button class="downloadall">TOUS LES DOCUMENTS</button></a>
							</div>
                            <?php } ?>

                            <?php if (!in_array("Films", $category_array)){  ?>
							<div class="col-6 col-md-4 col-lg-12">




						   		<div class="crosssells">
								<h3 class="widget-title">Vous aimeriez aussi</h3>
									<?php
									//dynamic_sidebar( 'right-sidebar' );


//$id =  $post_object->ID;
//$product = wc_get_product($id);
$product = wc_get_product();
$cross_sells = array_filter( array_map( 'wc_get_product',$product->get_cross_sell_ids() ), 'wc_products_array_filter_visible' );

//$cross_sells =  $product->get_cross_sell_ids();

//print_r($cross_sells);

//$cross_sells = array_filter( array_map( 'wc_get_product',$product->get_cross_sell_ids() ), 'wc_products_array_filter_visible' );
//$cross_sells = array_filter( array_map( 'wc_get_product', WC()->get_cross_sells() ), 'wc_products_array_filter_visible' );

									//woocommerce_product_loop_start();
           							 foreach ( $cross_sells as $cross_sell ) :
										$post_object = get_post( $cross_sell->get_id() );
										setup_postdata( $GLOBALS['post'] =& $post_object );
										//print_r($cross_sell);
										//echo $cross_sell['name'];

										//$product = wc_get_product($id);
    echo '<div class="container-fluid"><div class="row"><div class="col-4" style="padding:5px;">';
      
                ?>
                <a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>">
											<?php if( get_field('affiche_du_film') ) : ?>
                                  				<img src="<?php the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>">
                                			<?php else : // image par défaut ?>
                                    			<img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>">
                                			<?php endif; ?>
										</a>
				<?php						
                echo '</div><div class="col-8" style="padding:5px; text-align: left;">';
                   ?>
                 <a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>">
                    <?php
                    echo '<h4>'; the_title(); echo '</h4>';
                    ?>
                </a>
                <?php
                echo '<h5> de ' . get_field('auteur') . '</h5>';
       
                $date = get_field('date_de_sortie'); 
                            $timestamp = strtotime($date);
                            
                            $dateformatannee = "Y";
                            $dateformatmois = "F";
                            $dateformatjour = "d";
                            $annee = date_i18n($dateformatannee, $timestamp);
                            $jour =  date_i18n($dateformatjour, $timestamp);
                            $mois =  date_i18n($dateformatmois, $timestamp);
    
                echo '</div></div></div>';

            endforeach;
       // woocommerce_product_loop_end();




									// >> cf plugin widget capricci "vous aimeriez aussi"

/*	

											$args = array(
												'posts_per_page' => 6,
												'columns'        => 2,
												'orderby'        => 'rand', 
												'order'          => 'desc',
											);
										woocommerce_output_related_products($args);*/
									//$product->get_id()

// appeler woocommerce_output_related_products(); et modifier template single-product/related.php

	


										?>
								</div>




							</div>
							<?php }  ?> 

						</div>

						<?php } // endif $telechargements ?>


					</div>


<?php } else { //Livres ?>


					<div class="col-lg-3 order-lg-2 order-md-1 order-sm-2 colbuttons "> <!-- col-xl-2 -->
						
      <?php 
		                                    $telechargements = get_field('telechargements');	
		                                   // print_r($telechargements);
		                                   if ($telechargements){
		                            ?>


						<div class="row">

							<?php 


							$couverture = $telechargements['couverture_hd']; 
							$sommaire = $telechargements['sommaire']; 
							$extraits = $telechargements['extraits']; 
							$revues = $telechargements['revue_de_presse']; 
							$touslesdocuments = $telechargements['tous_les_documents']; 
							//print_r($ba);
							//$ba 
							//$hd = $ba['hd']; 
							//print_r($hd);
							//$dcp = $ba['dcp'];
							


							?>



                            <?php if( $couverture ){?>
							<div class="col-6 col-md-4 col-lg-12">
                                <a href="<?php echo $couverture ?>" alt="" download><button class="download">COUVERTURE HD</button></a>
							</div>
                            <?php } ?>


                             <?php if( $sommaire /*get_field('sommaire')*/ ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $sommaire; /*the_field('sommaire');*/ ?>" alt="" download><button class="download">SOMMAIRE</button></a>
							</div>
                            <?php } ?>


                             <?php if( $extraits ){?>
                             <?php //if( have_rows('photos_hd') ): ?>
							<div class="col-6 col-md-4 col-lg-12">
								<!-- <a href="#" alt="">-->
								 	<button class="download opensubmenuextraits">EXTRAITS</button>
								<!-- </a>-->
							
									<div class="submenuextraits animated fadeIn">

		  									 <?php 
		  									 //print_r($photos);
		  									foreach ($extraits as $extrait) {
		  									 	$nom = $extrait['nom_de_lextrait'];
		                                        $url = $extrait['fichier'];
		  									
		  									// while( have_rows('photos_hd') ): the_row();

		                                   //     $nom= get_sub_field('nom_de_la_photo');
		                                    //    $url= get_sub_field('fichier');
		                                        ?>
		                                        <a href="<?php echo $url; ?>" download><?php echo $nom; ?></a><br />

		                                    
		                                <?php //endwhile; 
			                                	 }
										?>
			                        </div>
			                </div>
                            <?php } ?>

                             <?php if( $revues ){?>
                             <?php //if( have_rows('photos_hd') ): ?>
							<div class="col-6 col-md-4 col-lg-12">
								<!-- <a href="#" alt="">-->
								 	<button class="download opensubmenuphotos">REVUE DE PRESSE</button>
								<!-- </a>-->
							
									<div class="submenuphotos animated fadeIn">

		  									 <?php 
		  									 //print_r($photos);
		  									foreach ($revues as $revue) {
		  									 	$nom = $revue['nom_de_la_photo'];
		                                        $url = $revue['fichier'];
		  									
		  									// while( have_rows('photos_hd') ): the_row();

		                                   //     $nom= get_sub_field('nom_de_la_photo');
		                                    //    $url= get_sub_field('fichier');
		                                        ?>
		                                        <a href="<?php echo $url; ?>" download><?php echo $nom; ?></a><br />

		                                    
		                                <?php //endwhile; 
			                                	 }
										?>
			                        </div>
			                </div>
                            <?php } ?>


                            <?php if( $touslesdocuments ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $touslesdocuments; ?>" alt="" download><button class="downloadall">TOUS LES DOCUMENTS</button></a>
							</div>
                            <?php } ?>




                            							<div class="col-6 col-md-4 col-lg-12">
						   		<div class="crosssells">
								<h3 class="widget-title">Vous aimeriez aussi</h3>
									<?php
									//dynamic_sidebar( 'right-sidebar' );


//$id =  $post_object->ID;
//$product = wc_get_product($id);
$product = wc_get_product();
$cross_sells = array_filter( array_map( 'wc_get_product',$product->get_cross_sell_ids() ), 'wc_products_array_filter_visible' );

//$cross_sells =  $product->get_cross_sell_ids();

//print_r($cross_sells);

//$cross_sells = array_filter( array_map( 'wc_get_product',$product->get_cross_sell_ids() ), 'wc_products_array_filter_visible' );
//$cross_sells = array_filter( array_map( 'wc_get_product', WC()->get_cross_sells() ), 'wc_products_array_filter_visible' );

									//woocommerce_product_loop_start();
           							 foreach ( $cross_sells as $cross_sell ) :
										$post_object = get_post( $cross_sell->get_id() );
										setup_postdata( $GLOBALS['post'] =& $post_object );
										//print_r($cross_sell);
										//echo $cross_sell['name'];

										//$product = wc_get_product($id);
    echo '<div class="container-fluid"><div class="row"><div class="col-4" style="padding:5px;">';
      
                ?>
                <a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>">
											<?php if( get_field('affiche_du_film') ) : ?>
                                  				<img src="<?php the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>">
                                			<?php else : // image par défaut ?>
                                    			<img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>">
                                			<?php endif; ?>
										</a>
				<?php						
                echo '</div><div class="col-8" style="padding:5px; text-align: left;">';
                   ?>
                 <a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>">
                    <?php
                    echo '<h4>'; the_title(); echo '</h4>';
                    ?>
                </a>
                <?php
                echo '<h5> de ' . get_field('auteur') . '</h5>';
       
                $date = get_field('date_de_sortie'); 
                            $timestamp = strtotime($date);
                            
                            $dateformatannee = "Y";
                            $dateformatmois = "F";
                            $dateformatjour = "d";
                            $annee = date_i18n($dateformatannee, $timestamp);
                            $jour =  date_i18n($dateformatjour, $timestamp);
                            $mois =  date_i18n($dateformatmois, $timestamp);
    
                echo '</div></div></div>';

            endforeach;
       // woocommerce_product_loop_end();




									// >> cf plugin widget capricci "vous aimeriez aussi"

/*	

											$args = array(
												'posts_per_page' => 6,
												'columns'        => 2,
												'orderby'        => 'rand', 
												'order'          => 'desc',
											);
										woocommerce_output_related_products($args);*/
									//$product->get_id()

// appeler woocommerce_output_related_products(); et modifier template single-product/related.php

	


										?>
								</div>
							</div>

						</div>


	<?php } // endif $telechargements ?>

					</div>

 <?php } //livres ?>
					
				</div>
				
				
			</div>
		</div>

	<!--</div>--><!-- row -->
	
	
	
	</div>





<div class="container-fluid showwhenmobile <?php //print_r($category_array); ?>">

	<?php 
			
							if ((in_array("DVD", $category_array)) || (in_array("Films", $category_array))){ 
						?>

			<div class="row ">
					<div class="col-12 ">
					<!--<h4>--><?php //echo $annee . ' / ' . get_field('pays_dorigine') .  ' / ' . get_field('duree'); ?><!-- </h4> -->
					<!--<h4 class="visa">VISA --><?php //echo get_field('visa'); ?><!--</h4>-->
					</div>
					<div class="col-12 order-sm-12">
					<!--<div class="centerTab">-->


			
						

					<?php 
					$date_de_sortie = get_field('date_de_sortie');
					$date_de_sortie_vod = get_field('date_de_sortie_vod');
					$date_de_sortie_dvd = get_field('date_de_sortie_dvd');
					if((($date_de_sortie) && ($mea != "salle")) || (($date_de_sortie_vod) && ($mea != "vod")) || (($date_de_sortie_dvd) && ($mea != "dvd"))){ ?>
						<table class="tableFilm" style="margin-bottom: 0;">
						<tbody>
							
                            <?php

                          /*  $date = get_field('date_de_sortie'); 
                            $timestamp = strtotime($date);
                            
                            $dateformatannee = "Y";
                            $dateformatmois = "F";
                            $dateformatjour = "d";
                            $annee = date_i18n($dateformatannee, $timestamp);
                            $jour =  date_i18n($dateformatjour, $timestamp);
                            $mois =  date_i18n($dateformatmois, $timestamp);
                            
                            echo (float)$jour. ' ' . $mois; echo ' ' . $annee;*/

                            ?>

                            <?php //$pays_dorigine = get_field('pays_dorigine');
							$date_de_sortie = get_field('date_de_sortie');	
                                    if (($date_de_sortie) && ($mea != "salle")){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Sortie en salle</b></td>
								<td class="colRight"><?php echo $date_de_sortie; ?></td>
							</tr>
                            <?php } ?>

                           <?php //$pays_dorigine = get_field('pays_dorigine');
							$date_de_sortie_vod = get_field('date_de_sortie_vod');
                                    if (($date_de_sortie_vod) && ($mea != "vod")){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Sortie VOD</b></td>
								<td class="colRight"><?php echo $date_de_sortie_vod; ?></td>
							</tr>
                            <?php } ?>

                               <?php //$pays_dorigine = get_field('pays_dorigine');
							$date_de_sortie_dvd = get_field('date_de_sortie_dvd');	
                                    if (($date_de_sortie_dvd) && ($mea != "dvd")){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Sortie DVD</b></td>
								<td class="colRight"><?php echo $date_de_sortie_dvd; ?></td>
							</tr>
                            <?php } ?>


						</tbody>
						</table>

						<?php } ?>


						<table class="tableFilm">
						<tbody>

														<?php 
							if (in_array("DVD", $category_array)) {


								 if ($product->get_type() == 'simple'){ 
								if ( $price_html = $product->get_price_html() ) : ?>
									<tr class="acteurs">
										<td valign="top" class="colLeft"><b>Prix</b></td>
										<td class="colRight" style="color :#A78A3C; font-family: Lora; font-weight: bold;">
											<?php echo $price_html; ?>
										</td>
									</tr>

								<?php endif;  ?>


							<?php } else { ?>
							<?php 	
							$variation_max_price = $product->get_variation_price('max');
							if ($variation_max_price) : ?>
								<tr class="acteurs">
									<td valign="top" class="colLeft"><b>Prix</b></td>
									<td class="colRight" style="color :#A78A3C; font-family: Lora; font-weight: bold;">
										<?php echo $variation_max_price; ?>€
									</td>
								</tr>

							<?php endif; } 

						}

							?>


						<?php //$pays_dorigine = get_field('pays_dorigine');
						$annee_de_production = get_field('annee_de_production');
                                    if ($annee_de_production){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Année de production</b></td>
								<td class="colRight"><?php echo $annee_de_production; ?></td>
							</tr>
                            <?php } ?>


                            						<?php //$pays_dorigine = get_field('pays_dorigine');
						$date_de_tournage = get_field('date_de_tournage');
                                    if ($date_de_tournage){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Date de tournage</b></td>
								<td class="colRight"><?php echo $date_de_tournage; ?></td>
							</tr>
                            <?php } 
                            						$lieu_de_tournage = get_field('lieu_de_tournage');
                                    if ($lieu_de_tournage){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Lieu de tournage</b></td>
								<td class="colRight"><?php echo $lieu_de_tournage; ?></td>
							</tr>
                            <?php } ?>

                            

						<?php $pays_dorigine = get_field('pays_dorigine');	
                                    if ($pays_dorigine){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Pays</b></td>
								<td class="colRight"><?php echo get_field('pays_dorigine'); ?></td>
							</tr>
                            <?php } ?>





                                                        <?php $langue = get_field('langue');	
                                    if ($langue){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Langue</b></td>
								<td class="colRight"><?php echo get_field('langue'); ?></td>
							</tr>
                            <?php } ?>

						<?php $duree = get_field('duree');	
                                    if ($duree){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Durée</b></td>
								<td class="colRight"><?php echo get_field('duree'); ?></td>
							</tr>
                            <?php } ?>

						<?php $visa = get_field('visa');	
                                    if ($visa){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Visa</b></td>
								<td class="colRight"><?php echo get_field('visa'); ?></td>
							</tr>
                            <?php } ?>



                            <?php $titre = get_field('titre_original');	
                                    if ($titre){?>
							<tr class="titre">
								<td class="colLeft"><b>Titre original </b></td>
								<td class="colRight"><?php echo $titre; ?></td>
							</tr>
                            <?php } ?>
                            

                            
						</tbody>
						</table>




						<table class="tableFilm">
						<tbody>



                            
                            <?php if( have_rows('acteurs') ): ?>
		
	                            <?php while( have_rows('acteurs') ): the_row(); 

			                          // vars
	                                        $role = get_sub_field('role');
	                                        $acteur = get_sub_field('acteur');

	                                    ?>
	                            
										<tr class="acteurs">
											<td class="colLeft"><b><?php echo $role; ?></b></td>
											<td class="colRight"><?php echo $acteur; ?></td>
										</tr>
								<?php endwhile; ?>

							<?php endif; ?>
                            
						</tbody>
						</table>




						<table class="tableFilm">
						<tbody>

				                        <?php 
		                                 $technique = get_field('technique');	
		                                   if ($technique['realisation']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Réalisation</b></td>
										<td class="colRight"><?php echo $technique['realisation']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['scenario']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Scénario</b></td>
										<td class="colRight"><?php echo $technique['scenario']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['photographie']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Photographie</b></td>
										<td class="colRight"><?php echo $technique['photographie']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['prise_de_son']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Prise de son</b></td>
										<td class="colRight"><?php echo $technique['prise_de_son']; ?></td>
									</tr>

									<?php }   ?>
										<?php
        							if ($technique['costumes']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Costumes</b></td>
										<td class="colRight"><?php echo $technique['costumes']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['maquillage']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Maquillage</b></td>
										<td class="colRight"><?php echo $technique['maquillage']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['decors']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Décors</b></td>
										<td class="colRight"><?php echo $technique['decors']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['direction_artistique']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Direction artistique</b></td>
										<td class="colRight"><?php echo $technique['direction_artistique']; ?></td>
									</tr>

									<?php }   ?>
								<?php
        							if ($technique['montage_image']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Montage image</b></td>
										<td class="colRight"><?php echo $technique['montage_image']; ?></td>
									</tr>

									<?php }   ?>
								<?php
        							if ($technique['montage_son']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Montage son</b></td>
										<td class="colRight"><?php echo $technique['montage_son']; ?></td>
									</tr>

									<?php }   ?>
						
								<?php
        							if ($technique['musique']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Musique</b></td>
										<td class="colRight"><?php echo $technique['musique']; ?></td>
									</tr>

									<?php }   ?>
															<?php
        							if ($technique['mixage']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Mixage</b></td>
										<td class="colRight"><?php echo $technique['mixage']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['effets_speciaux']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Effets spéciaux</b></td>
										<td class="colRight"><?php echo $technique['effets_speciaux']; ?></td>
									</tr>

									<?php }   ?>


									<?php
        							if ($technique['producteur']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Producteur</b></td>
										<td class="colRight"><?php echo $technique['producteur']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['production']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Production</b></td>
										<td class="colRight"><?php echo $technique['production']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['coproduction']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Coproduction</b></td>
										<td class="colRight"><?php echo $technique['coproduction']; ?></td>
									</tr>

									<?php }   ?>
									
									<?php
        							if ($technique['direction_de__la_production']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Direction de la Production</b></td>
										<td class="colRight"><?php echo $technique['direction_de__la_production']; ?></td>
									</tr>

									<?php }   ?>

									
									<?php
        							if ($technique['avec_la_participation_de']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Avec la participation de</b></td>
										<td class="colRight"><?php echo $technique['avec_la_participation_de']; ?></td>
									</tr>

									<?php }   ?>


									<?php
        							if ($technique['avec_le_soutien_de']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Avec le soutien de</b></td>
										<td class="colRight"><?php echo $technique['avec_le_soutien_de']; ?></td>
									</tr>

									<?php }   ?>


									<?php
        							if ($technique['en_partenariat_avec']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>En partenariat avec</b></td>
										<td class="colRight"><?php echo $technique['en_partenariat_avec']; ?></td>
									</tr>

									<?php }   ?>

																		<?php
        							if ($technique['en_association_avec']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>En association avec</b></td>
										<td class="colRight"><?php echo $technique['en_association_avec']; ?></td>
									</tr>

									<?php }   ?>


																											<?php
        							if ($technique['attachee_de_presse']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Attaché(e) de presse</b></td>
										<td class="colRight"><?php echo $technique['attachee_de_presse']; ?></td>
									</tr>

									<?php }   ?>

																<?php
        							if ($technique['distribution']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Distribution</b></td>
										<td class="colRight"><?php echo $technique['distribution']; ?></td>
									</tr>

									<?php }   ?>

																									<?php
        							if ($technique['programmation']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Programmation</b></td>
										<td class="colRight"><?php echo $technique['programmation']; ?></td>
									</tr>

									<?php }   ?>


						</tbody>
						</table>





					<!--</div>-->
					</div>
	</div>

<?php } else { //Livres ?>


<div class="row infoscontent">

					<div class="col-12 order-sm-12">
					<!--<div class="centerTab">-->
						<table class="tableFilm"> <!-- tableLivre -->
						<tbody>
                            

                            <?php if( have_rows('technique') ): ?>
	
                           		<?php while( have_rows('technique') ): the_row(); 

		                          // vars
                                        $titre = get_sub_field('titre');
                                        $valeur = get_sub_field('valeur');

                                    ?>
                            
									<tr>
										<td valign="top" class="colLeft"><b><?php echo $titre; ?></b></td>
										<td class="colRight"><?php echo $valeur; ?></td>
									</tr>
								<?php endwhile; ?>

							<?php endif; ?>

	                            <?php 
		                                   // $technique = get_field('technique');	
		                                    //print_r($technique);
		                                 //   if ($technique){
		                            ?>

		                                              <?php 
		                                    $technique = get_field('technique');	
		                                    //print_r($technique);
		                            if ($technique){
		                                   	$format = $technique['format'];
		                                   	$diffusion = $technique['diffusion'];
		                            ?>

					                            <?php if ($format){ ?>

						                            <tr>
														<td class="colLeft"><b>Format</b></td>
														<td class="colRight"><?php echo $technique['format']; ?></td>
													</tr>
												<?php }  ?> 
												<?php if ($diffusion){ ?>
													<tr>
														<td class="colLeft"><b>Diffusion</b></td>
														<td class="colRight"><?php echo $technique['diffusion']; ?></td>
													</tr>
												<?php }  ?> 
													<?php if ($technique['parution']){ ?>
												<tr>
													<td class="colLeft"><b>Parution</b></td>
													<td class="colRight"><?php echo $technique['parution']; ?></td>
												</tr>
					                            <?php } ?>
												<?php if ($technique['isbn']){ ?>
													<tr>
														<td class="colLeft"><b>ISBN</b></td>
														<td class="colRight"><?php echo $technique['isbn']; ?></td>
													</tr>
		                           				 <?php }  ?>
		                            <?php } ?>




							<?php if ( $price_html = $product->get_price_html() ) : ?>

								<tr class="acteurs">
									<td valign="top" class="colLeft"><b>Prix</b></td>
									<td class="colRight"><?php echo $price_html; ?></td>
								</tr>

							<?php endif; ?>

                            
						</tbody>
						</table>
					<!--</div>-->
					</div>
	</div>





	 <?php } //livres ?>
	
</div>



	
	
	
