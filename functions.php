<?php
	//Bootstrap Nav Walker
	require "class-wp-bootstrap-navwalker.php";

	//JS and CSS scripts
	function mobilecash_theme_name_scripts() {
		wp_enqueue_style( 'fontawesome', "https://use.fontawesome.com/releases/v5.15.1/css/all.css" );
		wp_enqueue_style( 'google-fonts', "https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" );
		wp_enqueue_style( 'bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" );
		wp_enqueue_style( 'core', get_template_directory_uri()."/css/core.css" );
	    wp_enqueue_style( 'mobileCash', get_stylesheet_uri() );
	    wp_enqueue_script( "jquery-slim", "https://code.jquery.com/jquery-3.3.1.slim.min.js", array(), "3.5.1", true );
		wp_enqueue_script( "popper", "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js", array("jquery-slim"), "1.14.7", true );
		wp_enqueue_script( "bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js", array("jquery-slim", "popper"), "4.3.1", true );
        wp_enqueue_script("analytics", "https://www.googletagmanager.com/gtag/js?id=UA-185610953-1", array("jquery-slim", "popper", "bootstrap", "", true));
	}
	add_action( 'wp_enqueue_scripts', 'mobilecash_theme_name_scripts' );

	//Register menus
	if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {
	    function mobilecash_Bootstrap_register_nav_menu(){
	        register_nav_menus( array(
	            'primary_menu' => __( 'Primary Menu', 'text_domain' ),
	            'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
	        ) );
    }
    add_action( 'after_setup_theme', 'mobilecash_Bootstrap_register_nav_menu', 0 );
}

/**
 * Add a sidebar.
 */
function mobilecash_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'textdomain' ),
        'id'            => 'blog-sidebar',
        'description'   => __( 'Widgets in this area will be shown in the blog sidebar', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'mobilecash_slug_widgets_init' );

/* add a title tag */
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

/* Custom post type - Team */
function mobilecash_custom_post_types_init() {
    $labels = array(
        'name'                  => _x( 'Team', 'Post type general name', 'recipe' ),
        'singular_name'         => _x( 'Team', 'Post type singular name', 'recipe' ),
        'menu_name'             => _x( 'Team', 'Admin Menu text', 'recipe' ),
        'name_admin_bar'        => _x( 'Team', 'Add New on Toolbar', 'recipe' ),
        'add_new'               => __( 'Add Team Member', 'recipe' ),
        'add_new_item'          => __( 'Add New Team Member', 'recipe' ),
        'new_item'              => __( 'New Team Member', 'recipe' ),
        'edit_item'             => __( 'Edit Team Member', 'recipe' ),
        'view_item'             => __( 'View Team Member', 'recipe' ),
        'all_items'             => __( 'All Team Member', 'recipe' ),
        'search_items'          => __( 'Search Team Member', 'recipe' ),
        'parent_item_colon'     => __( 'Parent Team Member:', 'recipe' ),
        'not_found'             => __( 'No Team Members found.', 'recipe' ),
        'not_found_in_trash'    => __( 'No Team Members found in Trash.', 'recipe' ),
        'featured_image'        => _x( 'Bio Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'recipe' ),
        'set_featured_image'    => _x( 'Set bio image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'recipe' ),
        'remove_featured_image' => _x( 'Remove bio image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'recipe' ),
        'use_featured_image'    => _x( 'Use as bio image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'recipe' ),
        'archives'              => _x( 'Team archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'recipe' ),
        'insert_into_item'      => _x( 'Insert into Team', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'recipe' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Team Member', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'recipe' ),
        'filter_items_list'     => _x( 'Filter Team Member list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'recipe' ),
        'items_list_navigation' => _x( 'Team list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'recipe' ),
        'items_list'            => _x( 'Team list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'recipe' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Team custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'team' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'       => false
    );
      
    register_post_type( 'mobilecash_team', $args );
}
add_action( 'init', 'mobilecash_custom_post_types_init' );


/*Custom post type - Slides*/
function mobilecash_custom_post_types2_init() {
    $labels = array(
        'name'                  => _x( 'Slides', 'Post type general name', 'recipe' ),
        'singular_name'         => _x( 'Slides', 'Post type singular name', 'recipe' ),
        'menu_name'             => _x( 'Slides', 'Admin Menu text', 'recipe' ),
        'name_admin_bar'        => _x( 'Slides', 'Add New on Toolbar', 'recipe' ),
        'add_new'               => __( 'Add Slide', 'recipe' ),
        'add_new_item'          => __( 'Add New Slider', 'recipe' ),
        'new_item'              => __( 'New Slide', 'recipe' ),
        /* 'edit_item'             => __( 'Edit Slide', 'recipe' ), */
        'view_item'             => __( 'View Slide', 'recipe' ),
        'all_items'             => __( 'All Slides', 'recipe' ),
        'search_items'          => __( 'Search Slides', 'recipe' ),
        'parent_item_colon'     => __( 'Parent Slide:', 'recipe' ),
        'not_found'             => __( 'No Slides found.', 'recipe' ),
        'not_found_in_trash'    => __( 'No Slides found in Trash.', 'recipe' ),
        'featured_image'        => _x( 'Slide Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'recipe' ),
        'set_featured_image'    => _x( 'Set slide image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'recipe' ),
        'remove_featured_image' => _x( 'Remove slide image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'recipe' ),
        'use_featured_image'    => _x( 'Use as slide image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'recipe' ),
        'archives'              => _x( 'Slide archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'recipe' ),
        'insert_into_item'      => _x( 'Insert into Slide', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'recipe' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Slide', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'recipe' ),
        'filter_items_list'     => _x( 'Filter Slides list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'recipe' ),
        'items_list_navigation' => _x( 'Slide list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'recipe' ),
        'items_list'            => _x( 'Slide list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'recipe' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Slides custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'slides' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'       => false
    );
      
    register_post_type( 'mobilecash_slides', $args );
}
add_action( 'init', 'mobilecash_custom_post_types2_init' ); 

//Slide resizing
function mobilecash_customImages() {
   add_image_size( 'mobilecash_banner', 1641, 562, true );
}
 
add_action( 'after_setup_theme', 'wpse_setup_theme' );

?>
