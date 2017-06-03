<?php
/**
 * Accelerate Marketing Child functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */
 
 // Create Custom Post Types
 function create_custom_post_types() {
	 // create a case studies post type
	 register_post_type( 'case_studies', 
		array(
			'labels' => array (
				'name' => __( 'Case Studies' ),
				'singular_name' => __( 'Case Study' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'case-studies' ),
		)
	 );
	 // create a case studies post type
	 register_post_type( 'services', 
		array(
			'labels' => array (
				'name' => __( 'Services' ),
				'singular_name' => __( 'service' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'services' ),
		)
	 );
	 // create a 404 post type
	 register_post_type( 'error_404', 
		array(
			'labels' => array (
				'name' => __( 'Error 404' ),
				'singular_name' => __( 'Error 404' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => 'error_404' ),
		)
	 );
 }
 
 // Have WP add the custom post types
 add_action( 'init', 'create_custom_post_types' );
 
 // Remove 'Accelerate' in the description - call in foorter.php ONLY
 function teal_accelerate_footer() {
	 add_filter( 'option_blogdescription', 'accelerate_change_description_footer', 10, 2 );
	 
	 function accelerate_change_description_footer($description) {
		 $description = str_replace('Accelerate', '', $description);
		 return $description;
	 }
 };

// change excerpt symbol
function custom_excerpt_more($more) {
	return '...<div class="read-more read-more-custom"><a href="'. get_permalink() . '">Read more <span>&raquo;</span></a></div>';
}
add_filter('excerpt_more', 'custom_excerpt_more');

// Add specific class to Contact page 
function accelerate_body_classes($classes) {
	if (is_page('contact-us') ) {
		$classes[] = 'contact';
	} elseif (is_page( 'blog' ) ) {
		$classes[] = 'blog-archive';
	} elseif (is_page( 'about-us' ) ) {
		$classes[] = 'about';	}
	return $classes;
}
add_filter( 'body_class','accelerate_body_classes' );

// Add Page x of y to the nav footer section, currently only on the blog page
function current_paged( $var = '' ) { 	
    if( empty( $var ) ) {
        global $wp_query;
        if( !isset( $wp_query->max_num_pages ) )
            return;
        $pages = $wp_query->max_num_pages;
    }
    else {
        global $$var;
            if( !is_a( $$var, 'WP_Query' ) )
                return;
        if( !isset( $$var->max_num_pages ) || !isset( $$var ) )
            return;
        $pages = absint( $$var->max_num_pages );
    }
    if( $pages < 1 )
        return;
    $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    echo "Page " . $page . ' of ' . $pages;
} 

// Create a sidebar to hold the Twitter feed
function accelerate_theme_child_widget_init() {
	
	register_sidebar( array(
	    'name' =>__( 'Homepage sidebar', 'accelerate-theme-child'),
	    'id' => 'sidebar-2',
	    'description' => __( 'Appears on the static front page template', 'accelerate-theme-child' ),
	    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    'after_widget' => '</aside>',
	    'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'accelerate_theme_child_widget_init' );
 