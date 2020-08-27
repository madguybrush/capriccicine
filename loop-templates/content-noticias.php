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
	
	//$images = get_field('galerie');
	//if (( $video ) || ( $images )) {

	?>

							
                                 <?php 
                                    $video = get_field('bande_annonce');
                                    if( $video ) { ?>
                                <div class="col-lg-12 cadreblanc" style="background-color: #F8F8F8">
									<div class="video-responsive"  style="background-color: #F8F8F8">
										<!-- <iframe width="420" height="315" src="https://www.youtube.com/embed/xc446vOqXm8" frameborder="0" allowfullscreen ></iframe>		-->
										<iframe width="640" height="564" src="<?php echo $video; ?>" frameborder="0" controls allowFullScreen mozallowfullscreen webkitAllowFullScreen></iframe>									
									</div>
                                </div> <!-- cadreblanc -->
                                <?php } 


                                ?>
						
			
							

<?php //} // endif video image?>
							

<div class="col-lg-12 order-lg-last px-4 py-3">
		<?php //the_posts_navigation(); ?>

		<?php 

		$post = get_post();
		//print_r($post);
		$id = $post->ID;
		//$id = $post['ID'];
		//print_r($id);


		$categories = get_the_category();
 
if ( ! empty( $categories ) ) {
	$category = esc_html( $categories[0]->name );
    //echo $category;
}


		/*$post_categories = wp_get_post_categories($id);
		$cats = array();
     	foreach($post_categories as $c){
    		$cat = get_category( $c );
    		$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
		}
		$category = $cats[0];
		print_r($category);*/

        // if (isset($_GET['category'])) {
    	//	$category = $_GET['category'];
   
           // $prev = add_query_arg( 'category', $category, get_permalink(get_adjacent_post(true,'',false)) );
          //  $next = add_query_arg( 'category', $category, get_permalink(get_adjacent_post(true,'',true)) );
           
		//} else {
     	 	$prev = get_permalink(get_adjacent_post(true,'',false));
      	  	$next = get_permalink(get_adjacent_post(true,'',true));  
		//} 
         
         ?>

        <div class="row">
         	<div class="col-3">
				<?php if ($prev != get_permalink() ) { ?>
				
				<a class="prev" href="<?php echo $prev; ?>" >
		            <img src="<?php bloginfo('stylesheet_directory');?>/img/precedent.svg">   
		            News précédente
		            
		        
		        </a><?php } ?> 
		    </div>

		    <div class="col-6">
		    	
		    </div>


		    <div class="col-3 text-right">
				<?php if ($next != get_permalink() ) { ?>
				<a class="next" href="<?php echo $next; ?>" >
		        
		            News suivante <img src="<?php bloginfo('stylesheet_directory');?>/img/suivant.svg">
		                	 
		        
		        </a><?php } ?>
		    </div>


    	</div>

	</div>

						</div> <!-- row --> 
						



	


					</div> <!-- col lg 9 -->
					
			


					<div class="col-lg-3 order-lg-2 order-md-1 order-sm-2 newslettertitle colbuttons "> <!-- col-xl-2 -->
						

		<!--	<div class="col-lg-4 offset-lg-1 newslettertitle">  col-lg-3 offset-lg-1 -->
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
			


			<!--</div>-->







								      <?php 
		                                    $fiche = get_field('fiche_film');	
		                                   // print_r($telechargements);
		                                   if ($fiche){
		                            ?>

									<?php //echo $technique['format']; ?>

						<div class="row">


							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php echo $fiche; //the_field('affiche_hd'); ?>" alt=""><button class="download">VOIR LA FICHE DU FILM</button></a>
							</div>
                          
                           

						</div>

						<?php } // endif $telechargements ?>


					</div> <!-- fin colonne droite -->


	
</div> <!-- end row -->

<!--
<div class="row">

</div>
-->



	</div> <!-- end content container-fluid -->

</div>
