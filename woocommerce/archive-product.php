<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

/**************** PAGE BOUTIQUE ************************************/

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

//wp_enqueue_style( 'capricci-boutiqueCss', get_template_directory_uri() . '/css/boutique.css',false,null,'all');

$categorie = get_queried_object(); 
$cat = $categorie->name; 
$catid = $categorie->ID; 
$catslug = $categorie->slug; 


                  function compare_date($a, $b)
  {
    return strnatcmp($b['date'], $a['date']);
  }


if (isset($_GET["id"])) {

	$id = htmlspecialchars($_GET["id"]); 
$product = wc_get_product($id);
//print_r($product);
}


//echo $cat;

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );


         // AFFICHER PRODUITS EN STOCK && avec prix défini
		// même si normalement si c'est dans DVD c'est que c'est un DVD et pas un film

    				

                                        $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1,
                                'product_cat' => $cat,
                                //'stock_status' => 'instock'
                                //'product_tag' => $tax      
                                );
                    

// passer id produit ajouter en parametre
// récup id produit
// + variation...
// afficher infos



?>


<div class="popup">
    <div class="popupcontent  animated fadeInDown">
	    <div class="row">
	        <div class="col-12">
	        <h2>CET ARTICLE A ETE AJOUTE AU PANIER</h2>
	         </div>   
	             <div class="col-xl-6 text-center margintop">
                 <a href="#" title="Continuer mes achats"><button class=" cta ctapopup continuermesachats">Continuer mes achats</button></a>
            </div>

			<div class="col-xl-6 text-center margintop marginbottom">
	    	   <?php /*global $woocommerce;*/ $cart_url = wc_get_cart_url(); // added_to_cart wc-forward ?>
	    	   <a href="<?php echo $cart_url; ?>" class="" title="Voir le panier"><button class=" cta ctapopup">Voir mon panier</button></a>
			</div>	
	    </div>
	</div>
</div>


		
<div id="boutique">

	<header class="container-fluid padding10">

		<div class="row selectrow">

					<?php 
					//$termDVD = get_term_by('name', 'DVD', 'category'); 
					//print_r($termDVD);
					//$idDVD = $termDVD->term_id;
					//echo $idDVD;
					//$category_id_dvd = get_cat_ID( 'DVD' );
					//$category_link_dvd = get_category_link( $category_id_dvd );
					//$category_id_livres = get_cat_ID( 'Livres' );
					$categoryDVD = get_term_by('name', 'DVD', 'product_cat');
					$categoryDVDid = $categoryDVD->term_id;
					$category_link_dvd = get_category_link( $categoryDVDid );
					$categoryLIVRES = get_term_by('name', 'Livres', 'product_cat');
					$categoryLIVRESid = $categoryLIVRES->term_id;
					$category_link_livres = get_category_link( $categoryLIVRESid );
					?>
					<?php //echo "lololo"; print_r($categoryDVD); ?>

			<div class="col-lg-2 offset-lg-1 ">
				<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" class=" selectdark"> <!-- selectcategoryboutique -->
					<option selected disabled>CATEGORIE</option> <!-- value="sameCategoryBoutique" -->

					<option value="<?php echo esc_url( $category_link_dvd ); ?>" <?php if ($cat=="DVD"){ echo ' selected'; } ?>>DVD</option>
					<option value="<?php echo esc_url( $category_link_livres );  ?>" <?php if ($cat=="Livres"){ echo ' selected'; } ?>>Livres</option>
				</select>
			</div>
			<?php if ($cat=="Livres"){ ?>
			<div class="col-md-3">
				<select class="selectcollection" >
					<option selected disabled>COLLECTION</option>
					<option value="sameCollection">Tout de A à Z</option>
					<option value="sameCollection">La Première Collection</option>
					<option value="sameCollection">Actualité Critique</option>					
					<option value="sameCollection">Capricci stories</option>
					<option value="sameCollection">Hors collection</option>
				</select>
			</div>
			<?php } ?>
		
			<div class="col-lg-3">
				<select class="selecttitre" data-filter="titre">
					<option selected disabled>TITRE</option>

                   <?php

                    $titreArray = array();
                        $ProjetsQuery = new WP_Query($args ); 
                            if ( $ProjetsQuery->have_posts() ) : 
                                while ( $ProjetsQuery->have_posts() ) : 
                                    $ProjetsQuery->the_post(); 


                   if (!in_array(trim(get_the_title()), $titreArray)){

	                  $titreArray[] = trim(get_the_title()); 
	                  //print_r($auteurArray)  ;

  					}
                    ?>




                    
                                <?php endwhile; ?>
                            <?php endif; ?>
                    <?php wp_reset_query(); ?>


<?php

sort($titreArray);
foreach ($titreArray as $key => $val) {

  ?>
         <option value="sameTitle"><?php echo $val; ?></option>
  
    <?php 

  }

    ?> 



				</select>
			</div>
			<div class="col-lg-3">
				<select class="selectauteur">
					<option selected disabled>AUTEUR</option>
 						<?php

 						$auteurArray = array();
                        $ProjetsQuery = new WP_Query($args ); 
                            if ( $ProjetsQuery->have_posts() ) : 
                                while ( $ProjetsQuery->have_posts() ) : 
                                    $ProjetsQuery->the_post(); 

                                    if (!in_array(trim(get_field('auteur')), $auteurArray)){

                  $auteurArray[] = trim(get_field('auteur')); 
                  //print_r($auteurArray)  ;

  }
                    ?>
					
                    
                                <?php endwhile; ?>
                            <?php endif; ?>
                    <?php wp_reset_query(); ?>


                    <?php

sort($auteurArray);
foreach ($auteurArray as $key => $val) {

  ?>
       <option value="sameAuteur"><?php echo $val; ?></option>
  
    <?php 

  }

    ?>    
					
				</select>
			</div>


		</div>
		<div class="row alpharow">
			<div class="col alphabetical">
		<!--<a href="#" class="selectalpha a">A</a> B C D E F G H I J K L M N O P Q R S T U V W X Y Z-->
		<a href="#" class="selectalpha nostyle" data-filter=".a">A</a>
		<a href="#" class="selectalpha nostyle" data-filter=".b">B</a>
		<a href="#" class="selectalpha nostyle" data-filter=".c">C</a>
		<a href="#" class="selectalpha nostyle" data-filter=".d">D</a>
		<a href="#" class="selectalpha nostyle" data-filter=".e">E</a>
		<a href="#" class="selectalpha nostyle" data-filter=".f">F</a>
		<a href="#" class="selectalpha nostyle" data-filter=".g">G</a>
		<a href="#" class="selectalpha nostyle" data-filter=".h">H</a>
		<a href="#" class="selectalpha nostyle" data-filter=".i">I</a>
		<a href="#" class="selectalpha nostyle" data-filter=".j">J</a>
		<a href="#" class="selectalpha nostyle" data-filter=".k">K</a>
		<a href="#" class="selectalpha nostyle" data-filter=".l">L</a>
		<a href="#" class="selectalpha nostyle" data-filter=".m">M</a>
		<a href="#" class="selectalpha nostyle" data-filter=".n">N</a>
		<a href="#" class="selectalpha nostyle" data-filter=".o">O</a>
		<a href="#" class="selectalpha nostyle" data-filter=".p">P</a>
		<a href="#" class="selectalpha nostyle" data-filter=".q">Q</a>
		<a href="#" class="selectalpha nostyle" data-filter=".r">R</a>
		<a href="#" class="selectalpha nostyle" data-filter=".s">S</a>
		<a href="#" class="selectalpha nostyle" data-filter=".t">T</a>
		<a href="#" class="selectalpha nostyle" data-filter=".u">U</a>
		<a href="#" class="selectalpha nostyle" data-filter=".v">V</a>
		<a href="#" class="selectalpha nostyle" data-filter=".w">W</a>
		<a href="#" class="selectalpha nostyle" data-filter=".x">X</a>
		<a href="#" class="selectalpha nostyle" data-filter=".y">Y</a>
		<a href="#" class="selectalpha nostyle" data-filter=".z">Z</a>
		</div>
		</div>
		
	</header>


	 <div class="conteneur"> 
	
	<div class="container-fluid contentnouveautestitre">
		<div class="row">
			<div class="col-lg-12 livres nouveautes">
				<h2>NOUVEAUTéS</h2>
			</div>
		</div>		
	</div>
					
	<div class="container-fluid contentnouveautes">
		
		<div class="row">

			<div class="col-lg-12 row166">	
				<div class="row">

     <?php

		 $nouveautes = array(
                                'post_type' => 'product',
                                //'posts_per_page' => 5,
                                'posts_per_page' => -1,
                                //'stock_status' => 'instock'
                                'product_cat' => 'dvd, livres',
                                //'product_tag' => $tax      
                                );


		                      /*           $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 80,
                                'product_cat' => $cat,
                        
                                );*/

                        $NouveautesQuery = new WP_Query($nouveautes ); 

  									 $ProduitsArray = array();
                                           $x = 0;


                            if ( $NouveautesQuery->have_posts() ) : 
                                while ( $NouveautesQuery->have_posts() ) : 
                                    $NouveautesQuery->the_post(); 



                                              //if (!$date){
                $_product = wc_get_product( );
                                               $date = get_field('date_de_sortie'); 
                                               $price_html = $_product->get_price_html();

                                              //if (!$date){
									if ($date && $price_html) {
                                               //	if ($date) {

                                               	           //    $date =  get_field('date_de_sortie');                                       
                                                                           //$date = $ProduitsArray[$y]['date']; 
                                                                            $timestamp = strtotime($date);
                                                                            
                                                                            $dateformatannee = "Y";
                                                                            $dateformatmois = "F";
                                                                            $dateformatmois2 = "m";
                                                                            $dateformatjour = "d";
                                                                            $annee = date_i18n($dateformatannee, $timestamp);
                                                                            $jour =  date_i18n($dateformatjour, $timestamp);
                                                                            $mois =  date_i18n($dateformatmois, $timestamp);
                                                                            $mois2 =  date_i18n($dateformatmois2, $timestamp);  

                                               	  $ProduitsArray[$x]['date'] = $annee . $mois2 . $jour;  
 												//$ProduitsArray[$x]['date'] =  get_field('date_de_sortie');   

                                                $ProduitsArray[$x]['titre'] = trim(get_the_title()); // title

                                                $ProduitsArray[$x]['affiche'] =  get_field('affiche_du_film');
                                                $ProduitsArray[$x]['auteur'] = trim(get_field('auteur'));
                                               $ProduitsArray[$x]['categorie'] = get_field('categorie');

                                               $ProduitsArray[$x]['lien'] = get_permalink();
                                              $ProduitsArray[$x]['synopsis'] = sanitize_text_field(substr(get_field('synopsis', false, false), 0 , 250));

                                              $ProduitsArray[$x]['bonus'] = get_field('bonus'); 
									$ProduitsArray[$x]['preface'] = get_field('preface'); 
							

												$_product = wc_get_product( );
												$type = $_product->get_type();
												$id = $_product->get_id();

												 $ProduitsArray[$x]['type'] = $type;
												 $ProduitsArray[$x]['id'] = $id;
												 $ProduitsArray[$x]['product'] = $_product;

												//print_r($_product);
												$price_html = $_product->get_price_html();

												$ProduitsArray[$x]['prix'] = $price_html;

                                                $x++;


}




                   endwhile; endif; 
                     wp_reset_query(); 

 usort($ProduitsArray, 'compare_date');

//for($y = 0; $y < count($ProduitsArray); $y++) {
	for($y = 0; $y < 5; $y++) {

                     ?>




				<div class="col-lg-2 nouveauteitem">
						<div class="row">
							<div class="col-lg-4">


									<a href="<?php echo $ProduitsArray[$y]['lien']; ?>" alt="<?php echo $ProduitsArray[$y]['titre']; ?>">
                  						  <?php if( $ProduitsArray[$y]['affiche'] ): ?>
                     						       <img src="<?php echo $ProduitsArray[$y]['affiche']; ?>" alt="<?php echo $ProduitsArray[$y]['titre']; ?>">
                    					 <?php else : // image par défaut ?>
                     					       <img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php echo $ProduitsArray[$y]['titre']; ?>">
                     					 <?php endif; ?>
              						</a>
							


							<?php 
							/*$_product = wc_get_product( );
							$type = $_product->get_type();

							$price_html = $_product->get_price_html();*/

					
 							if (($ProduitsArray[$y]['type'] == 'simple') && ( $ProduitsArray[$y]['prix'])) :
							?>

								<div class="col-4 col-md-12 col-lg-12 text-center" style="padding:0;">
								<?php echo $ProduitsArray[$y]['prix']; //echo $price_html; ?>
									
								</div>

							<?php endif; ?>

									<div class="col-4 col-md-12 col-lg-12" style="padding:0;">
										<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

										<?php 
										//woocommerce_template_loop_add_to_cart();  

   $argslol = array(
                                /*'post_type' => 'product',
                                'posts_per_page' => 80,
                                'product_cat' => $cat,*/
                                'post_type' => 'product',
                           //     'posts_per_page' => -1,
                                'p' => $ProduitsArray[$y]['id']
                                //'product_id' => $ProduitsArray[$y]['id']
                                //'stock_status' => 'instock'
                                //'product_tag' => $tax      
                                );
                    

							$ProjetsQuery = new WP_Query($argslol); 
								if ( $ProjetsQuery->have_posts() ) : 
                                          while ( $ProjetsQuery->have_posts() ) : 
                                             $ProjetsQuery->the_post(); 

woocommerce_template_loop_add_to_cart();  

endwhile;
endif;

?>

										<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
									</div>

							</div>
								<div class="col-lg-8">
										<h5>
											<span class="categorieboutique">

												<?php 
												//echo $cat; 
												//global $product; 
												$catnouveaute = get_the_terms( $ProduitsArray[$y]['id'] /*$product->get_id()*/, 'product_cat' );
										        //$nterms = get_the_terms( $post->ID, 'product_tag'  );
										        if ( ! empty( $catnouveaute ) && ! is_wp_error( $catnouveaute ) ){
										        foreach ($catnouveaute  as $term  ) {
										            //$product_cat_id = $term->term_id;
										            $product_cat_name = $term->name;
										            if (($product_cat_name == "DVD") || ($product_cat_name == "Livres")){
										            echo $product_cat_name;
										        }
										           // break;
										       			 }
										 		   }
										        
												?>
											</span>
										<?php 
										//if ($cat=="Livres"){  
											if ($product_cat_name =="Livres"){ 
										

													?>
											-  <span class="collection">
													<?php 
														//echo $product->get_id(); 
														//$tags = get_the_tags();
														//echo $tags[0];
														$terms = get_the_terms($ProduitsArray[$y]['id'], 'product_tag' );
														//$terms = get_terms('product_tag' );
														//$term_array = array();
														if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
   															foreach ( $terms as $term ) {
      														  $product_tag_name = $term->name;
      														  if ($product_tag_name != "Tout de A à Z") {echo $product_tag_name;}
   																 }
															}
															//echo $term_array[0];
													?>
												
												</span>
										<?php  } ?> 
										</h5>
										<a href="<?php echo $ProduitsArray[$y]['lien']; //get_permalink(); ?>" alt="<?php echo $ProduitsArray[$y]['titre']; //the_title(); ?>">
											<h3 class="titre"><?php echo $ProduitsArray[$y]['titre']; //the_title(); ?></h3>
										</a>
										<h4><span class="auteur"><?php echo $ProduitsArray[$y]['auteur']; //get_field('auteur'); ?></span></h4>
										<p class="quatrieme">
											<?php //echo get_field('synopsis'); ?>
												<?php echo $ProduitsArray[$y]['synopsis']; //sanitize_text_field(substr(get_field('synopsis', false, false), 0 , 250)); ?>
												<?php //echo get_field('synopsis', false, false); ?>
												<a href="<?php echo $ProduitsArray[$y]['lien']; //get_permalink(); ?>" alt="lire plus"> ... (lire plus)</a>
											</p>
									<?php // echo get_field('lauteur', false, false); ?>
								</div>

						</div>
				</div>



      <?php } ?>                       
                          



				</div>
			</div>
		</div>			
	</div>
	
	<div class="container-fluid content">
		<div class="row">
			<div class="col-lg-12 livres">
				<h2 class="titretrioff">TOUS LES <?php echo $cat; ?></h2>
				<h2 class="titretrion"></h2>
				<div class=" gridboutique gridcatalogue">
					 <div class="gutter-sizer"></div> 
					 <div class="grid-sizer"></div>

					
 						<?php
                        $ProjetsQuery = new WP_Query($args ); 
                           // if ( $ProjetsQuery->have_posts() ) : 
                             //   while ( $ProjetsQuery->have_posts() ) : 
                                //    $ProjetsQuery->the_post(); 
                  
                    


  									 $ProduitsArray = array();
                                           $x = 0;


                                      if ( $ProjetsQuery->have_posts() ) : 
                                          while ( $ProjetsQuery->have_posts() ) : 
                                             $ProjetsQuery->the_post(); 

                                             $_product = wc_get_product( );
                                               $date = get_field('date_de_sortie'); 
                                               $price_html = $_product->get_price_html();

                                              //if (!$date){
									if ($date && $price_html) {

                                  $timestamp = strtotime($date);
                                                                            
                                                                            $dateformatannee = "Y";
                                                                            $dateformatmois = "F";
                                                                            $dateformatmois2 = "m";
                                                                            $dateformatjour = "d";
                                                                            $annee = date_i18n($dateformatannee, $timestamp);
                                                                            $jour =  date_i18n($dateformatjour, $timestamp);
                                                                            $mois =  date_i18n($dateformatmois, $timestamp);
                                                                            $mois2 =  date_i18n($dateformatmois2, $timestamp);  

                                               	  $ProduitsArray[$x]['date'] = $annee . $mois2 . $jour; 
                                               	 //$ProduitsArray[$x]['date'] =  get_field('date_de_sortie');      

                                                $ProduitsArray[$x]['titre'] = trim(get_the_title()); // title

                                                $ProduitsArray[$x]['affiche'] =  get_field('affiche_du_film');
                                                $ProduitsArray[$x]['auteur'] = trim(get_field('auteur'));
                                               $ProduitsArray[$x]['categorie'] = get_field('categorie');

                                               $ProduitsArray[$x]['lien'] = get_permalink();
                                              $ProduitsArray[$x]['synopsis'] = sanitize_text_field(substr(get_field('synopsis', false, false), 0 , 250));

                                              $ProduitsArray[$x]['bonus'] = get_field('bonus'); 
									$ProduitsArray[$x]['preface'] = get_field('preface'); 
							

												
												$type = $_product->get_type();
												$id = $_product->get_id();

												 $ProduitsArray[$x]['type'] = $type;
												 $ProduitsArray[$x]['id'] = $id;
												 $ProduitsArray[$x]['product'] = $_product;

												//print_r($_product);
												

												$ProduitsArray[$x]['prix'] = $price_html;

                                                $x++;


									}
                                             // }




                                                    endwhile; 
                                                    
                            endif; 
                    wp_reset_query();


  usort($ProduitsArray, 'compare_date');

for($y = 0; $y < count($ProduitsArray); $y++) {
                  
?>
                          
					<div class="grid-item container-fluid">
					
						<div class="row">
							<div class="col-lg-4 col-md-2 col-5">


						              <a href="<?php echo $ProduitsArray[$y]['lien']; ?>" alt="<?php echo $ProduitsArray[$y]['titre']; ?>">
                  						  <?php if( $ProduitsArray[$y]['affiche'] ): ?>
                     						       <img src="<?php echo $ProduitsArray[$y]['affiche']; ?>" alt="<?php echo $ProduitsArray[$y]['titre']; ?>">
                    					 <?php else : // image par défaut ?>
                     					       <img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php echo $ProduitsArray[$y]['titre']; ?>">
                     					 <?php endif; ?>
              						</a>
							


		<?php 
						


							//$price_html = $_product->get_variation_price('min');
							//if ( $price_html && ($type == 'simple' )) :  
								// && is_single($_product) singular ?? 
 							if (($ProduitsArray[$y]['type'] == 'simple') && ( $ProduitsArray[$y]['prix'])) :
							?>

								<div class="col-4 col-md-12 col-lg-12 text-center" style="padding:0;">
								<?php echo $ProduitsArray[$y]['prix']; //echo $price_html; ?>
									
								</div>
								

							<?php endif; ?>

							</div>
							<div class="col-lg-8 col-md-5 col-7">
								<h5>
									<!--<span class="categorieboutique">Livre</span> -  <span class="collection">Première collection</span>-->
		<span class="categorieboutique">
												<?php 
												//echo $cat; 
												//global $product; 
												$catnouveaute = get_the_terms( $ProduitsArray[$y]['id'] /*$product->get_id()*/, 'product_cat' );
										        //$nterms = get_the_terms( $post->ID, 'product_tag'  );
										        if ( ! empty( $catnouveaute ) && ! is_wp_error( $catnouveaute ) ){
										        foreach ($catnouveaute  as $term  ) {
										            //$product_cat_id = $term->term_id;
										            $product_cat_name = $term->name;
										            if (($product_cat_name == "DVD") || ($product_cat_name == "Livres")){
										            echo $product_cat_name;
										        }
										           // break;
										       			 }
										 		   }
										        
												?>
											</span>
										<?php 


											if ($product_cat_name =="Livres"){ 
											?>  
																								<?php 
														//echo $product->get_id(); 
														//$tags = get_the_tags();
														//echo $tags[0];
														$terms = get_the_terms($ProduitsArray[$y]['id'] /*$product->get_id()*/, 'product_tag' );
														//$terms = get_terms('product_tag' );
														//$term_array = array();
														if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
   															foreach ( $terms as $term ) {
      														  $product_tag_name = $term->name;
      														  	  if ($product_tag_name != "Tout de A à Z") { $collection = $product_tag_name;}
      														 // echo $product_tag_name;
   																 }
															}
															//echo $term_array[0];
													?>
											-  <span class="collection"><?php echo $collection; ?></span>
										<?php  } ?> 
								</h5>

								<a href="<?php echo $ProduitsArray[$y]['lien']; //echo get_permalink(); ?>" alt="<?php  echo $ProduitsArray[$y]['titre']; //the_title(); ?>">
									<h3 class="titre <?php echo $ProduitsArray[$y]['date']; ?>"><?php echo $ProduitsArray[$y]['titre']; //the_title(); ?></h3>
								</a>


								<h4><span class="auteur"><?php echo $ProduitsArray[$y]['auteur']; //echo get_field('auteur'); ?></span></h4>

								<p class="quatrieme">
									<?php //echo substr(get_field('synopsis', false, false), 0 , 300); ?>
									<?php echo $ProduitsArray[$y]['synopsis']; // echo sanitize_text_field(substr(get_field('synopsis', false, false), 0 , 250)); ?>
									<a href="<?php echo $ProduitsArray[$y]['lien']; //echo get_permalink(); ?>" alt="lire plus"> ... (lire plus)</a></p>
							
							</div>

							<div class="col-lg-4 col-md-2 order-lg-3 order-md-4 order-sm-3">
								
								<div class="row">
									<div class="col-4 col-md-12 col-lg-12 <?php echo $ProduitsArray[$y]['id']; //$ProduitsArray[$y]['product']; ?>">
										<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
										<?php 

               $argslol = array(
                                /*'post_type' => 'product',
                                'posts_per_page' => 80,
                                'product_cat' => $cat,*/
                                'post_type' => 'product',
                                'p' => $ProduitsArray[$y]['id']
                                //'product_id' => $ProduitsArray[$y]['id']
                                //'stock_status' => 'instock'
                                //'product_tag' => $tax      
                                );
                    

							$ProjetsQuery = new WP_Query($argslol); 
								if ( $ProjetsQuery->have_posts() ) : 
                                          while ( $ProjetsQuery->have_posts() ) : 
                                             $ProjetsQuery->the_post(); 

woocommerce_template_loop_add_to_cart();  

endwhile;
endif;


												




/*
                                        $argscart = array(
              		'attributes' => array(
					'data-product_id'  => $ProduitsArray[$y]['id'],
				)

                                );

                                        woocommerce_template_loop_add_to_cart($argscart);*/
                    


/*
										$args = array(
				'attributes' => array(
					'data-product_id'  => $ProduitsArray[$y]['id'],
				)
			);

												woocommerce_template_loop_add_to_cart($args);  */
												// $ProduitsArray[$y]['id'];


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
	}*/












										?>
										<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
									</div>

									<?php // if ( $price_html = $product->get_price_html() ) { echo $price_html; } ?>

								</div>
								
							</div>
							<div class="col-lg-8 col-md-3 order-lg-4 order-md-3 order-sm-4 sommaire">
							
									<?php echo $ProduitsArray[$y]['bonus']; //echo get_field('bonus'); ?>
									<?php //echo $ProduitsArray[$y]['preface']; //echo get_field('preface'); ?>
							
							</div>
						</div>
					</div>
					


                       <?php

}
?>

				
					
					
					
					
					

				</div>
			
			</div>

			
		</div>
	</div>	
	
	
	
	<div class="navdroiteboutique">
		<div class="fleche">
			<a href="#" alt="" class="control-next-nouveaute">
				<img src="<?php bloginfo('stylesheet_directory');?>/img/diaporamaflechedroite.svg" alt=""/>
			</a>
		</div>
	</div>
	
	<div class="navgaucheboutique d-none">
		<div class="fleche">
			<a href="#" alt="" class="control-prev-nouveaute">
				<img src="<?php bloginfo('stylesheet_directory');?>/img/diaporamaflechegauche.svg" alt=""/>
			</a>
		</div>
	</div>
	
	<div class="coldroiteboutique">
				<div class="row panier">
					<div class="col-lg-12"> <h2 class="panier">PANIER</h2> </div>
					<div class="col-lg-12" style="margin-bottom: .5rem;"> <?php echo sprintf ( _n( '%d produit', '%d produits', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> </div>


						<?php
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								?>
									<div class="row">


										<div class="col-md-4 product-thumbnail"  style="padding:5px; padding-left:13px;">

												<?php
												
												$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
												

												?>	

															<a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>">
																<?php 
																$affiche = get_field('affiche_du_film', $product_id ); 
																if( $affiche ) : 
																	?>
					                                  				<img src="<?php the_field('affiche_du_film', $product_id ); // the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>">
					                                			<?php else : // image par défaut ?>
					                                    			<img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>">
					                                			<?php endif; ?>
															</a>

										</div>
										<div class="col-md-8 product-name panierdroite"  style="padding:5px; text-align: left;" data-title="<?php esc_attr_e( 'Product', 'understrap' ); ?>">
									

												<?php



												if ( ! $product_permalink ) {
													echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
												} else {
													echo "<h4>" . wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) ) . "</h4>";
													//echo "<br>";
													//echo "<h5>" . get_field('auteur', $product_id) . "</h5>"; 
													//echo "<h5> Quantité : " . $cart_item['quantity'] . "</h5>"; 
													//echo $cart_item['quantity'];
													echo "<br>";

													echo "<h6 style='color:black;font-weight:bold;'>" . $cart_item['quantity'] . " X ";

															            // . $product_cat_name . ' ' . "</h6>";
													echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); 
													echo "</h6>";
													
													/*$categorie =  get_the_terms($product_id, 'product_cat'); 
													if ( ! empty( $categorie ) && ! is_wp_error( $categorie ) ){
													        foreach ($categorie  as $term  ) {
											
														           $product_cat_name = $term->name;
															            echo "<h6>" . $product_cat_name . ' ' . "</h6>";											  
															   
															 }
														}*/
												}


												do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

												// Meta data.
												echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

												// Backorder notification.
												if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
													echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'understrap' ) . '</p>', $product_id ) );
												}
												?>
												<!--</td>-->
										</div>



										<div class="product-price" data-title="<?php esc_attr_e( 'Price', 'understrap' ); ?>">
											<?php
												echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
											?>
										
										</div>


							</div> <!-- row -->
								<?php
							}
						}
						?>



					<div class="col-lg-12"> 
						<div class="row total">
							<div class="col-lg-6">TOTAL </div> 
							<div class="col-lg-6"><span class="noir"><?php echo WC()->cart->get_cart_total(); ?></span> </div> 
						</div>
					</div>
					<div class="col-lg-10 offset-lg-1">
						<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><button class="cta ctapanier text-center">VOIR PANIER</button> </a>
					</div>
					
				</div>
				<div class="crosssells">

				<!--<p>VOUS AIMEREZ AUSSI</p>-->
				<?php 
				// do_action( 'woocommerce_after_single_product_summary' ); 
				//do_action( 'woocommerce_upsell_display' ); 
				/*        woocommerce_product_loop_start();
        		    foreach ( $cross_sells as $cross_sell ) :
                $post_object = get_post( $cross_sell->get_id() );
                setup_postdata( $GLOBALS['post'] =& $post_object );
                wc_get_template_part( 'content', 'product' ); 
            endforeach;
        woocommerce_product_loop_end();*/

        //get_sidebar('shop');
        //get_template_part( 'global-templates/right-sidebar-check' );
        dynamic_sidebar( 'right-sidebar' );

        ?>
				</div>
				
	</div>
	
	
	


</div> <!-- conteneur -->

</div> <!-- boutique -->

<?php
get_footer( 'shop' );
