<?php
/*
 * Plugin Name: GMP Rebuild
 * Description: A plugin meant to mimic the actual Grove Mountain Partners site
 * Version: 1.0.0
 * 
 */

if ( !defined('ABSPATH') ) {
    die( 'You cannot be here' );
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
            include_once MY_PLUGIN_PATH .'includes/options-page.php';
            
            add_action('init', array($this, 'register_custom_investments_cpt'));
            
            add_action('init', array($this, 'register_custom_operating_experience_cpt'));
            
            add_action('init', array($this, 'register_custom_taxonomy'));
        }
        
        // Investment CPT
        public function register_custom_investments_cpt() {
            $labels = array(
                'name' => 'Investments',
                'singular_name' => 'Investment',
                'menu_name' => 'Investments',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Investment',
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => true,
                'publicly_queryable' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'investments'),
                'menu_icon' => 'dashicons-chart-bar',
                'supports' => array('title', 'editor', 'thumbnail'),
            );

            register_post_type('investment', $args);
        }
        
        public function register_custom_taxonomy() {
            $labels = array(
                'name' => 'Investment Categories',
                'singular_name' => 'Investment Category',
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'hierarchical' => true,
            );

            register_taxonomy('investment_category', 'investment', $args);
        }

        // Operating Experience CPT
        public function register_custom_operating_experience_cpt() {
            $labels = array(
                'name' => 'Operating Experience',
                'singular_name' => 'Operating Experience',
                'menu_name' => 'Operating Experience',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Operating Experience',
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => true,
                'publicly_queryable' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'operating-experience'),
                'menu_icon' => 'dashicons-businessman',
                'supports' => array('title', 'editor', 'thumbnail'),
            );

            register_post_type('operating_experience', $args);
        }

        
        
    }

    $gmpRebuildPlugin = new gmpRebuildPlugin;
    $gmpRebuildPlugin->initialize();
}
