	<?php get_header(); ?>
	<!-- Main -->
  		<main role="main" class="container layout">
    		<h1>Search results for "<?=strip_tags($_GET['s']) ?>"</h1>
      		<?php 
				if ( have_posts() ) :
					while ( have_posts() ) : the_post(); 
						?><article class="entry">
							<? if(has_post_thumbnail()):?>
								<div class="img"><?
								the_post_thumbnail("thumbnail");
								?></div>
							<? endif; ?>			
					<div class="copy">
					<?
					$permalink=get_permalink();
					the_title("<h2><a href='".$permalink."'>","</a></h2>");
					?><time><? the_date(); ?></time><?
					the_excerpt();
					the_category();
					?><a href='<? the_permalink(); ?>' class="readmore">Read More <i class="fas fa-angle-right"></i></a>
					</div>
					</article><?
					endwhile;

					else:
						?><div class="alert alert-secondary" role="alert">No results found.</div><?
					endif;
					?>

  		</main>
  		<!-- Footer -->
  		<?php get_footer(); ?>