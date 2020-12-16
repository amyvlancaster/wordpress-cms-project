	<?php get_header(); ?>
	<!-- Main -->
  		<main role="main" class="container layout">
    		<div class="row">
      			<div class="col">
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
  		