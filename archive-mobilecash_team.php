	<?php get_header(); ?>
	<!-- Main -->
  		<main role="main" class="container layout">
  			<div class="row">
  				<div class="col col-lg-8 col-md-6 col-sm-12">
    		<h1>Our Team</h1>
      		<?php 
				if ( have_posts() ) :
					while ( have_posts() ) : the_post(); 
						?><article class="entry">
							<div class="img"><?
					the_post_thumbnail("thumbnail");
					?></div>
					<div class="copy">
					<?
					$permalink=get_permalink();
					the_title("<h2><a href='".$permalink."'>","</a></h2>");
					?><p class='position'><? the_field("Position"); ?></p><?
					the_excerpt(); 
					?><a href='<? the_permalink(); ?>' class="readmore">Read More <i class="fas fa-angle-right"></i></a>
					</div>
					</article><?
					endwhile;
					endif;
					?>
				</div>
			</div>
  		</main>
  		<!-- Footer -->
  		<?php get_footer(); ?>