<?php
/**
 * The Template for displaying products in a product tag. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_tag.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */



/*****************PAGES FILMS*******************/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); // 'shop'

//wc_get_template( 'archive-product.php' );

//woocommerce_content();

//wp_enqueue_style( 'capricci-produitCss', get_template_directory_uri() . '/css/produit.css',false,null,'all');

$taxonomie = get_queried_object(); 
$tax = $taxonomie->name; 
$taxslug = $taxonomie->slug; 


                  function compare_date($a, $b)
  {
    return strnatcmp($b['date'], $a['date']);
  }


//print_r($taxonomie);
 // echo $tax;
//  $myposts = new WP_Query( array( 'category_name' => $cat ) );
?>

<div id="category">
    

        
    
    <div class="conteneur">                      
    
    <?php
    
//if ($tax != "Hors collection") {
//if ($taxslug != "hors-collection") {



// gestion des films pas encore sortis

                         /* $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1, 
                                'tax_query' => array(
                                   array(
                                    'taxonomy' => 'product_tag',
                                    'field' => 'slug',
                                    'terms' => $taxslug
                                   )
                                )
                            
                                );*/

                                 $args = array( 
                                'posts_per_page' => -1,
                                'post_type'    => 'post', 
                                'category_name' => 'peliculas'
                            ); 



              $j = 0; // counter
          
    
           $ProjetsQuery = new WP_Query($args ); 
         
           if ( $ProjetsQuery->have_posts() ) : 
                 while ( $ProjetsQuery->have_posts() ) : 
                     $ProjetsQuery->the_post(); 
                   
                     $date = get_field('date_de_sortie');
                     $datestamp = strtotime($date);
                      $now = time(); 
                     //$timestamp = strtotime($date);
                    //  $dateformatannee = "Y";
                   //   $annee = date_i18n($dateformatannee, $timestamp);
                      if ((!$date) || ($now < $datestamp)) { $j++; }
                      //if (!$date)  { $j++; }
                endwhile; 

            else : echo "";
            
            endif;

   
        if ($j > 0){ // si il y a au moins un film dont la date de sortie n'est pas définie ou supérieure à la date actuelle
                    ?>
    
                      <div class="container-fluid padding10 content animated <?php //echo $j; ?>">
        
                          <div class="row films">
            
                            <div class="col-md-12">
                                <h2> PRÓXIMAMENTE  </h2>
                            </div>
                        
                          </div>

                        <div class="grid gridcatalogue <?php echo $tax; ?>">
                           <div class="gutter-sizer"></div> 
                              <div class="grid-sizer"></div>



                                               <?php

                                        $ProduitsArray = array();
                                           $x = 0;


                                      if ( $ProjetsQuery->have_posts() ) : 
                                          while ( $ProjetsQuery->have_posts() ) : 
                                             $ProjetsQuery->the_post(); 


                                               $date = get_field('date_de_sortie'); 
                                               $datestamp = strtotime($date);
                                               //$now = getdate();
                                              $now = time();
                                              //print_r($now);
                                              //print_r($datestamp);

                                              $timestamp = strtotime($date);
                                                                            
                                              $dateformatannee = "Y";
                                              $dateformatmois = "F";
                                              $dateformatmois2 = "m";
                                              $dateformatjour = "d";
                                              $annee = date_i18n($dateformatannee, $timestamp);
                                              $jour =  date_i18n($dateformatjour, $timestamp);
                                              $mois =  date_i18n($dateformatmois, $timestamp);
                                              $mois2 =  date_i18n($dateformatmois2, $timestamp);


                                              if ((!$date) || ($now < $datestamp)){



                                                  $ProduitsArray[$x]['titre'] = trim(get_the_title()); // title


                                                   if ($date){
                                                       $ProduitsArray[$x]['dateok'] =  $date; 
                                                      $ProduitsArray[$x]['date'] = $mois2 . $jour;   // date
                                                      $ProduitsArray[$x]['mois'] = date_i18n($dateformatmois, $timestamp);
                                                     $ProduitsArray[$x]['jour'] = date_i18n($dateformatjour, $timestamp);
                                                     $ProduitsArray[$x]['annee'] = date_i18n($dateformatannee, $timestamp);
                                                } else {
                                                   $ProduitsArray[$x]['dateok'] = null;
                                                    $ProduitsArray[$x]['date'] = null;
                                                }

                                                  $ProduitsArray[$x]['affiche'] =  get_field('affiche_du_film');
                                                 

                                                 if(trim(get_field('auteurliste'))){
                                                  $ProduitsArray[$x]['auteur'] = trim(get_field('auteurliste'));
                                                    } else {
                                                        $ProduitsArray[$x]['auteur'] = trim(get_field('auteur'));
                                                    }

                                                 $ProduitsArray[$x]['categorie'] = get_field('categorie');

                                                 $ProduitsArray[$x]['lien'] = get_permalink();

                                                  $x++;



                                              }




                                                    endwhile; ?>
                          
                                     <?php else : ?>
                                  
                                  pas de produit
                          
                         <?php 

                       endif; 
                       ?>
    <?php wp_reset_query(); ?>


<?php

   usort($ProduitsArray, 'compare_date');

for($y = 0; $y < count($ProduitsArray); $y++) {


 ?> <div class="grid-item text-center">

                                                             
             <div class="container">
                     <div class="row">



            <div class="col-12 colimg">
              <a href="<?php echo $ProduitsArray[$y]['lien']; ?>" alt="<?php echo $ProduitsArray[$y]['titre']; ?>">
                    <?php if( $ProduitsArray[$y]['affiche'] ): ?>
                            <img src="<?php echo $ProduitsArray[$y]['affiche'] ?>" alt="<?php echo $ProduitsArray[$y]['titre']; ?>">
                     <?php else : // image par défaut ?>
                            <img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php echo $ProduitsArray[$y]['titre']; ?>">
                      <?php endif; ?>
              </a>
           </div>

                                                            <div class="col-12">  
                                                              <h3 class="titre"><?php echo $ProduitsArray[$y]['titre']; ?></h3>
                                                              <h4><span class="auteur"><?php echo $ProduitsArray[$y]['auteur'];   ?></span></h4>
                                                            
                                                              <?php 
                                                                $dateok = $ProduitsArray[$y]['dateok'];
                                                              if (isset($dateok)){ ?>
                                                              <h5>sortie le <?php echo (float)$ProduitsArray[$y]['jour']. ' ' . $ProduitsArray[$y]['mois'] . ' ' . $ProduitsArray[$y]['annee']; ?></h5>
                                                              <?php } ?>
                                                              <h5><span class="categorie <?php if ($ProduitsArray[$y]['categorie'] === "film d'actualité" ){ echo "d-none"; } ?>"><?php echo $ProduitsArray[$y]['categorie']; ?></span></h5>
                                                            </div>  
<?php


    ?>
        </div>
          </div>
                                                        
               </div>
    




                       <?php

} // end for
?>

                  </div> <!-- grid gridcatalogue -->
        
        
       </div> <!-- container-fluid -->

<?php
} //end if j >0 ?

?>

          




    <?php
    


                         /* $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1, 
                                'tax_query' => array(
                                   array(
                                    'taxonomy' => 'product_tag',
                                    'field' => 'slug',
                                    'terms' => $taxslug
                                   )
                                )
                            
                                );*/

                                 $args = array( 
                                'posts_per_page' => -1,
                                'post_type'    => 'post', 
                                'category_name' => 'peliculas'
                            ); 



              $j = 0; // counter
          
    
           $ProjetsQuery = new WP_Query($args ); 
         
           if ( $ProjetsQuery->have_posts() ) : 
                 while ( $ProjetsQuery->have_posts() ) : 
                     $ProjetsQuery->the_post(); 
                   
                     $date = get_field('date_de_sortie');
                     $datestamp = strtotime($date);
                      $now = time(); 
                     //$timestamp = strtotime($date);
                    //  $dateformatannee = "Y";
                   //   $annee = date_i18n($dateformatannee, $timestamp);
                      if ((!$date) || ($now < $datestamp)) { $j++; }
                      //if (!$date)  { $j++; }
                endwhile; 

            else : echo "";
            
            endif;

   
        if ($j > 0){ // si il y a au moins un film dont la date de sortie n'est pas définie ou supérieure à la date actuelle
                    ?>
    
                      <div class="container-fluid padding10 content animated <?php //echo $j; ?>">
        
                          <div class="row films">
            
                            <div class="col-md-12">
                                <h2>   </h2>
                            </div>
                        
                          </div>

                        <div class="grid gridcatalogue <?php echo $tax; ?>">
                           <div class="gutter-sizer"></div> 
                              <div class="grid-sizer"></div>



                                               <?php

                                        $ProduitsArray = array();
                                           $x = 0;


                                      if ( $ProjetsQuery->have_posts() ) : 
                                          while ( $ProjetsQuery->have_posts() ) : 
                                             $ProjetsQuery->the_post(); 


                                               $date = get_field('date_de_sortie'); 
                                               $datestamp = strtotime($date);
                                               //$now = getdate();
                                              $now = time();
                                              //print_r($now);
                                              //print_r($datestamp);

                                              $timestamp = strtotime($date);
                                                                            
                                              $dateformatannee = "Y";
                                              $dateformatmois = "F";
                                              $dateformatmois2 = "m";
                                              $dateformatjour = "d";
                                              $annee = date_i18n($dateformatannee, $timestamp);
                                              $jour =  date_i18n($dateformatjour, $timestamp);
                                              $mois =  date_i18n($dateformatmois, $timestamp);
                                              $mois2 =  date_i18n($dateformatmois2, $timestamp);


                                              if (($date) && ($now >= $datestamp)){



                                                  $ProduitsArray[$x]['titre'] = trim(get_the_title()); // title


                                                   if ($date){
                                                       $ProduitsArray[$x]['dateok'] =  $date; 
                                                      $ProduitsArray[$x]['date'] = $mois2 . $jour;   // date
                                                      $ProduitsArray[$x]['mois'] = date_i18n($dateformatmois, $timestamp);
                                                     $ProduitsArray[$x]['jour'] = date_i18n($dateformatjour, $timestamp);
                                                     $ProduitsArray[$x]['annee'] = date_i18n($dateformatannee, $timestamp);
                                                } else {
                                                   $ProduitsArray[$x]['dateok'] = null;
                                                    $ProduitsArray[$x]['date'] = null;
                                                }

                                                  $ProduitsArray[$x]['affiche'] =  get_field('affiche_du_film');
                                                 

                                                 if(trim(get_field('auteurliste'))){
                                                  $ProduitsArray[$x]['auteur'] = trim(get_field('auteurliste'));
                                                    } else {
                                                        $ProduitsArray[$x]['auteur'] = trim(get_field('auteur'));
                                                    }

                                                 $ProduitsArray[$x]['categorie'] = get_field('categorie');

                                                 $ProduitsArray[$x]['lien'] = get_permalink();

                                                  $x++;



                                              }




                                                    endwhile; ?>
                          
                                     <?php else : ?>
                                  
                                  pas de produit
                          
                         <?php 

                       endif; 
                       ?>
    <?php wp_reset_query(); ?>


<?php

   usort($ProduitsArray, 'compare_date');

for($y = 0; $y < count($ProduitsArray); $y++) {


 ?> <div class="grid-item text-center">

                                                             
             <div class="container">
                     <div class="row">



            <div class="col-12 colimg">
              <a href="<?php echo $ProduitsArray[$y]['lien']; ?>" alt="<?php echo $ProduitsArray[$y]['titre']; ?>">
                    <?php if( $ProduitsArray[$y]['affiche'] ): ?>
                            <img src="<?php echo $ProduitsArray[$y]['affiche'] ?>" alt="<?php echo $ProduitsArray[$y]['titre']; ?>">
                     <?php else : // image par défaut ?>
                            <img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php echo $ProduitsArray[$y]['titre']; ?>">
                      <?php endif; ?>
              </a>
           </div>

                                                            <div class="col-12">  
                                                              <h3 class="titre"><?php echo $ProduitsArray[$y]['titre']; ?></h3>
                                                              <h4><span class="auteur"><?php echo $ProduitsArray[$y]['auteur'];   ?></span></h4>
                                                            
                                                              <?php 
                                                                $dateok = $ProduitsArray[$y]['dateok'];
                                                              if (isset($dateok)){ ?>
                                                              <h5>sortie le <?php echo (float)$ProduitsArray[$y]['jour']. ' ' . $ProduitsArray[$y]['mois'] . ' ' . $ProduitsArray[$y]['annee']; ?></h5>
                                                              <?php } ?>
                                                              <h5><span class="categorie <?php if ($ProduitsArray[$y]['categorie'] === "film d'actualité" ){ echo "d-none"; } ?>"><?php echo $ProduitsArray[$y]['categorie']; ?></span></h5>
                                                            </div>  
<?php


    ?>
        </div>
          </div>
                                                        
               </div>
    




                       <?php

} // end for
?>

                  </div> <!-- grid gridcatalogue -->
        
        
       </div> <!-- container-fluid -->

<?php
} //end if j >0 ?

?>

          















</div>
</div>


<?php



get_footer(); 
//  'shop'