<?php
/*
 * Plugin Name: GMP Rebuild
 * Description: A plugin meant to mimic the actual Grove Mountain Partners site
 * Version: 1.0.0
 * Author: Vivian Hayes
 */

if ( !defined('ABSPATH') ) {
    die( 'You can\'t access this file, silly!' );
}

// vendor\autoload.php
if ( file_exists(__FILE__) . dirname('/vendor/autoload.php') ) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

if( class_exists( 'Includes\\Init' ) ) {
    Includes\Init::register_services();
}





