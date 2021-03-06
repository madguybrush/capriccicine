<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author     WooThemes
 * @package    WooCommerce/Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//the_title( '<h1 class="product_title entry-title">', '</h1>' );
global $product;
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