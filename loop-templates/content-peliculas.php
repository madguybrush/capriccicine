<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>



	<?php //echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

<div class="entry-content" id="produit">


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

 
                        <?php if( get_field('sous_titre') ): ?>
                            <h2 class="animated fadeInUp">
                               <?php echo get_field('sous_titre');   ?>
                                </h2>
                                 <?php endif; ?>

                <h2 class="animated fadeInUp"><?php //if (($categories[0] === "DVD" ) || ($categories[0] === "Films" )) { echo "un film de ";}
                                //else { echo "un livre de "; } ?> <?php echo get_field('auteur'); ?></h2>



            </div>
            
        </div>

    </header>


<div class="content container-fluid"> <!--container -->

		<div class="row infoscontent animated fadeInUp">
		<!--<div class="row">-->
			<div class="col-md-4 col-lg-3 colgauche padding25 order-md-1 order-sm-1">
				
				<div class="row">
				


					<div class="col-12">
						<h3>
							
							
                            <?php
                            $annonce = get_field('annonce');
                            $sortie = get_field('date_de_sortie');
                            $vod = get_field('date_de_sortie_vod');
                            $dvd = get_field('date_de_sortie_dvd');
                            $mea = get_field('date_de_sortie_mea');
                            //echo $mea;
                            if ((!$sortie) && (!$vod) && (!$dvd)){
                            		echo $annonce;
                            }
                            else{
                            if ($mea == "salle") {
                          		$date = get_field('date_de_sortie'); 
	                            $timestamp = strtotime($date);
	                           
	                            $dateformatannee = "Y";
	                            $dateformatmois = "F";
	                            $dateformatjour = "d";
	                            $annee = date_i18n($dateformatannee, $timestamp);
	                            $jour =  date_i18n($dateformatjour, $timestamp);
	                            $mois =  date_i18n($dateformatmois, $timestamp);
                            	echo "SORTIE EN SALLE <br> LE " . (float)$jour. ' ' . $mois; echo ' ' . $annee;
                            }
                            if ($mea == "vod") {
                            	$date = get_field('date_de_sortie_vod'); 
	                            $timestamp = strtotime($date);
	                           
	                            $dateformatannee = "Y";
	                            $dateformatmois = "F";
	                            $dateformatjour = "d";
	                            $annee = date_i18n($dateformatannee, $timestamp);
	                            $jour =  date_i18n($dateformatjour, $timestamp);
	                            $mois =  date_i18n($dateformatmois, $timestamp);
                            	echo "SORTIE EN VOD <br> LE " . (float)$jour. ' ' . $mois; echo ' ' . $annee;
                            }
                            if ($mea == "dvd") {
                          		$date = get_field('date_de_sortie_dvd'); 
	                            $timestamp = strtotime($date);
	                           
	                            $dateformatannee = "Y";
	                            $dateformatmois = "F";
	                            $dateformatjour = "d";
	                            $annee = date_i18n($dateformatannee, $timestamp);
	                            $jour =  date_i18n($dateformatjour, $timestamp);
	                            $mois =  date_i18n($dateformatmois, $timestamp);                            	
                            	echo "SORTIE EN DVD <br> LE " . (float)$jour. ' ' . $mois; echo ' ' . $annee;
                        }

                        
                   		 }

                        	
            
                            ?>
                            
                        
                        </h3>
					</div>



				<div class="col-12">
					<?php
					$btns = get_field('btns');	
					if ($btns) {
						$vod = $btns['btn_vod']; 
						$cartelera = $btns['btn_cartelera']; 
						$dvd = $btns['btn_dvd']; 
					

					if ($vod) { ?>
						 <a href="<?php echo $vod; ?>" target="_blank" class="" title="Ver en VOD">
						 	<button class="cta ctapopup">Ver en VOD</button>
						 </a>
					 <?php } ?>

					 <?php if ($cartelera) { ?>
						 <a href="<?php echo $cartelera; ?>" target="_blank" class="" title="Cartelera">
						 	<button class="cta ctapopup">Cartelera</button>
						 </a>
					 <?php } ?>

					<?php if ($dvd) { ?>
						 <a href="<?php echo $dvd; ?>" target="_blank" class="" title="dvd">
						 	<button class="cta ctapopup">EN DVD</button>
						 </a>
					 <?php } 

					}?>

				</div>

				


					<div class="col-12 order-sm-12 hidewhenmobile">
					<!--<div class="centerTab">-->

					<?php 
					$date_de_sortie = get_field('date_de_sortie');
					$date_de_sortie_vod = get_field('date_de_sortie_vod');
					$date_de_sortie_dvd = get_field('date_de_sortie_dvd');
					if((($date_de_sortie) && ($mea != "salle")) || (($date_de_sortie_vod) && ($mea != "vod")) || (($date_de_sortie_dvd) && ($mea != "dvd"))){ ?>
						<table class="tableFilm" style="margin-bottom: 0;">
						<tbody>
							
      

                            <?php //$pays_dorigine = get_field('pays_dorigine');
							$date_de_sortie = get_field('date_de_sortie');	
                                    if (($date_de_sortie) && ($mea != "salle")){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Sortie en salle</b></td>
								<td class="colRight"><?php echo $date_de_sortie; ?></td>
							</tr>
                            <?php } ?>

                           <?php //$pays_dorigine = get_field('pays_dorigine');
							$date_de_sortie_vod = get_field('date_de_sortie_vod');
                                    if (($date_de_sortie_vod) && ($mea != "vod")){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Sortie VOD</b></td>
								<td class="colRight"><?php echo $date_de_sortie_vod; ?></td>
							</tr>
                            <?php } ?>

                               <?php //$pays_dorigine = get_field('pays_dorigine');
							$date_de_sortie_dvd = get_field('date_de_sortie_dvd');	
                                    if (($date_de_sortie_dvd) && ($mea != "dvd")){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Sortie DVD</b></td>
								<td class="colRight"><?php echo $date_de_sortie_dvd; ?></td>
							</tr>
                            <?php } ?>


						</tbody>
						</table>

						<?php } ?>


					<table class="tableFilm">
						<tbody>

														


						<?php //$pays_dorigine = get_field('pays_dorigine');
						$annee_de_production = get_field('annee_de_production');
                                    if ($annee_de_production){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Año de producción</b></td>
								<td class="colRight"><?php echo $annee_de_production; ?></td>
							</tr>
                            <?php } ?>

                            						<?php //$pays_dorigine = get_field('pays_dorigine');
						$date_de_tournage = get_field('date_de_tournage');
                                    if ($date_de_tournage){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Date de tournage</b></td>
								<td class="colRight"><?php echo $date_de_tournage; ?></td>
							</tr>
                            <?php } 
                            						$lieu_de_tournage = get_field('lieu_de_tournage');
                                    if ($lieu_de_tournage){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Lieu de tournage</b></td>
								<td class="colRight"><?php echo $lieu_de_tournage; ?></td>
							</tr>
                            <?php } ?>

						<?php $pays_dorigine = get_field('pays_dorigine');	
                                    if ($pays_dorigine){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>País</b></td>
								<td class="colRight"><?php echo get_field('pays_dorigine'); ?></td>
							</tr>
                            <?php } ?>

                                                        <?php $langue = get_field('langue');	
                                    if ($langue){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Idioma</b></td>
								<td class="colRight"><?php echo get_field('langue'); ?></td>
							</tr>
                            <?php } ?>

						<?php $duree = get_field('duree');	
                                    if ($duree){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Duración</b></td>
								<td class="colRight"><?php echo get_field('duree'); ?></td>
							</tr>
                            <?php } ?>

						<?php $visa = get_field('visa');	
                                    if ($visa){?>
							<!--<tr > 
								<td class="colLeft"><b>Visa</b></td>
								<td class="colRight"><?php echo get_field('visa'); ?></td>
							</tr>-->
                            <?php } ?>



                            <?php $titre = get_field('titre_original');	
                                    if ($titre){?>
							<tr class="titre">
								<td class="colLeft"><b>Título original </b></td>
								<td class="colRight"><?php echo $titre; ?></td>
							</tr>
                            <?php } ?>
                            

                            
						</tbody>
						</table>




						<table class="tableFilm">
						<tbody>



                            
                            <?php if( have_rows('acteurs') ): ?>
		
	                            <?php while( have_rows('acteurs') ): the_row(); 

			                          // vars
	                                        $role = get_sub_field('role');
	                                        $acteur = get_sub_field('acteur');

	                                    ?>
	                            
										<tr class="acteurs">
											<td class="colLeft"><b><?php echo $role; ?></b></td>
											<td class="colRight"><?php echo $acteur; ?></td>
										</tr>
								<?php endwhile; ?>

							<?php endif; ?>
                            
						</tbody>
						</table>




						<table class="tableFilm">
						<tbody>

				                        <?php 
		                                 $technique = get_field('technique');	
		                                   if ($technique['realisation']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Director</b></td>
										<td class="colRight"><?php echo $technique['realisation']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['scenario']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Guionista</b></td>
										<td class="colRight"><?php echo $technique['scenario']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['photographie']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Director de fotografía</b></td>
										<td class="colRight"><?php echo $technique['photographie']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['prise_de_son']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Prise de son</b></td>
										<td class="colRight"><?php echo $technique['prise_de_son']; ?></td>
									</tr>

									<?php }   ?>
										<?php
        							if ($technique['costumes']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Costumes</b></td>
										<td class="colRight"><?php echo $technique['costumes']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['maquillage']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Maquillage</b></td>
										<td class="colRight"><?php echo $technique['maquillage']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['decors']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Décors</b></td>
										<td class="colRight"><?php echo $technique['decors']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['direction_artistique']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Direction artistique</b></td>
										<td class="colRight"><?php echo $technique['direction_artistique']; ?></td>
									</tr>

									<?php }   ?>
								<?php
        							if ($technique['montage_image']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Montador </b></td>
										<td class="colRight"><?php echo $technique['montage_image']; ?></td>
									</tr>

									<?php }   ?>
								<?php
        							if ($technique['montage_son']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Montage son</b></td>
										<td class="colRight"><?php echo $technique['montage_son']; ?></td>
									</tr>

									<?php }   ?>
						
								<?php
        							if ($technique['musique']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Música</b></td>
										<td class="colRight"><?php echo $technique['musique']; ?></td>
									</tr>

									<?php }   ?>
															<?php
        							if ($technique['mixage']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Mixage</b></td>
										<td class="colRight"><?php echo $technique['mixage']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['effets_speciaux']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Effets spéciaux</b></td>
										<td class="colRight"><?php echo $technique['effets_speciaux']; ?></td>
									</tr>

									<?php }   ?>


									<?php
        							if ($technique['producteur']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Producción</b></td>
										<td class="colRight"><?php echo $technique['producteur']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['production']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Production</b></td>
										<td class="colRight"><?php echo $technique['production']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['coproduction']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Coproducción</b></td>
										<td class="colRight"><?php echo $technique['coproduction']; ?></td>
									</tr>

									<?php }   ?>
									
									<?php
        							if ($technique['direction_de__la_production']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Direction de la Production</b></td>
										<td class="colRight"><?php echo $technique['direction_de__la_production']; ?></td>
									</tr>

									<?php }   ?>

									
									<?php
        							if ($technique['avec_la_participation_de']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Con la participación de</b></td>
										<td class="colRight"><?php echo $technique['avec_la_participation_de']; ?></td>
									</tr>

									<?php }   ?>


									<?php
        							if ($technique['avec_le_soutien_de']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Avec le soutien de</b></td>
										<td class="colRight"><?php echo $technique['avec_le_soutien_de']; ?></td>
									</tr>

									<?php }   ?>


									<?php
        							if ($technique['en_partenariat_avec']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>En partenariat avec</b></td>
										<td class="colRight"><?php echo $technique['en_partenariat_avec']; ?></td>
									</tr>

									<?php }   ?>

																		<?php
        							if ($technique['en_association_avec']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>En association avec</b></td>
										<td class="colRight"><?php echo $technique['en_association_avec']; ?></td>
									</tr>

									<?php }   ?>


																											<?php
        							if ($technique['attachee_de_presse']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Attaché(e) de presse</b></td>
										<td class="colRight"><?php echo $technique['attachee_de_presse']; ?></td>
									</tr>

									<?php }   ?>

																<?php
        							if ($technique['distribution']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Distribución</b></td>
										<td class="colRight"><?php echo $technique['distribution']; ?></td>
									</tr>

									<?php }   ?>

																									<?php
        							if ($technique['programmation']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Programmation</b></td>
										<td class="colRight"><?php echo $technique['programmation']; ?></td>
									</tr>

									<?php }   ?>


						</tbody>
						</table>
					<!--</div>-->
					</div>



				</div>
			
				
			</div>
			<div class="col-md-8 col-lg-9 order-md-2 order-sm-2 coldroite">
				
				<div class="row">
					<div class="col-lg-9 order-lg-1 order-md-2 order-sm-1"> <!-- col-xl-10 -->
					
						<div class="row">
						
		

		                            <?php 
		                                    $prix = get_field('prix');
		                                 if ($prix){	
		                                    if (($prix['gauche']) && ($prix['droite'])){
		                            ?>
		                            
													<div class="col-md-6  prix">
														<?php echo $prix['gauche']; ?>
													</div>
													<div class="col-md-6 prix prix2">
						                                <?php echo $prix['droite']; ?>
													</div>
					                            
					                            <?php } 
					                            else if (($prix['gauche']) || ($prix['droite'])){
					                            ?>
					                            
													<div class="col-md-12 prix" style="padding-left: 6rem; <?php if ($prix['droite']){ echo 'padding-top: 0;'; } ?>">
														<?php echo $prix['gauche']; ?>
													</div>
													<div class="col-md-12 prix prix2" style="padding-right: 6rem; <?php if ($prix['gauche']){ echo 'padding-top: 0;'; } ?>">
						                                <?php echo $prix['droite']; ?>
													</div>
					                            
					                            <?php } ?>
		                            <?php } ?>
						
						
						<?php if (get_field('synopsis')){ ?>
							<div class="col-lg-12 resume ">
								<!--<img src="--><?php //bloginfo('stylesheet_directory');?><!--/img/trait-debut-paragraphe.svg" alt="" class="trait">-->
								<?php //echo get_field('synopsis', false, false);  // enleve le p qui wrap le texte, et tous les p d'ailleurs
									the_field('synopsis');
								?>
					
								
							</div>
						<?php } ?>

						<?php if (get_field('preface')){ ?>
							<div class="col-lg-12 resume" <?php if (get_field('preface')){ echo 'style="padding-top:0;"'; } ?> >
                                <?php echo get_field('preface');  ?>

							</div>
							<?php } ?>


						<?php if (get_field('lauteur')){ ?>
							<div class="col-lg-12 lauteur">
								<h3>CINEASTA </h3>
								<img src="<?php bloginfo('stylesheet_directory');?>/img/trait-debut-paragraphe.svg" alt="" class="trait">
                                <?php echo get_field('lauteur', false, false);  ?>

							</div>
							<?php } ?>
                                 
	<?php
	$video = get_field('video_page_produit');
	$images = get_field('galerie');
	if (( $video ) || ( $images )) {

	?>

							<div class="col-lg-12 cadreblanc">
                                 <?php 
                                    $video = get_field('video_page_produit');
                                    if( $video ) { ?>
								<div class="video-responsive">
									<!-- <iframe width="420" height="315" src="https://www.youtube.com/embed/xc446vOqXm8" frameborder="0" allowfullscreen ></iframe>		-->
									<iframe width="640" height="564" src="<?php echo $video; ?>" frameborder="0" controls allowFullScreen mozallowfullscreen webkitAllowFullScreen></iframe>									
								</div>
                                
                                <?php } 


 							$images = get_field('galerie');

                                  if( $images ): 

                                ?>
						
								<div class="gallery" <?php if(!($video)) {echo "style='padding-top:0;'";} ?> >
									<div id="demo" class="carousel slide" data-ride="carousel">

									  <!-- Indicators -->
									 <!-- <ul class="carousel-indicators">
										<li data-target="#demo" data-slide-to="0" class="active"></li>
										<li data-target="#demo" data-slide-to="1"></li>
										<li data-target="#demo" data-slide-to="2"></li>
									  </ul>-->

									  <!-- The slideshow -->
									  <div class="carousel-inner">
                                          
                                        <?php  
           	 	                          /* $i =1;
                                          $postID = get_the_ID();
                                             $gallery = get_post_gallery_images($postID);
                                          if (!empty($gallery)){
                                            foreach( $gallery as $image_url ){*/
                                          $i =1;
                                         // $images = get_field('galerie');

                                        //    if( $images ): 
                                          foreach( $images as $image ): ?>
											<!-- <?php echo trim($image['url'], "?"); ?>-->
										<div class="lol carousel-item <?php if ($i ==1) { echo "active"; $i++; } ?>">
										  <img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>"> 
										</div>
                                          
                                        <?php endforeach;  ?>

                                        <?php //endif; ?> 
									  
                                        </div>

								
									  <!-- Left and right controls -->
									  <a class="carousel-control-prev" href="#demo" data-slide="prev">
										<span class="carousel-control-prev-icon"></span>
									  </a>
									  <a class="carousel-control-next" href="#demo" data-slide="next">
										<span class="carousel-control-next-icon"></span>
									  </a>
 							


									</div>
								</div>


 						<?php endif; ?> 

							</div> <!-- cadreblanc -->

<?php } // endif video image?>
							
						</div> <!-- row --> 
						
					</div> <!-- col lg 9 -->
					
			


					<div class="col-lg-3 order-lg-2 order-md-1 order-sm-2 colbuttons "> <!-- col-xl-2 -->
						


								      <?php 
		                                    $telechargements = get_field('telechargements');	
		                                   // print_r($telechargements);
		                                   if ($telechargements){
		                            ?>

									<?php //echo $technique['format']; ?>

						<div class="row">

								<?php 


							$ba = $telechargements['bande-annonce']; 
							$affiche = $telechargements['affiche_hd']; 
							$dp = $telechargements['dossier_de_presse']; 
							$revue = $telechargements['revue_de_presse']; 
							$photos = $telechargements['photos_hd']; 
							$extraits = $telechargements['extraits']; 
							$guia = $telechargements['guia']; 
							$calification = $telechargements['calification']; 
							$touslesdocuments = $telechargements['tous_les_documents']; 
							//print_r($ba);
							//$ba 
							$hd = $ba['hd']; 
							//print_r($hd);
							$dcp = $ba['dcp'];
							

/*
ok TRÁILER EN DCP
ok TRÁILER EN MP4
ok PÓSTER HD
ok FOTOGRAMAS HD
ok DOSSIER DE PRENSA
ok CLIPPING DE PRENSA 
ok EXTRACTOS 
GUÍA DE DISTRIBUCIÓN
CALIFICACIÓN POR EDADES
*/

							?>
                            <?php if( $hd || $dcp /*get_field('bande-annonce')*/ ){?>
								<div class="col-6 col-md-4 col-lg-12">
	                                <?php //the_field('bande-annonce'); ?>
	                               <!-- <a href="#" alt="">-->
	                                	<button class="download opensubmenuba">TRÁILER</button>
	                              <!--  </a>-->
	                                <div class="submenuba animated fadeIn">
	                                	<?php //print_r($hd);
	                                		if ($hd){
	                                	?>
	                                	<a href="<?php echo $hd; //echo $srchd; ?>" target="blank">MP4</a><br />
	                                	<?php 		} // endif $hd
	                                	 
	                                	if ($dcp){
	                                	?>
	                                		<a href="<?php echo $dcp; ?>" target="blank">DCP</a>
	                                	<?php }// endif  $dcp ?>
	                                </div>
								</div>
                            <?php } // endif $hd ou $dcp ?>


                             <?php if( $affiche /*get_field('affiche_hd')*/ ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $affiche; //the_field('affiche_hd'); ?>" alt="" download><button class="download">PÓSTER HD</button></a>
							</div>
                            <?php } ?>

                          

                             <?php if( $dp ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $dp; ?>" alt="" download><button class="download">DOSSIER DE PRENSA</button></a>
							</div>
                            <?php } ?>  
                            

                             <?php if( $revue ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $revue; ?>" alt="" download><button class="download">CLIPPING DE PRENSA</button></a>
							</div>
                            <?php } ?>  
                            


                             <?php if( $photos ){?>

								<div class="col-6 col-md-4 col-lg-12">
									 <a href="<?php echo $photos; ?>" alt="" download><button class="download">FOTOGRAMAS HD</button></a>
								</div>

							<!--<div class="col-6 col-md-4 col-lg-12">
								 	<button class="download opensubmenuphotos">PHOTOS HD</button>
									<div class="submenuphotos animated fadeIn">-->
		  								<?php 
		  									//foreach ($photos as $photo) {
		  								 	//$nom = $photo['nom_de_la_photo'];
		                                       //$url = $photo['fichier'];
		                                ?>
		                                <!--<a href="--><?php //echo $url; ?><!--" download>--><?php //echo $nom; ?><!--</a><br />-->
		                                <?php //}	?>
			                <!--        </div>
			                </div>-->

                            <?php } ?>


                             <?php if( $extraits ){?>
                             <?php //if( have_rows('photos_hd') ): ?>
							<div class="col-6 col-md-4 col-lg-12">
								<!-- <a href="#" alt="">-->
								 	<button class="download opensubmenuextraits">EXTRACTOS</button>
								<!-- </a>-->
							
									<div class="submenuextraits animated fadeIn">

		  									 <?php 
		  									 //print_r($photos);
		  									foreach ($extraits as $extrait) {
		  									 	$nom = $extrait['nom_de_lextrait'];
		                                        $url = $extrait['fichier'];
		  									
		  									// while( have_rows('photos_hd') ): the_row();

		                                   //     $nom= get_sub_field('nom_de_la_photo');
		                                    //    $url= get_sub_field('fichier');
		                                        ?>
		                                        
		                                        <a href="<?php echo $url; ?>" target="blank"><?php echo $nom; ?></a><br />

		                                    
		                                <?php //endwhile; 
			                                	 }
										?>
			                        </div>
			                </div>
                            <?php } ?>


                            	   <?php if( $guia /*get_field('affiche_hd')*/ ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $guia; //the_field('affiche_hd'); ?>" alt="" download><button class="download">GUÍA DE DISTRIBUCIÓN</button></a>
							</div>
                            <?php } ?>

                             <?php if( $calification /*get_field('affiche_hd')*/ ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $calification; //the_field('affiche_hd'); ?>" alt="" download><button class="download">CALIFICACIÓN POR EDADES</button></a>
							</div>
                            <?php } ?>


                            <?php if( $touslesdocuments ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $touslesdocuments; ?>" alt="" download><button class="downloadall">TOUS LES DOCUMENTS</button></a>
							</div>
                            <?php } ?>




						</div>

						<?php } // endif $telechargements ?>


					</div>


					
				</div>
				
				
			</div>
		</div>

	<!--</div>--><!-- row -->
	
	
	
	</div>





<div class="container-fluid showwhenmobile <?php //print_r($category_array); ?>">



			<div class="row ">
					<div class="col-12 ">
					<!--<h4>--><?php //echo $annee . ' / ' . get_field('pays_dorigine') .  ' / ' . get_field('duree'); ?><!-- </h4> -->
					<!--<h4 class="visa">VISA --><?php //echo get_field('visa'); ?><!--</h4>-->
					</div>
					<div class="col-12 order-sm-12">
					<!--<div class="centerTab">-->

					<?php 
					$date_de_sortie = get_field('date_de_sortie');
					$date_de_sortie_vod = get_field('date_de_sortie_vod');
					$date_de_sortie_dvd = get_field('date_de_sortie_dvd');
					if((($date_de_sortie) && ($mea != "salle")) || (($date_de_sortie_vod) && ($mea != "vod")) || (($date_de_sortie_dvd) && ($mea != "dvd"))){ ?>
						<table class="tableFilm" style="margin-bottom: 0;">
						<tbody>
							
                            <?php

                            ?>

                            <?php //$pays_dorigine = get_field('pays_dorigine');
							$date_de_sortie = get_field('date_de_sortie');	
                                    if (($date_de_sortie) && ($mea != "salle")){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Sortie en salle</b></td>
								<td class="colRight"><?php echo $date_de_sortie; ?></td>
							</tr>
                            <?php } ?>

                           <?php //$pays_dorigine = get_field('pays_dorigine');
							$date_de_sortie_vod = get_field('date_de_sortie_vod');
                                    if (($date_de_sortie_vod) && ($mea != "vod")){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Sortie VOD</b></td>
								<td class="colRight"><?php echo $date_de_sortie_vod; ?></td>
							</tr>
                            <?php } ?>

                               <?php //$pays_dorigine = get_field('pays_dorigine');
							$date_de_sortie_dvd = get_field('date_de_sortie_dvd');	
                                    if (($date_de_sortie_dvd) && ($mea != "dvd")){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Sortie DVD</b></td>
								<td class="colRight"><?php echo $date_de_sortie_dvd; ?></td>
							</tr>
                            <?php } ?>


						</tbody>
						</table>

						<?php } ?>


						<table class="tableFilm">
						<tbody>




						<?php //$pays_dorigine = get_field('pays_dorigine');
						$annee_de_production = get_field('annee_de_production');
                                    if ($annee_de_production){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Année de production</b></td>
								<td class="colRight"><?php echo $annee_de_production; ?></td>
							</tr>
                            <?php } ?>


                            						<?php //$pays_dorigine = get_field('pays_dorigine');
						$date_de_tournage = get_field('date_de_tournage');
                                    if ($date_de_tournage){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Date de tournage</b></td>
								<td class="colRight"><?php echo $date_de_tournage; ?></td>
							</tr>
                            <?php } 
                            						$lieu_de_tournage = get_field('lieu_de_tournage');
                                    if ($lieu_de_tournage){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Lieu de tournage</b></td>
								<td class="colRight"><?php echo $lieu_de_tournage; ?></td>
							</tr>
                            <?php } ?>

                            

						<?php $pays_dorigine = get_field('pays_dorigine');	
                                    if ($pays_dorigine){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Pays</b></td>
								<td class="colRight"><?php echo get_field('pays_dorigine'); ?></td>
							</tr>
                            <?php } ?>





                                                        <?php $langue = get_field('langue');	
                                    if ($langue){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Langue</b></td>
								<td class="colRight"><?php echo get_field('langue'); ?></td>
							</tr>
                            <?php } ?>

						<?php $duree = get_field('duree');	
                                    if ($duree){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Durée</b></td>
								<td class="colRight"><?php echo get_field('duree'); ?></td>
							</tr>
                            <?php } ?>

						<?php $visa = get_field('visa');	
                                    if ($visa){?>
							<tr > <!-- class="titre" -->
								<td class="colLeft"><b>Visa</b></td>
								<td class="colRight"><?php echo get_field('visa'); ?></td>
							</tr>
                            <?php } ?>



                            <?php $titre = get_field('titre_original');	
                                    if ($titre){?>
							<tr class="titre">
								<td class="colLeft"><b>Titre original </b></td>
								<td class="colRight"><?php echo $titre; ?></td>
							</tr>
                            <?php } ?>
                            

                            
						</tbody>
						</table>




						<table class="tableFilm">
						<tbody>



                            
                            <?php if( have_rows('acteurs') ): ?>
		
	                            <?php while( have_rows('acteurs') ): the_row(); 

			                          // vars
	                                        $role = get_sub_field('role');
	                                        $acteur = get_sub_field('acteur');

	                                    ?>
	                            
										<tr class="acteurs">
											<td class="colLeft"><b><?php echo $role; ?></b></td>
											<td class="colRight"><?php echo $acteur; ?></td>
										</tr>
								<?php endwhile; ?>

							<?php endif; ?>
                            
						</tbody>
						</table>




						<table class="tableFilm">
						<tbody>

				                        <?php 
		                                 $technique = get_field('technique');	
		                                   if ($technique['realisation']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Réalisation</b></td>
										<td class="colRight"><?php echo $technique['realisation']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['scenario']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Scénario</b></td>
										<td class="colRight"><?php echo $technique['scenario']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['photographie']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Photographie</b></td>
										<td class="colRight"><?php echo $technique['photographie']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['prise_de_son']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Prise de son</b></td>
										<td class="colRight"><?php echo $technique['prise_de_son']; ?></td>
									</tr>

									<?php }   ?>
										<?php
        							if ($technique['costumes']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Costumes</b></td>
										<td class="colRight"><?php echo $technique['costumes']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['maquillage']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Maquillage</b></td>
										<td class="colRight"><?php echo $technique['maquillage']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['decors']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Décors</b></td>
										<td class="colRight"><?php echo $technique['decors']; ?></td>
									</tr>

									<?php }   ?>
									<?php
        							if ($technique['direction_artistique']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Direction artistique</b></td>
										<td class="colRight"><?php echo $technique['direction_artistique']; ?></td>
									</tr>

									<?php }   ?>
								<?php
        							if ($technique['montage_image']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Montage image</b></td>
										<td class="colRight"><?php echo $technique['montage_image']; ?></td>
									</tr>

									<?php }   ?>
								<?php
        							if ($technique['montage_son']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Montage son</b></td>
										<td class="colRight"><?php echo $technique['montage_son']; ?></td>
									</tr>

									<?php }   ?>
						
								<?php
        							if ($technique['musique']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Musique</b></td>
										<td class="colRight"><?php echo $technique['musique']; ?></td>
									</tr>

									<?php }   ?>
															<?php
        							if ($technique['mixage']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Mixage</b></td>
										<td class="colRight"><?php echo $technique['mixage']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['effets_speciaux']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Effets spéciaux</b></td>
										<td class="colRight"><?php echo $technique['effets_speciaux']; ?></td>
									</tr>

									<?php }   ?>


									<?php
        							if ($technique['producteur']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Producteur</b></td>
										<td class="colRight"><?php echo $technique['producteur']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['production']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Production</b></td>
										<td class="colRight"><?php echo $technique['production']; ?></td>
									</tr>

									<?php }   ?>

									<?php
        							if ($technique['coproduction']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Coproduction</b></td>
										<td class="colRight"><?php echo $technique['coproduction']; ?></td>
									</tr>

									<?php }   ?>
									
									<?php
        							if ($technique['direction_de__la_production']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Direction de la Production</b></td>
										<td class="colRight"><?php echo $technique['direction_de__la_production']; ?></td>
									</tr>

									<?php }   ?>

									
									<?php
        							if ($technique['avec_la_participation_de']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Avec la participation de</b></td>
										<td class="colRight"><?php echo $technique['avec_la_participation_de']; ?></td>
									</tr>

									<?php }   ?>


									<?php
        							if ($technique['avec_le_soutien_de']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Avec le soutien de</b></td>
										<td class="colRight"><?php echo $technique['avec_le_soutien_de']; ?></td>
									</tr>

									<?php }   ?>


									<?php
        							if ($technique['en_partenariat_avec']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>En partenariat avec</b></td>
										<td class="colRight"><?php echo $technique['en_partenariat_avec']; ?></td>
									</tr>

									<?php }   ?>

																		<?php
        							if ($technique['en_association_avec']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>En association avec</b></td>
										<td class="colRight"><?php echo $technique['en_association_avec']; ?></td>
									</tr>

									<?php }   ?>


																											<?php
        							if ($technique['attachee_de_presse']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Attaché(e) de presse</b></td>
										<td class="colRight"><?php echo $technique['attachee_de_presse']; ?></td>
									</tr>

									<?php }   ?>

																<?php
        							if ($technique['distribution']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Distribution</b></td>
										<td class="colRight"><?php echo $technique['distribution']; ?></td>
									</tr>

									<?php }   ?>

																									<?php
        							if ($technique['programmation']){
		                            ?>

		                            <tr>
										<td class="colLeft"><b>Programmation</b></td>
										<td class="colRight"><?php echo $technique['programmation']; ?></td>
									</tr>

									<?php }   ?>


						</tbody>
						</table>





					<!--</div>-->
					</div>
	</div>


	
</div>






	

</div>