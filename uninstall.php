<?php 

/*
*
* Trigger this file on plugin uninstall
*
*/

if ( !defined( 'WP_UNISTALL_PLUGIN' ) ) {
    die;
}

// clear databased stored data
$investments = get_post( array(
    'post_type' => 'investment',
    'number_posts' => -1,
) );

$operating_experiences = get_post( array(
    'post_type' => 'operating_experience',
    'number_posts' => -1,
) );

foreach ($investments as $investment) {
    wp_delete_post( $investment->ID, true );
}

foreach ($operating_experiences as $operating_experience) {
    wp_delete_post( $operating_experience->ID, true );
}



