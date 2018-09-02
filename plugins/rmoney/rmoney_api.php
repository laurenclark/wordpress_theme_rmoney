<?php
/*
Plugin Name: Rmoney API Connect
Plugin URI: https://api.roostermoney.com
Author: Lauren Clark
Version: 1.0.0
Author URI: https://github.com/laurenclark
Text Domain: rmoney
*/

function api_enqueue_script() {   
    wp_enqueue_script( 'rooster_api', plugin_dir_url( __FILE__ ) . 'js/rmoney.js', array( 'jquery' )  );
}

add_action('wp_enqueue_scripts', 'api_enqueue_script');


?>

