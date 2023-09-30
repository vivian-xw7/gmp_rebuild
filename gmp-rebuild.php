<?php
/*
 * Plugin Name: GMP Rebuild
 * Description: A plugin meant to mimic the actual Grove Mountain Partners site
 * Version: 1.0.0
 * 
 */


 if ( !defined('ABSPATH') ) {
    die( 'you cannot be here' );
 }
 
 if( !class_exists('gmpRebuildPlugin') ) {
     class gmpRebuildPlugin {
        public function __construct() 
        {
            define( 'MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
            
            require_once( MY_PLUGIN_PATH .'/vendor/autoload.php' );
        }

        public function initialize()
        {
            include_once MY_PLUGIN_PATH .'includes/utilities.php';
        }
     }

     $gmpRebuildPlugin = new gmpRebuildPlugin;

     $gmpRebuildPlugin->initialize();
 }




