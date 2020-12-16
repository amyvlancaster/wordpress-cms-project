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
					<?
					the_title("<h1>","</h1>");
					?><time><? the_date(); ?></time><?
					the_content();
					the_category();
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
				<div class="col col-lg-4 col-md-6 col-sm-12">
					<ul id="sidebar">
    					<?php dynamic_sidebar( 'blog-sidebar' ); ?>
					</ul>
				</div>
			</div>
  		</main>
  		<!-- Footer -->
  		<?php get_footer(); ?>