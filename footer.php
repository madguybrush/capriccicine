<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php 

if (!is_front_page()){

//get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<!--<button data-scroll onclick="topFunction()" id="myBtn" title="Go to top">Top</button>-->
<a href="#top" id="myBtn" title="Go to top"></a>

<footer>


			<!--conception graphique : <a href="http://marclafon-design.fr/" target="_blank">Marc Lafon</a> — développement : <a href="http://madmind.fr/" target="_blank">Mad Mind</a> — tous droits réservés-->
<a href="<?php echo esc_url( home_url( '/' ) ); ?>/politica/" alt="Política de privacidad">Política de privacidad</a>
    
  <!--  
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 offset-md-4 col-lg-9 offset-lg-3 ">
		<a href="/mentions-legales/" alt="mentions légales">mentions légales / conditions de ventes</a>
		</div>
	</div>
</div>-->
    
</footer>

<?php }?>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>


</html>



