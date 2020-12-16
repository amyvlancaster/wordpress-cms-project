<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Bootstrap Template for Wordpress - Mobile Cash">
      <?php wp_head(); ?>
    </head>
    <body <?php body_class() ?>>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">Mobile Cash</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <?php 
            //Primary Menu 
            wp_nav_menu( array(
      	       'menu'            => 'Primary',
      			   'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
      			   'container'       => 'div',
      			   'container_class' => '',
      			   'container_id'    => '',
      			   'menu_class'      => 'navbar-nav mr-auto',
      			   'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
      			   'walker'          => new WP_Bootstrap_Navwalker(),
      		  ) );
          ?>
          <form class="form-inline my-2 my-lg-0 searchform action="<?=site_url(); ?>">
            <input class="form-control mr-sm-2 searchinput" name="s" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" onclick="submit()" type="submit">Search</button>
          </form>
        </div>
      </nav>