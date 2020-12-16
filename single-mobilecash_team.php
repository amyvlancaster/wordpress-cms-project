	<?php get_header(); ?>
	<!-- Main -->
  		<main role="main" class="container layout">
  			<div class="row">
  				<div class="col col-lg-8 col-md-6 col-sm-12">
      		<?php 
				if ( have_posts() ) :
					while ( have_posts() ) : the_post(); 
						?><?
					the_post_thumbnail("medium");
					?>
					<p class="single-team-title"><?
					the_title("<h1 class='st-title'>","</h1>");
					?></p><p class='position'><? the_field("Position"); ?></p><?
					the_content();
					?>
					<?
					endwhile;
					endif;

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
    					comments_template();
					endif;

					?>
				</div>
			</div>
  		</main>
  		<!-- Footer -->
  		<?php get_footer(); ?>