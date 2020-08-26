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
			<div class="newslettertitle"> <!-- col-lg-3 offset-lg-1 -->
				Recibe nuestra newsletter con nuestras novedades
				<form class="flex-container" role="search" method="get" action=""> 
					<input class="form-control" type="search" placeholder="Vuestra dirección de e-mail" name="email" aria-label="Search">  
						<button class="btn btnsearch" type="submit" id="newslettersubmit">  
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 129 129" enable-background="new 0 0 129 129" class="newsletterbutton">
							<path class="fleche" d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z" >
							</path>
							</svg>
						</button>
				</form>

<?php


if(isset($_GET["email"])) { $email = $_GET["email"]; }
//echo $email;

?>


				<div>
					<?php if (isset($_GET["email"])){ echo $email . ' va être abonné à la newsletter Capricci !'; } ?>
				</div>
			</div>

			conception graphique : <a href="http://marclafon-design.fr/" target="_blank">Marc Lafon</a> — développement : <a href="http://madmind.fr/" target="_blank">Mad Mind</a> — tous droits réservés
<!--<a href="<?php echo esc_url( home_url( '/' ) ); ?>/mentions-legales/" alt="mentions légales">mentions légales / conditions de ventes</a>-->
    
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

