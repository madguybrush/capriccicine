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

            <div class="col-12 padding2">
                <h1 class="animated fadeInUp"><?php the_title(); ?></h1>
 
                        <?php if( get_field('sous_titre') ): ?>
                            <h2 class="animated fadeInUp">
                               <?php echo get_field('sous_titre');   ?>
                                </h2>
                                 <?php endif; ?>

                <h2 class="animated fadeInUp">
                <?php //if (($categories[0] === "DVD" ) || ($categories[0] === "Films" )) { echo "un film de ";}
                                //else { echo "un livre de "; } ?> <?php echo get_field('auteur'); ?></h2>



            </div>


            
        </div>

    </header>


<div class="content container-fluid"> <!--container -->

		<div class="row infoscontent animated fadeInUp">
		

			<div class="col-lg-9 order-lg-1 order-md-2 order-sm-1"> <!-- col-xl-10 -->
					
						<div class="row">
					

						
						
						<?php if (get_field('texte')){ ?>
							<div class="col-lg-12 resume noticias <?php if (get_field('cartelera')){ echo "cartelera";} ?>">
								<!--<img src="--><?php //bloginfo('stylesheet_directory');?><!--/img/trait-debut-paragraphe.svg" alt="" class="trait">-->
								<?php //echo get_field('synopsis', false, false);  // enleve le p qui wrap le texte, et tous les p d'ailleurs
									the_field('texte');
								?>
					
								
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
							$touslesdocuments = $telechargements['tous_les_documents']; 
							//print_r($ba);
							//$ba 
							$hd = $ba['hd']; 
							//print_r($hd);
							$dcp = $ba['dcp'];
							


							?>
                            <?php if( $hd || $dcp /*get_field('bande-annonce')*/ ){?>
								<div class="col-6 col-md-4 col-lg-12">
	                                <?php //the_field('bande-annonce'); ?>
	                               <!-- <a href="#" alt="">-->
	                                	<button class="download opensubmenuba">BANDE-ANNONCE</button>
	                              <!--  </a>-->
	                                <div class="submenuba animated fadeIn">
	                                	<?php //print_r($hd);
	                                		if ($hd){
	                                	?>
	                                	<a href="<?php echo $hd; //echo $srchd; ?>" target="blank">HD</a><br />
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
								 <a href="<?php echo $affiche; //the_field('affiche_hd'); ?>" alt="" download><button class="download">AFFICHE HD</button></a>
							</div>
                            <?php } ?>

                             <?php if( $dp ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $dp; ?>" alt="" download><button class="download">DOSSIER DE PRESSE</button></a>
							</div>
                            <?php } ?>  
                            

                             <?php if( $revue ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $revue; ?>" alt="" download><button class="download">REVUE DE PRESSE</button></a>
							</div>
                            <?php } ?>  
                            


                             <?php if( $photos ){?>

								<div class="col-6 col-md-4 col-lg-12">
									 <a href="<?php echo $photos; ?>" alt="" download><button class="download">PHOTOS HD</button></a>
								</div>



                            <?php } ?>


                             <?php if( $extraits ){?>
                             <?php //if( have_rows('photos_hd') ): ?>
							<div class="col-6 col-md-4 col-lg-12">
								<!-- <a href="#" alt="">-->
								 	<button class="download opensubmenuextraits">EXTRAITS</button>
								<!-- </a>-->
							
									<div class="submenuextraits animated fadeIn">

		  									 <?php 
		  									 //print_r($photos);
		  									foreach ($extraits as $extrait) {
		  									 	$nom = $extrait['nom_de_lextrait'];
		                                        $url = $extrait['fichier'];
		  									
	
		                                        ?>
		                                        
		                                        <a href="<?php echo $url; ?>" target="blank"><?php echo $nom; ?></a><br />

		                                    
		                                <?php //endwhile; 
			                                	 }
										?>
			                        </div>
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

