<?php
/**
 * Enqueue all styles and scripts
 *
 * enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 */

function pocketmoney_scripts() {

		// Enqueue the main Stylesheet.
        wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/dist/css/app.css' );
		
		// Enqueue Google Fonts
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400', false);

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false );

		// Deregister the jquery-migrate version bundled with WordPress.
		wp_deregister_script( 'jquery-migrate' );

		// Enqueue FontAwesome from CDN. Uncomment the line below if you need FontAwesome.
        wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/5016a31c8c.js', array(), '4.7.0', true );
        
        // Enqueue JS App file
        wp_enqueue_script( 'jsapp', get_template_directory_uri() . '/src/js/app.js', array( 'jquery' ) );

	}
add_action( 'wp_enqueue_scripts', 'pocketmoney_scripts' );


/**
 * Turn on Featured Images within Posts
 */

add_theme_support( 'post-thumbnails' ); 

/**
 * Add thumbnail to WP_API JSON response 
 */

function add_thumbnail_to_JSON() {

	register_rest_field( 'post',
		'featured_image_src',
		array(
			'get_callback'    => 'get_image_src',
			'update_callback' => null,
			'schema'          => null,
			)
    );
}

add_action( 'rest_api_init', 'add_thumbnail_to_JSON' );

function get_image_src( $object, $field_name, $request ) {
    $size = 'large'; 
    $feat_img_array = wp_get_attachment_image_src($object['featured_media'], $size, true);
    return $feat_img_array[0];
}
/**
 * Filter the except length to 20 words.
 */

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );