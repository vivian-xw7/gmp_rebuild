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


// if( !class_exists('gmpRebuildPlugin') ) {
//     class gmpRebuildPlugin {

//         public $plugin_name;

//         public function __construct() 
//         {
//             define( 'MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
//             require_once( MY_PLUGIN_PATH .'/vendor/autoload.php' );

//             $this->plugin_name = plugin_basename(__FILE__);
//         }

//         public function initialize()
//         {   
//             add_action('init', array($this, 'register_custom_investments_cpt'));
            
//             add_action('init', array($this, 'register_custom_operating_experience_cpt'));
            
//             add_action('init', array($this, 'register_custom_taxonomy'));
//         }
        
//         // Investment CPT
//         public function register_custom_investments_cpt() {
//             $labels = array(
//                 'name' => 'Investments',
//                 'singular_name' => 'Investment',
//                 'menu_name' => 'Investments',
//                 'add_new' => 'Add New',
//                 'add_new_item' => 'Add New Investment',
//             );

//             $args = array(
//                 'labels' => $labels,
//                 'public' => true,
//                 'has_archive' => true,
//                 'publicly_queryable' => true,
//                 'query_var' => true,
//                 'rewrite' => array('slug' => 'investments'),
//                 'menu_icon' => 'dashicons-chart-bar',
//                 'supports' => array('title', 'editor', 'thumbnail'),
//             );

//             register_post_type('investment', $args);
//         }
        
//         public function register_custom_taxonomy() {
//             $labels = array(
//                 'name' => 'Investment Categories',
//                 'singular_name' => 'Investment Category',
//             );

//             $args = array(
//                 'labels' => $labels,
//                 'public' => true,
//                 'hierarchical' => true,
//             );

//             register_taxonomy('investment_category', 'investment', $args);
//         }

//         // Operating Experience CPT
//         public function register_custom_operating_experience_cpt() {
//             $labels = array(
//                 'name' => 'Operating Experience',
//                 'singular_name' => 'Operating Experience',
//                 'menu_name' => 'Operating Experience',
//                 'add_new' => 'Add New',
//                 'add_new_item' => 'Add New Operating Experience',
//             );

//             $args = array(
//                 'labels' => $labels,
//                 'public' => true,
//                 'has_archive' => true,
//                 'publicly_queryable' => true,
//                 'query_var' => true,
//                 'rewrite' => array('slug' => 'operating-experience'),
//                 'menu_icon' => 'dashicons-businessman',
//                 'supports' => array('title', 'editor', 'thumbnail'),
//             );

//             register_post_type('operating_experience', $args);
//         }

//     }

//     $gmpRebuildPlugin = new gmpRebuildPlugin;
//     // $gmpRebuildPlugin->initialize();
// }





