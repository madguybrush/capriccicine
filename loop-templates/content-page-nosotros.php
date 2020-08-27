<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

		
<div id="agenda">

	<header class="container-fluid">
		<div class="row">
			<div class="col-lg-11 offset-lg-1 "> <!-- col-md-10 offset-md-1-->
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</header>
	<div class="container-fluid content qui">
		<div class="row">
			<div class="col-lg-6 offset-lg-1"> <!-- col-md-10 offset-md-1-->
				<!--<div class="resume">
				
					<?php echo get_field('presentation'); ?>
				</div>-->
			
			<?php 
			$blocs = get_field('blocs');
			if( $blocs ){?>
			<?php	foreach ($blocs as $bloc) {
		  				$titre = $bloc['titre'];
		                $texte = $bloc['texte'];
?>


<h3>
	<!--<img src="<?php bloginfo('stylesheet_directory');?>/img/trait-debut-paragraphe.svg" alt="" class="trait"> -->
	<?php echo $titre; ?></h3>
      <?php echo $texte; 	?>	            

<?php

		            }



		         }
		     ?>
				
			</div>
			<div class="col-lg-4 offset-lg-1 newslettertitle"> <!-- col-lg-3 offset-lg-1 -->
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
		</div>
	</div>
</div>



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

