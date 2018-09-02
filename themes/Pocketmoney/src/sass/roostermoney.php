<?php
defined( 'ABSPATH' ) or die();
/*
    Plugin Name: RoosterMoney API 
    Plugin URI: https://api.roostermoney.com/
    description: Connect to RoosterMoney REST API
    Version: 1.0
    Author: Lauren Clark
    Author URI: http://laurenclark.io
    License: GPL
*/

 
$key = base64_encode( urlencode( "n8KP16uvGZA6xvFTtb8IAA:i4pmOV0duXJv7TyF5IvyFdh5wDIqfJOovKjs92ei878" ) );
$request = wp_remote_post('https://api.twitter.com/oauth2/token', array(
	'headers' => array(
		'Authorization' => 'Basic ' . $key,
		'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
	),
	'body' => 'grant_type=client_credentials',
	'httpversion' => '1.1'
));
$token = json_decode( $request['body'] );
echo "<pre>"; var_dump($token); echo "</pre>";

$user = "lauren_c";
$secret = base64_encode( urlencode("40c998b87c09ddbaaeda") );
$authURL = "https://api.roostermoney.com/v1/auth/";
$authHeaders = array(
    'Content-Type' => 'application/json';
    );
$authBody = array(
    'accessKey' => $user,
    'accessPassword' => $secret
);

$response = wp_remote_post( $authURL, array(
	'method' => 'POST',
	'timeout' => 30,
	'blocking' => true,
	'headers' => $authHeaders,
	'body' => a$authBody
    )
);

if ( is_wp_error( $response ) ) {
   $error_message = $response->get_error_message();
   echo "Something went wrong: $error_message";
} else {
   echo 'Response:<pre>';
   print_r( $response );
   set_transient( 'special_query_results', $special_query_results, 60*60*12 );
   echo '</pre>';

}

// $url = 'https://xxx';

// $body = array(
// 'auth_token' => 'xxxxxx',
// 'list_id' => 'xxxxx,
// 'name' => 'Office',
// 'campaign_id' => 'xxxxx'
// );

// $response = wp_remote_post($url, array(
// 'body'=>$body, 
// 'sslverify' => false // this is needed if your server doesn't have the latest CA certificate lists
// ) );

// if ( is_wp_error( $response ) || 200 != wp_remote_retrieve_response_code( $response ) ) {
// // error handling goes here
// }

// $results = wp_remote_retrieve_body( $response );
// // $results has the actual results in it



?>
