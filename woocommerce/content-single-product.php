<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
global $product;
$category = get_the_terms( $product->get_id(), 'product_cat' );
									$category_array = array();
									if ( ! empty( $category ) && ! is_wp_error( $category ) ){
										foreach ($category  as $term  ) {
										    //$product_cat_id = $term->term_id;
										    //$product_cat_name = $term->name;
										    $category_array[] = $term->name;
										    	      	}
										 }


										 if (isset($_GET["id"])) {

	$id = htmlspecialchars($_GET["id"]); }

	if (isset($_GET["productadded"])) {
	$productadded = htmlspecialchars($_GET["productadded"]); 

}
//$product = wc_get_product($id);
//print_r($product);


?>

<div class="popup">
    <div class="popupcontent  animated fadeInDown">
	    <div class="row">
	        <div class="col-12">
	        	<?php if (((isset($_GET["productadded"])) && ($productadded == 'yes')) || (($product->get_type() == 'simple') && ((!in_array("DVD", $category_array))) ) ){ ?>
	        <h2>CET ARTICLE A ETE AJOUTE AU PANIER</h2>
	        <?php } else { ?>
	        	 <h2>VOULEZ VOUS AJOUTER CET ARTICLE AU PANIER ?</h2>
	         <?php }  ?>
	         </div>   
	         <div class="col-4 margintop marginbottom">
	                <?php if( get_field('affiche_du_film') ): ?>
	                                    <img src="<?php the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>" class="popupimg">
	                                <?php else : // image par défaut ?>
	                                    <img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>" class="popupimg">
	                <?php endif; ?>
	        </div>
	        <div class="col-8 margintop marginbottom">
	           <h3> <?php the_title(); ?></h3>
	           <p class="price"  style="color :#A78A3C; font-family: Lora; font-weight: bold;">

	            <?php 
	            	if ( $product->get_type() == 'simple') {echo $product->get_price_html(); }
	            	/*else { 
	            		echo $variation_max_price = $product->get_variation_price('max') . "€";  
						
	            	}*/


	            	//?attribute_format
						//echo $product->get_variation_price();

	            	//echo $variation_max_price = $product->get_variation_price('max'); 
	            	//echo $product->get_variation_price();
	            ?>
	             </p> 
	            <?php 
                
               // if ($product->is_type( 'simple' )) { ?>
                    <!--<p class="price">--><?php //echo $product->get_price_html(); ?><!--</p>-->
                <?php// } ?>
                <?php 
               // if($product->product_type=='variable') {
                 //   $available_variations = $product->get_available_variations();
				//	$count = count($available_variations)-1;
                   // $variation_id=$available_variations[$count]['variation_id']; 
                   // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.
                   // $variable_product1= new WC_Product_Variation( $variation_id );
                   // $regular_price = $variable_product1 ->regular_price;
                   // $sales_price = $variable_product1 ->sale_price;
                   // echo $regular_price+$sales_price;
                   // }
                ?>


	            	
	          
	             <?php 

				
		         if ( get_field('bonus')){
	             //$sommaire = $telechargements['sommaire']; ?>
	              <p class="sommaire"><?php echo  get_field('bonus'); ?></p>
	              <?php } ?>
	        </div>   

	       

	 		<div class="col-xl-6 text-center margintop">
	 			<a href="#" title="Continuer mes achats"><button class=" cta ctapopup continuermesachats">Continuer mes achats</button></a>
			</div>	
			<div class="col-xl-6 text-center margintop marginbottom">
	    	   <?php /*global $woocommerce;*/ $cart_url = wc_get_cart_url(); // added_to_cart wc-forward

	    	   //if ((!in_array("DVD", $category_array))) {  

	    	   	if ((isset($_GET["productadded"])) && ($productadded == 'yes')){

	    	    ?>
	    	   <a href="<?php echo $cart_url; ?>" class="" title="Voir le panier"><button class=" cta ctapopup">Voir mon panier</button></a>

<?php

}
//}

//  ajouter parametre cf boutique :  ?productadded=yes&id=1813

// AFFICHER BOUTON AJOUTER AU PANIER si dvd

if ((in_array("DVD", $category_array)) ){ //  && (isset($_GET["productadded"])) && ($productadded == 'yes')
	$id = $product->get_id();

	if ($product->get_type() == 'simple'){

		if ((!isset($_GET["productadded"]))){


		echo sprintf( '<div class="add-to-cart-container"><a href="%s' . '&productadded=yes&id=' . $id  . '" data-quantity="%s" class="%s ctapopup product_type_%s single_add_to_cart_button cta btn-block %s" %s> %s</a></div>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
			esc_attr( $product->get_type() ),
			esc_attr('ajax_add_to_cart'),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			esc_html( $product->add_to_cart_text() )
		);
	}
}
	else {

		if ((!isset($_GET["productadded"]))){

	do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' ); 

		}

	}



}



if ((in_array("Livres", $category_array)) ){ //  && (isset($_GET["productadded"])) && ($productadded == 'yes')
	$id = $product->get_id();

	if ($product->get_type() == 'simple'){
?>
			<a href="<?php echo $cart_url; ?>" class="" title="Voir le panier"><button class=" cta ctapopup">Voir mon panier</button></a>
<?php
	}
}


?>

			</div>			
	    </div>
	</div>
</div>

<div id="produit">

<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>

	<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 * 
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		//do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
			/**
			 * Hook: woocommerce_single_product_summary. >>>>>> \plugins\woocommerce\includes\wc-templates-hooks.php >> ligne 144
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * NOPE @hooked woocommerce_template_single_rating - 10
			 * NOPE @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20 >>>>>> \plugins\woocommerce\includes\wc-template-functions.php ligne 1450 
			 														>>>> single-product/short-description.php
			 * NOPE @hooked woocommerce_template_single_add_to_cart - 30 >>>> \plugins\woocommerce\includes\wc-template-functions.php line 1487
			 *  NOPE @hooked woocommerce_template_single_meta - 40
			 *  NOPE@hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30 );
			
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
			do_action( 'woocommerce_single_product_summary' );
			// do_action( 'woocommerce_single_title' );
			//  do_action( 'woocommerce_template_single_excerpt' );
			//do_action( 'woocommerce_simple_add_to_cart' );


			
			  //woocommerce_template_single_add_to_cart($product);
			
		?>
	</div>

	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		// affiche catégorie du produit et produits apparentés
		//do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
