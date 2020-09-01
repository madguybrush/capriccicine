<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    



<div class="container-loader">
	<div class="aucentre text-center">
		<span class="loader align-middle"></span>
	</div>
</div>
    

<div class="site d-none" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<!-- <div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">-->

		<!-- <a class="skip-link sr-only sr-only-focusable" href="#content">--> <?php //esc_html_e( 'Skip to content', 'understrap' ); ?> <!-- </a> -->

           <?php /*global $woocommerce;*/ //$cart_url = wc_get_cart_url(); // added_to_cart wc-forward ?>

 <!-- menu mobile -->

<nav id="top" class="navbar fixed-top menumobile navbar-dark <?php if (  !is_front_page() ) { echo "fondnoir"; } ?>">

	<div class="container">

			
				<a id="brandmobile" class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Capricci" alt="Capricci" itemprop="url">
					<img alt="logo Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/logomobile.png" class="logomobile">
                    <img alt="logo Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/logotablette.png"  class="logotablette">
				</a>
				
				
				<div class="flexbuttons">
                   <!-- <button id="btnmenupanier" class="btn btnpaniermobile" >
				      <a href="<?php //echo $cart_url; ?>" alt="voir mon panier">
				      	<img src="<?php bloginfo('stylesheet_directory');?>/img/panier-vide.svg" alt="panier" />
				      </a>
				    </button>-->
				    <button id="btnmenusearch" class="btn btnsearch " > 
				        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" class="searchbutton">
				            <path id="Tracé_15" data-name="Tracé 15" class="loupe" d="M29.7,28.22l-7.777-7.713a12.35,12.35,0,1,0-1.275,1.339l7.713,7.713a1.092,1.092,0,0,0,1.4,0A.987.987,0,0,0,29.7,28.22ZM1.275,12.666a11.091,11.091,0,1,1,19.187,7.586h0v.064A11.136,11.136,0,0,1,1.275,12.666Z" transform="translate(0 -0.3)"/>
				            <rect class="cross1" x="14" y="0" transform="rotate(45, 15, 15)" width="2" height="30"></rect>
				            <rect class="cross2" x="0" y="14" transform="rotate(45, 15, 15)" width="30" height="2"></rect>
				        </svg>
				    </button>
                    <!--<button id="btnmenusearch" class="btn btnsearch" >  
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="searchbutton">
                            <path class="loupe" d="M20.7 22.4l-5.3-6.7c3.6-3.5 3.7-9.3.2-12.9S6.4-.9 2.8 2.6s-3.7 9.3-.2 12.9c3 3.1 7.7 3.6 11.3 1.4l5.3 6.7c.3.4 1 .5 1.4.2.4-.4.5-1 .1-1.4zM2.1 9.2c0-3.9 3.1-7 7-7s7 3.1 7 7-3.1 7-7 7-7-3.1-7-7z"></path>
                            <rect class="cross1" x="11" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -4.9704 12.0004)" width="2" height="24"></rect>
                            <rect class="cross2" x="0" y="11" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -4.9704 12.0004)" width="24" height="2"></rect>
                        </svg>
				    </button>-->
				
				<button id="btnmenumobile" class="btn" type="button" > 
						<div class="bar1"></div>
						<div class="bar2"></div>
						<div class="bar3"></div>
				</button>
				

				
				</div>
				
		


	</div>
</nav>

<!-- modal mobile -->				
<nav class="navbar navbar-dark" id="modalmobile">

	<div class="container">


        <div class="menus animated fadeInDown">	
            
            
			<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'animated sidebar',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav flex-column',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
					
					
				<div class="sousmenu ">
							<!--<a href="https://capricci-international.com" alt=""  >INTERNATIONAL SALES</a>-->
			<?php /*wp_nav_menu(
					array(
						'theme_location'  => 'primary',
                        'menu'            => 'sub-menu',
						'menu_class'      => 'navbar-nav flex-column',
						'fallback_cb'     => '',
						'menu_id'         => 'sub-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); */ ?>
                                
				</div>				
            
					
					<!--
					<div class="animated menuBasmobile">
						<div class="international">
							<a href="https://capricci-international.com" alt=""  >INTERNATIONAL SALES</a>
						</div>
						
						<div>
							<i class="social fab fa-facebook-square"></i>
							<i class="social fab fa-twitter-square"></i>
						</div>
					</div>-->
        
        </div>
        
                <div class="animated menuBasmobile">

					<div>
						<a href="https://www.facebook.com/capricci" alt="facebook" target="_blank"><img alt="facebook Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/fbShare.svg" class="socialbutton"></a>
						<a href="https://twitter.com/CapricciFrance" alt="twitter" target="_blank"><img alt="twitter Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/TwitterShare.svg" class="socialbutton"></a>
						<a href="https://www.instagram.com/capricci.cinema/?hl=fr" alt="instagram" target="_blank"><img alt="instagram Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/instagram.svg" class="socialbutton"></a>
						<a href="https://www.linkedin.com/in/capricci-films-62613051" alt="linkedin" target="_blank"><img alt="LinkedIn Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/linkedin.svg" class="socialbutton"></a>
					</div>
				</div>
        
	</div>
</nav>

<!-- modal search -->
<nav class="navbar navbar-dark" id="modalsearch">

	<div class="container">

					<div class="searchform animated fadeInDown">
					BUSCADOR
					    <form class="flex-container" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">  
							<input class="form-control" type="search" placeholder="Título, cineasta…" name="s" aria-label="Search">  
							<button class="btn btnsearch" type="submit" id="searchsubmit">  
							</button>
						</form>
					</div>
	</div>

</nav>

<!-- menu >768 -->
<nav class="navbar fixed-top navbar-expand-md navbar-dark menudesktop animated fadeInLeft  <?php if (  !is_front_page() ) { echo "fondnoir"; } ?>">


			<div class="container" style="padding-left: 0; padding-right: 0;">
		
					<!-- Your site title as branding in the menu -->
				<div id="menuHaut" >

					<!--<div class="container-fluid">
							<div class="row">
								<div class="col-3">-->
									
                    <a style="width: 100%; padding-left: 15px; padding-right: 15px;" class="navbar-brand animated fadeInLeft" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Capricci" alt="Capricci" itemprop="url">
                        <img alt="logo Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/logo.png">
                    </a>
                
                		<!--		</div>
                			</div>
                		</div>-->
                        <!-- end custom logo -->

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    
                    <div class="menus">
                        <!-- The WordPress Menu goes here -->
                        <?php wp_nav_menu(
                            array(
                                'theme_location'  => 'primary',
                                'container_class' => 'animated fadeInLeft',
                                'container_id'    => 'navbarNavDropdown',
                                'menu_class'      => 'navbar-nav flex-column', //ml-auto
                                'fallback_cb'     => '',
                                'menu_id'         => 'main-menu',
                                'depth'           => 2,
                                'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                            )
                        ); ?>
                        
                        <div class="sousmenu animated fadeInLeft">

                            <?php /*wp_nav_menu(
                            array(
                                'theme_location'  => 'primary',
                                'menu'            => 'sub-menu',
                                'menu_class'      => 'navbar-nav flex-column',
                                'fallback_cb'     => '',
                                'menu_id'         => 'sub-menu',
                                'depth'           => 2,
                                'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                            )
                        ); */?>
						</div>
                        
                    </div>
				
                </div>
                
				<div id="menuBas" class="row animated fadeInUp" >
				
				
					<div class="searchform" style="width: 100%; padding-left: 15px; padding-right: 15px;">
					    <form class="flex-container" class="searchform" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">  <!--  my-lg-0 margin-left --> <!-- < ?php echo esc_url( home_url( '/' ) ); ?> -->
							<input class="form-control" type="search" placeholder="Título, cineasta…" name="s" aria-label="Search">  
							<button class="btn btnsearch" type="submit" id="searchsubmit">  <!-- btn-outline-success  --><!-- my-2 my-sm-0 -->
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="searchbutton">
								<path class="loupe" d="M20.7 22.4l-5.3-6.7c3.6-3.5 3.7-9.3.2-12.9S6.4-.9 2.8 2.6s-3.7 9.3-.2 12.9c3 3.1 7.7 3.6 11.3 1.4l5.3 6.7c.3.4 1 .5 1.4.2.4-.4.5-1 .1-1.4zM2.1 9.2c0-3.9 3.1-7 7-7s7 3.1 7 7-3.1 7-7 7-7-3.1-7-7z"></path>
							</svg>
							</button>
						</form>
						</div>
					
					<div class="pb-2" style="width: 100%; padding-left: 15px; padding-right: 15px;">
						
						<a href="https://www.facebook.com/capricci" alt="facebook" target="_blank"><img alt="facebook Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/fbShare.svg" class="socialbutton"></a>
						<a href="https://twitter.com/CapricciFrance" alt="facebook" target="_blank"><img alt="twitter Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/TwitterShare.svg" class="socialbutton"></a>
						<a href="https://www.instagram.com/capricci.cinema/?hl=fr" alt="instagram" target="_blank"><img alt="instagram Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/instagram.svg" class="socialbutton"></a>
						<a href="https://www.linkedin.com/in/capricci-films-62613051" alt="linkedin" target="_blank"><img alt="LinkedIn Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/linkedin.svg" class="socialbutton"></a>
					</div>

					

					<div class="newslettertitle mt-4 py-4" style="width: 100%; padding-left: 15px; padding-right: 15px;"> <!-- col-lg-3 offset-lg-1 -->
						Recibe nuestra newsletter con nuestras novedades
						<form class="flex-container" role="search" method="get" action=""> 
							<input class="form-control" type="search" placeholder="Vuestra dirección de e-mail" name="email" aria-label="Search">  
								<button class="btn btnsearch" type="submit" id="newslettersubmit">  
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 129 129" enable-background="new 0 0 129 129" class="newsletterbutton">
									<path class="fleche" d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z" style="top: -20px;">
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
				
				
				</div>
                
                
				
			</div>			<!-- .container -->

				


			
		</nav>
	
  

<?php


if (isset($_GET["email"])){
     $to      = 'contact@capricci.fr'; // contact@capricci.fr
     $subject = "Demande d'abonnement à la newsletter Capricci";
     $message = "L'email suivant a demandé à recevoir la newsletter : " . $email;
     //$headers = 'From: ' . $email . "\r\n" .'Reply-To: contact@capricci.fr' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

$headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  // En-têtes additionnels
  $headers .= 'Reply-To: '.$email."\n"; // Mail de reponse
  $headers .= 'To: '.$to.' <'.$to.'>' . "\r\n";
  $headers .= 'From: '.$email.' <'.$email.'>' . "\r\n";
  $headers .= 'Delivered-to: '.$to."\n"; // Destinataire


     mail($to, $subject, $message, $headers);
     mail('contacto@capriccicine.es', $subject, $message, $headers);
     
}

?>


        
	<!-- </div>--> <!-- #wrapper-navbar end -->
