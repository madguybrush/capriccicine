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



/*****************PAGES FILMS ET LIVRES*******************/


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
    
	<header class="<?php echo $taxslug . ' ' . $tax ;?> container-fluid padding10">

		<div class="row">

			<div class="<?php if (/*($taxslug == "production") ||*/ ($taxslug == "distribution") /*|| ($taxslug == "courts-metrages")*/) { echo 'col-sm-4'; } else { /*livres*/ echo 'col-sm-6'; /*'col-sm-8 offset-sm-2';*/ } ?>">
				<select class="selecttitre" data-filter="titre">
					<option selected disabled>TITRE</option>
                    
                    
                    <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1,
                               // 'product_cat' => 'films, dvd',
                                //'product_tag' => $tax, 
                                //'product_tag_slug' => $taxslug
                                'tax_query' => array(
                                   array(
                                    'taxonomy' => 'product_tag',
                                    'field' => 'slug',
                                    'terms' => $taxslug
                                   )
                                )
                                //'tax_query' => array(
                                //  'taxonomy' => 'product_tag',
                                //  'field' => 'slug',
                                //  'terms' => $taxslug
                               //   )     
                                );

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
      <?php //if (($taxslug == "production") || ($taxslug == "distribution") || ($taxslug == "courts-metrages")) { ?>
			<!--<div class="col-sm-4">-->
        <div class="<?php if ($taxslug == "distribution") { echo 'col-sm-4'; } else { /*livres*/ echo 'col-sm-6'; } ?>">
				<select class="selectauteur">
					<option selected disabled>AUTEUR</option>
                    <?php
                           // $args = array(
                            //    'post_type' => 'product',
                            //    'posts_per_page' => 80,
                            //    'product_tag' => $tax      
                            //    );

                               $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1, //80
                               // 'product_cat' => 'films, dvd',
                                //'product_tag' => $tax, 
                                //'product_tag_slug' => $taxslug
                                'tax_query' => array(
                                   array(
                                    'taxonomy' => 'product_tag',
                                    'field' => 'slug',
                                    'terms' => $taxslug
                                   )
                                )
                                //'tax_query' => array(
                                //  'taxonomy' => 'product_tag',
                                //  'field' => 'slug',
                                //  'terms' => $taxslug
                               //   )     
                                );

                    $auteurArray = array();

                        $ProjetsQuery = new WP_Query($args ); 
                            if ( $ProjetsQuery->have_posts() ) : 
                                while ( $ProjetsQuery->have_posts() ) : 
                                    $ProjetsQuery->the_post(); 

//if ((in_array("DVD", $category_array)) || (in_array("Films", $category_array))){ 
  

//$category = get_the_terms( $product->get_id(), 'product_cat' );
          
               /*   if ( ! empty( $category ) && ! is_wp_error( $category ) ){
                    foreach ($category  as $term  ) {
                        $category_array[] = $term->name;
                            }
                     }*/
//if (!in_array(trim(get_field('auteur')), $auteurArray)){
  if ((!in_array(trim(get_field('auteurliste')), $auteurArray)) && (trim(get_field('auteurliste')))  ){


                 // $auteurArray[] = trim(get_field('auteur')); 

                     $auteurArray[] = trim(get_field('auteurliste')); 


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

 <?php //} ?>

      <?php 
    // if (($taxslug == "production") || ($taxslug == "distribution") || ($taxslug == "courts-metrages")) { 
        if ($taxslug == "distribution") { 
        ?>
			<div class="col-sm-4">
				<select class="selectcategory">
					<option selected disabled>CATEGORIE</option>
					<option value="sameCategory">film d'actualité</option>
          <option value="sameCategory">film de patrimoine</option>
                    <?php // echo get_field('categorie'); ?>
				</select>
			</div>
      <?php } ?>
		</div>
		<div class="row">
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
    
    <?php
    
//if ($tax != "Hors collection") {
if ($taxslug != "hors-collection") {



// gestion des films pas encore sortis

                          $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1, //80
                                'tax_query' => array(
                                   array(
                                    'taxonomy' => 'product_tag',
                                    'field' => 'slug',
                                    'terms' => $taxslug
                                   )
                                )
                            
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

   
        if ($j > 0){ // si il y a au moins un film dont la date de sortie n'est pas définie
                    ?>
    
                      <div class="container-fluid padding10 content animated <?php //echo $j; ?>">
        
                          <div class="row films">
            
                            <div class="col-md-12">
                                <h2> PROCHAINEMENT  </h2>
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

}
?>

                  </div> <!-- grid gridcatalogue -->
        
        
       </div> <!-- container-fluid -->

<?php
}

?>

          








<?php





//// films déjà sortis (ou au moins dont la date de sortie est définie)


    $i = getdate()['year'];                
    
      while ( $i > 1950 ) { 
          //echo $i; 

                    /*     $argsglobal = array(
                                'post_type' => 'product',
                                'posts_per_page' => 8,
                                'product_cat' => 'films, dvd',
                                'product_tag' => $tax      
                                );*/
                    
                      
                     /*   $AnneesQuery = new WP_Query($argsglobal ); 
                            if ( $AnneesQuery->have_posts() ) : 
                                while ( $AnneesQuery->have_posts() ) : 
                                    $AnneesQuery->the_post(); */
 
                
                  //count post where annee = $i
                  // if >0 display

              /*    $args = array(
            'post_type' => 'product',
            'posts_per_page' => 80,
            'product_tag' => $tax      

            );*/

/*
$args = get_posts(array(
 'post_type' => 'product',
  'posts_per_page'  => -1,
  'tax_query' => array(
               array(
                 'taxonomy' => 'product_tag',
                  'field' => 'slug',
                  'terms' => $taxslug
                    )),
  'meta_key'      => 'date_de_sortie',
  'orderby'     => 'meta_value',
  'order'       => 'DESC'
));*/

                        $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1, //80
                               /* 'meta_key'      => 'date_de_sortie',
                                'orderby'     => 'meta_value',
                                'order'       => 'ASC',*/
                                'tax_query' => array(
                                   array(
                                    'taxonomy' => 'product_tag',
                                    'field' => 'slug',
                                    'terms' => $taxslug
                                   )
                                )
                            
                                );
    
          $j = 0; // counter
    
           $ProjetsQuery = new WP_Query($args ); 
           //print_r($ProjetsQuery);
           if ( $ProjetsQuery->have_posts() ) : 
                 while ( $ProjetsQuery->have_posts() ) : 
                     $ProjetsQuery->the_post(); 
                     // afficher seulement si annee = $i;
            
                     $date = get_field('date_de_sortie'); 
                     $timestamp = strtotime($date);
                      $dateformatannee = "Y";
                      $annee = date_i18n($dateformatannee, $timestamp);


                                              $now = time();
                                   

 


                      if (($annee == $i) && ($now > $timestamp) && $date) { $j++; }
                endwhile; 

            else : echo "";
            
            endif;
          
            if ($j > 0){ // si il y a au moins un film dans l'année en cours ($i)
          
                    ?>
    
                      <div class="container-fluid padding10 content animated <?php //echo $j; ?>">
        
	                       	<div class="row films">
            
		                      	<div class="col-md-12">
				                        <h2> <?php echo $i; ?>  </h2>
			                      </div>
                      	
                        	</div>

                    		<div class="grid gridcatalogue <?php echo $tax; ?>">
                    			 <div class="gutter-sizer"></div> 
                              <div class="grid-sizer"></div>
            
                                  <?php
                                      
                                          $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1, //80
                                'tax_query' => array(
                                   array(
                                    'taxonomy' => 'product_tag',
                                    'field' => 'slug',
                                    'terms' => $taxslug
                                   )
                                )
                            
                                );
                          // créer un tableau
                           $ProduitsArray = array();
                           $x = 0;



                                      $ProjetsQuery = new WP_Query($args ); 
                                      if ( $ProjetsQuery->have_posts() ) : 
                                          while ( $ProjetsQuery->have_posts() ) : 
                                             $ProjetsQuery->the_post(); 


                                        

                                             // afficher seulement si annee = $i;
                                              $date = get_field('date_de_sortie'); 
                                              $timestamp = strtotime($date);
                                              $dateformatannee = "Y";
                                              $annee = date_i18n($dateformatannee, $timestamp);
                                             // echo "annee : " . $annee;
                                               //echo "i : " . $i;


                                             //  $datestamp = strtotime($date);
                                               //$now = getdate();
                                              $now = time();
                                              //print_r($now);
                                              //print_r($datestamp);

                                              //if ((!$date) || ($now < $timestamp)){



                                              if (($annee == $i) && ($now > $timestamp) && $date){

      

                                           

                                             // le trier par date_de_sortie
                                             // l'afficher avec un foreach

                                                                              $date =  get_field('date_de_sortie');                                       
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
                                                                                
                                                                          
                                                  //$ProduitsArray[] = get_post(); 
                                                $ProduitsArray[$x]['titre'] = trim(get_the_title()); // title

                                                $ProduitsArray[$x]['date'] = $mois2 . $jour;   // date
                                                $ProduitsArray[$x]['mois'] = date_i18n($dateformatmois, $timestamp);
                                                $ProduitsArray[$x]['jour'] = date_i18n($dateformatjour, $timestamp);

                                                $ProduitsArray[$x]['affiche'] =  get_field('affiche_du_film');
                                                $ProduitsArray[$x]['auteur'] = trim(get_field('auteur'));
                                               $ProduitsArray[$x]['categorie'] = get_field('categorie');

                                               $ProduitsArray[$x]['lien'] = get_permalink();


                                                 //$ProduitsArray[$x]['affiche'] =  the_field('affiche_du_film');


                                                $x++;

                                             //echo "tour" . $j . "</br>"; 
                                             //print_r($ProduitsArray);

                                  // afficher directement
                                      ?>       


                                          	  <?php 
                                                      }
                                                          endwhile; ?>
                          
                                     <?php else : ?>
                                  
                                  pas de produit
                          
                         <?php endif; ?>

                       <?php wp_reset_query(); ?>




                        <?php
                       // sort($ProduitsArray);
                          // sort alphabetically by name
                           usort($ProduitsArray, 'compare_date');



//$keys = array_keys($ProduitsArray);
for($y = 0; $y < count($ProduitsArray); $y++) {
   // echo $keys[$y] . "{<br>";

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
                                                                           /* $date = $ProduitsArray[$y]['date']; 
                                                                            $timestamp = strtotime($date);
                                                                            
                                                                            $dateformatannee = "Y";
                                                                            $dateformatmois = "F";
                                                                            $dateformatjour = "d";
                                                                            $annee = date_i18n($dateformatannee, $timestamp);
                                                                            $jour =  date_i18n($dateformatjour, $timestamp);
                                                                            $mois =  date_i18n($dateformatmois, $timestamp);*/
                                                                          ?>
                                                              <h5>sortie le <?php echo (float)$ProduitsArray[$y]['jour']. ' ' . $ProduitsArray[$y]['mois']; ?></h5>
                                                              <h5><span class="categorie <?php if ($ProduitsArray[$y]['categorie'] === "film d'actualité" ){ echo "d-none"; } ?>"><?php echo $ProduitsArray[$y]['categorie']; ?></span></h5>
                                                            </div>  
<?php

//print_r($ProduitsArray[$keys[$y]]);
//print_r($ProduitsArray[$y]);

//echo ' <div class="col-12"><h3 class="titre">' . $ProduitsArray[$y]['titre'] . "</h3></div>";

   // foreach($ProduitsArray[$keys[$y]] as $key => $value) {
     // foreach($ProduitsArray[$keys[$y]] as $value) {

       //echo $key . " : " . $value . "<br>";   
     /*  if ($key == "titre") {echo ' <div class="col-12"><h3 class="titre"> ' . $value . "</h3></div>";   }
        if ($key == "date") {
                 $date =  $value; 
                 $timestamp = strtotime($date);
                 $dateformatannee = "Y";
                $dateformatmois = "F";
                 $dateformatjour = "d";
                  $annee = date_i18n($dateformatannee, $timestamp);
                  $jour =  date_i18n($dateformatjour, $timestamp);
                  $mois =  date_i18n($dateformatmois, $timestamp);
            echo '<h5>sortie le ' .(float)$jour. ' ' . $mois .'</h5>';


        }
     }*/

    ?>
        </div>
          </div>
                                                        
               </div>
    
<?php
  //  echo "}<br>";
}


?>





	
		        </div> <!-- grid gridcatalogue -->
        
        
	     </div> <!-- container-fluid -->
    
    
    
    <?php 
            }                 
  
        $i--;
      } // end while ( $i > 1950 ) { 
 
    wp_reset_query();
    
} // end if !hors-collection










else { // hors-collection
  // alors on affiche pas les années mais les sous-collections
  // >>>> on affiche les sous-collections puis les années........
      
       $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1, //80
                                'tax_query' => array(
                                   array(
                                    'taxonomy' => 'product_tag',
                                    'field' => 'slug',
                                    'terms' => $taxslug
                                   )
                                )
                            
                                );


$field = get_field_object('sous-collection');
$souscollections = $field['choices'];
//print_r($field);
//print_r($field['choices']);
foreach ($souscollections as $souscollection => $nomsouscollection) {


// afficher seulement si il y a des produits dans cette sous-collection

          $j = 0; // counter
    
           $ProjetsQuery = new WP_Query($args ); 
           if ( $ProjetsQuery->have_posts() ) : 
                 while ( $ProjetsQuery->have_posts() ) : 
                     $ProjetsQuery->the_post(); 

                      if ($nomsouscollection == get_field('sous-collection')) { $j++; }
                endwhile; 

            //else : echo "";
            
            endif;



 if ($j > 0){ // si il y a au moins un produit dans cette sous-collection
?>


            <div class="container-fluid padding10 content">
        
               

                    <div class="row films">
                
                            <div class="col-md-12">
                                <h2> <?php echo $nomsouscollection /*. " " . $a*/; ?>  </h2>
                            </div>
                        
                  </div>

<?php

 $i = getdate()['year'];                
    
      while ( $i > 1950 ) { 
          

                        $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1, 
                                'tax_query' => array(
                                   array(
                                    'taxonomy' => 'product_tag',
                                    'field' => 'slug',
                                    'terms' => $taxslug
                                   )
                                )
                            
                                );
    
          $jj = 0; // counter
    
           $ProjetsQuery = new WP_Query($args ); 
   
           if ( $ProjetsQuery->have_posts() ) : 
                 while ( $ProjetsQuery->have_posts() ) : 
                     $ProjetsQuery->the_post(); 
                  
            
                     $date = get_field('date_de_sortie'); 
                     $timestamp = strtotime($date);
                      $dateformatannee = "Y";
                      $annee = date_i18n($dateformatannee, $timestamp);
                                              $now = time();


                      if (($annee == $i) && ($now > $timestamp) && $date && ($nomsouscollection == get_field('sous-collection'))) { $jj++; }
                endwhile; 

            else : echo "";
            
            endif;
          
           if ($jj > 0){ // si il y a au moins un film dans l'année en cours ($i)



                                         $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1, //80
                                'tax_query' => array(
                                   array(
                                    'taxonomy' => 'product_tag',
                                    'field' => 'slug',
                                    'terms' => $taxslug
                                   )
                                )
                            
                                );
                          
                        //créé un tableau et le rempli avec les données des produits de cette sous-collection
                           $ProduitsArray = array();
                           $x = 0;



                                      $ProjetsQuery = new WP_Query($args ); 
                                      if ( $ProjetsQuery->have_posts() ) : 
                                          while ( $ProjetsQuery->have_posts() ) : 
                                             $ProjetsQuery->the_post(); 
                                             // afficher seulement si annee = $i;
                                              //$date = get_field('date_de_sortie'); 
                                             // $timestamp = strtotime($date);
                                            //  $dateformatannee = "Y";
                                            //  $annee = date_i18n($dateformatannee, $timestamp);
                                             // echo "annee : " . $annee;
                                               //echo "i : " . $i;
                                             // if ($annee == $i){

                                           //  if ($souscollection == get_field('sous-collection')){

                                                 $date =  get_field('date_de_sortie');                                       
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

                                              if (($souscollection == get_field('sous-collection')) && ($annee == $i)){


                                              
                                                                                
                                                                          
                                                  //$ProduitsArray[] = get_post(); 
                                                $ProduitsArray[$x]['titre'] = trim(get_the_title()); // title

                                                $ProduitsArray[$x]['date'] = $annee . $mois2 . $jour;   // date
                                                $ProduitsArray[$x]['mois'] = date_i18n($dateformatmois, $timestamp);
                                                $ProduitsArray[$x]['jour'] = date_i18n($dateformatjour, $timestamp);
                                                 $ProduitsArray[$x]['annee'] = date_i18n($dateformatannee, $timestamp);

                                                $ProduitsArray[$x]['affiche'] =  get_field('affiche_du_film');
                                                $ProduitsArray[$x]['auteur'] = trim(get_field('auteur'));
                                               $ProduitsArray[$x]['categorie'] = get_field('categorie');
                                                 //$ProduitsArray[$x]['affiche'] =  the_field('affiche_du_film');

                                              $ProduitsArray[$x]['lien'] = get_permalink();
                                                $x++;


    
                                                      }
                                         endwhile; ?>
                          
                                     <?php else : ?>
                                  
                                  pas de produit
                          
                         <?php endif; ?>

                       <?php wp_reset_query(); ?>




                        <?php
                       // sort($ProduitsArray);
                          // sort alphabetically by name
                           usort($ProduitsArray, 'compare_date');

?>


      

                <div class="row films">
            
                            <div class="col-md-12">
                                <h2> <?php echo $i; ?>  </h2>
                            </div>
                        
                </div>
                            <div class="grid gridcatalogue <?php echo $tax; ?>">
                   <div class="gutter-sizer"></div> 
                     <div class="grid-sizer"></div>    

     

              <?php

              for($y = 0; $y < count($ProduitsArray); $y++) {

/*
 $a = getdate()['year'];  // année actuelle
$annee = $ProduitsArray[$y]['annee'];              
    
      while ( $a > 1950 ) { 

          if ($annee == $a){*/
               ?> 



               

                
    


              <div class="grid-item text-center">

                                                                           
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
                                                                            <h5>sortie le <?php echo (float)$ProduitsArray[$y]['jour']. ' ' . $ProduitsArray[$y]['mois'] . ' ' . $ProduitsArray[$y]['annee']; ?></h5>
                                                                            <h5><span class="categorie <?php if ($ProduitsArray[$y]['categorie'] === "film d'actualité" ){ echo "d-none"; } ?>"><?php echo $ProduitsArray[$y]['categorie']; ?></span></h5>
                                                                          </div>  

                      </div>
                        </div>
                                                                      
                             </div>
                  
                    
     

              <?php

              } // for each 

?>

        </div> <!-- grid gridcatalogue -->      
  


<?php

} // jj afficher seulement si il y a des produits dans cette sous-collection

  $i--;
      } // end while ( $i > 1950 ) { 
        ?>
</div> <!-- container-fluid -->
        <?php

} // end foreach


}



?>






    <?php } // end if hors-collection ?>

</div>
</div>


<?php



get_footer(); 
//  'shop'