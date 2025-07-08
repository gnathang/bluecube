<?php

add_theme_support( 'post-thumbnails' );

// Adding excerpt for page
add_post_type_support( 'page', 'excerpt' );


function wpb_custom_new_menu() {

	register_nav_menus(array(
		'main'=> __('Main Menu'),
		'footer'=> __('Footer Menu'),
	));
}
add_action( 'init', 'wpb_custom_new_menu' );


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

  }

	/* Actions and Filters */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', function( $classes ) {
	    return array_merge( $classes, array( 'class-name' ) );
	} );

	/* Scripts */

	function starkers_script_enqueuer() {

		// Include the lazyload script
       //wp_enqueue_script('lazyload', get_theme_file_uri('/assets/js/lazyload.11.0.5.min.js'), array('jquery'), '11.0.5', true);

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}


function addnew_query_vars($vars)
{
	$vars[] = 'designdough-portfolio'; // c is the name of variable you want to add
//	$vars[] = 'c'; // c is the name of variable you want to add
	return $vars;
}
add_filter( 'query_vars', 'addnew_query_vars', 10, 1 );

function addnew_query_vars_blogs($vars)
{
	$vars[] = 'designdough-blogs'; // c is the name of variable you want to add
//	$vars[] = 'c'; // c is the name of variable you want to add
	return $vars;
}
add_filter( 'query_vars', 'addnew_query_vars_blogs', 10, 1 );


function tg_include_custom_post_types_in_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'page', 'post_type', array( 'post', 'events', 'publications', 'views' ) );
    }
}
add_action( 'pre_get_posts', 'tg_include_custom_post_types_in_search_results' );


/* include functions */

require get_parent_theme_file_path('/inc/admincss.php');

// require get_parent_theme_file_path('/inc/comments.php');

require get_parent_theme_file_path('/inc/contactform.php');

require get_parent_theme_file_path('/inc/responsiveimages.php');

require get_parent_theme_file_path('/inc/siteoptions.php');

require get_parent_theme_file_path('/inc/customposttypes.php');

// require get_parent_theme_file_path('/inc/disableadminbar.php');

require get_parent_theme_file_path('/inc/posttonews.php');

require get_parent_theme_file_path('/inc/excerpt-length.php');



// add svg support
function add_file_types_to_uploads($file_types) {
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

?>