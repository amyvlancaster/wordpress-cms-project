	<?php get_header(); ?>
	<!-- Main -->
  		<main role="main" class="container layout">

			<div id="mobilecash_carousel" class="carousel slide" data-ride="carousel">

			  <div class="carousel-inner">


			  	<?php
 
				$args = array(
    			'post_type' => 'mobilecash_slides',

				);
				$query = new WP_Query( $args );
				$the_query = new WP_Query( $args );
			 
			// The Loop
			if ( $the_query->have_posts() ) {
			    

			    $active="active";
			    $first=true;

			    while ( $the_query->have_posts() ) {
			        $the_query->the_post();
			        if($first===true) {
			        	$first=false;
			        } else {
			        	$active="";
			        }
			        ?>

			        <div class="carousel-item <?=$active; ?>">
			      <img class="d-block w-100" src="<?=get_the_post_thumbnail_url(get_the_id(), "mobilecash_banner")?>" alt="First slide">
			      <div class="carousel-caption d-none d-md-block">
    				<h5><? the_title(); ?></h5>
    				<? the_content(); ?>
  					</div>
			    </div>

			        <?
			    }
			} else {
			    // no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();


			?>

			  </div>
			  <a class="carousel-control-prev" href="#mobilecash_carousel" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#mobilecash_carousel" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>

      				<?php 
						if ( have_posts() ) {
							while ( have_posts() ) {
								the_post(); 
								the_title("<h1>","</h1>");
								the_content();
							} // end while
						} // end if
					?>
      			</div>
    		</div>
  		</main>
  		<!-- Footer -->
  		<?php get_footer(); ?>

