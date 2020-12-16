<footer class="layout">
	<div class="footercontent">
    	<?php
    		//Footer menu
    		wp_nav_menu( array(
	       		'menu'            => 'Footer',
				'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
				'container'       => 'footer',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'navbar-nav mr-auto',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'walker'          => new WP_Bootstrap_Navwalker(),
		  	) );
		?>
    	<p class="copyright">Copyright 2020 Amy Lancaster.</p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
