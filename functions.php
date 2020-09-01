<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( '/inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
/*
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'remove_admin_login_header');
*/


add_filter( 'woocommerce_enqueue_styles', '__return_false' );


/*
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
*/



add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( &$scripts){
    if(!is_admin()){
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.2.1' );
    }
}



/******************* image gallery metadata************/

function get_post_gallery_images_with_info($postvar = NULL) {
    if(!isset($postvar)){
        global $post;
        $postvar = $post;//if the param wasnt sent
    }


    $post_content = $postvar->post_content;
    if (preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids)){
    $images_id = explode(",", $ids[1]); //we get the list of IDs of the gallery as an Array


    $image_gallery_with_info = array();
    //we get the info for each ID
    foreach ($images_id as $image_id) {
        $attachment = get_post($image_id);
        array_push($image_gallery_with_info, array(
            'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink($attachment->ID),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
                )
        );
    }
    return $image_gallery_with_info;
     } else {
        return null;
    }
    
}

/**********https://stackoverflow.com/questions/11248628/disable-wordpress-from-adding-p-tags**********/
//remove_filter( 'the_content', 'wpautop' );
//remove_filter( 'acf_the_content', 'wpautop' );
//remove_filter( 'the_excerpt', 'wpautop' );


/**************gestion class active du menu*****************/
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('dropdown-menu.current-menu-item', $classes) ){
        $classes[] = 'show';
    }
    return $classes;
}

/*
add_filter('nav_menu_css_class_show' , 'special_nav_class_show' , 10 , 2);

function special_nav_class_show ($classes, $item) {
    if (in_array('dropdown-menu', $classes) ){
        $classes[] = 'show ';
    }
    return $classes;
}*/

/*
function addUploadMimes($mimes) {
    $mimes = array_merge($mimes, array(
        'epub|mobi' => 'application/octet-stream'
    ));
    return $mimes;
}
add_filter('upload_mimes', 'addUploadMimes');
*/

function enable_extended_upload ( $mime_types =array() ) {

// Les types MIME énumérés ici seront autorisés dans la bibliothèque de médias.
// Vous pouvez ajouter autant de types MIME que vous voulez.
$mime_types['gz']  = 'application/x-gzip';
$mime_types['zip']  = 'application/zip';
$mime_types['rtf'] = 'application/rtf';
$mime_types['ppt'] = 'application/mspowerpoint';
$mime_types['ps'] = 'application/postscript';
$mime_types['flv'] = 'video/x-flv';

$mime_types['epub'] = 'application/epub+zip';

// Si vous souhaitez interdire certains types de fichiers qui sont par ailleurs autorisées,
// spécifiez-les ici. Vous pouvez en ajouter autant que souhaité.
unset( $mime_types['exe'] );
unset( $mime_types['bin'] );

return $mime_types;
}

add_filter('upload_mimes', 'enable_extended_upload');


/***************************************************************/



// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
    // $fields['billing']['billing_email']['placeholder'] = 'My new placeholder';
     $fields['billing']['billing_email']['label'] = 'ADRESSE EMAIL';
     return $fields;
}


/*
When you upload an image through the WordPress media uploader and then insert it into the editor, it comes with width and height attributes. These are normally desirable, as it assists the browser in making the appropriate room for the image during layout. But if you want to remove the insert action from adding these attributes, you can add this code to you functions.php file or a functionality plugin of your own making:
*/


add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}





//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30 );


// Remove "Select options" button from (variable) products on the main WooCommerce shop page.

/*add_filter( 'woocommerce_loop_add_to_cart_link', function( $product ) {

	global $product;

	if ( is_shop() && 'variable' === $product->product_type ) {
		return '';
	} else {
		sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			esc_html( $product->add_to_cart_text() )
		);
	}

} );*/

// Remove "Select options" button from (variable) products on a product page.

/*
add_filter( 'woocommerce_loop_add_to_cart_link', function( $product ) {

	global $product;

	if ( is_product() ) {
		
        echo 'produit';

        
	} 
    

} );*/

/*
add_filter( 'woocommerce_variation_option_name', 'display_price_in_variation_option_name' );

function display_price_in_variation_option_name( $term ) {
    global $wpdb, $product;

    if ( empty( $term ) ) return $term;
    if ( empty( $product->id ) ) return $term;

    $result = $wpdb->get_col( "SELECT slug FROM {$wpdb->prefix}terms WHERE name = '$term'" );

    $term_slug = ( !empty( $result ) ) ? $result[0] : $term;

    $query = "SELECT postmeta.post_id AS product_id
                FROM {$wpdb->prefix}postmeta AS postmeta
                    LEFT JOIN {$wpdb->prefix}posts AS products ON ( products.ID = postmeta.post_id )
                WHERE postmeta.meta_key LIKE 'attribute_%'
                    AND postmeta.meta_value = '$term_slug'
                    AND products.post_parent = $product->id";

    $variation_id = $wpdb->get_col( $query );

    $parent = wp_get_post_parent_id( $variation_id[0] );

    if ( $parent > 0 ) {
         $_product = new WC_Product_Variation( $variation_id[0] );
         return $term . ' (' . wp_kses( woocommerce_price( $_product->get_price() ), array() ) . ')';
    }
    return $term;

}*/



function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');


function fb_opengraph() {
    global $post;
 
    if(is_single()) {
        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'large');
        } else {
            $img_src = get_stylesheet_directory_uri() . '/img/opengraph_image.jpg';
        }
        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        ?>
 
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src[0]; ?>"/>
 
<?php
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);