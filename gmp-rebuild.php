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

if( !class_exists('gmpRebuildPlugin') ) {
    class gmpRebuildPlugin {

        public $plugin_name;

        public function __construct() 
        {
            define( 'MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
            require_once( MY_PLUGIN_PATH .'/vendor/autoload.php' );

            $this->plugin_name = plugin_basename(__FILE__);
        }

        public function initialize()
        {
            include_once MY_PLUGIN_PATH .'includes/utilities.php';
            include_once MY_PLUGIN_PATH .'includes/options-page.php';

            // add_action( 'admin_enqueue_scripts', array($this, 'enqueue') );

            add_action( 'admin_menu', array($this, 'add_admin_pages') );

            add_filter( "plugin_action_links_$this->plugin_name", array( $this, 'settings_link' ) );
            
            add_action('init', array($this, 'register_custom_investments_cpt'));
            
            add_action('init', array($this, 'register_custom_operating_experience_cpt'));
            
            add_action('init', array($this, 'register_custom_taxonomy'));
        }

        public function settings_link ( $links )
        {
            $settings_link = '<a href="options-general.php?page=gmp_plugin">Settings</a>';

            array_push( $links, $settings_link );

            return $links;
        }

        public function add_admin_pages ()
        {
            // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, '', '', null );
            add_menu_page( 'GMP Plugin', 'GMP Options', 'manage_options', 'gmp_plugin', array( $this, 'admin_index' ), 'dashicons-archive', 110 );
        }

        public function admin_index()
        {
            // require template
            // require_once( plugin_dir_path( __FILE__ ) . 'templates/admin.php' );
            require_once( plugin_dir_path( __FILE__ ) . 'templates/archive-gmp.php' );
        }
        
        // function enqueue ()
        // {
        //     wp_enqueue_style( 'gmpstyle', plugins_url( '/assets/styles.css', __FILE__ ) );
        // }
        
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

// register_activation_hook( __FILE__, array( $gmpRebuildPlugin, 'activate' ) );

// register_deactivation_hook( __FILE__, array( $gmpRebuildPlugin, 'deactivate' ) );

// register_uninstall_hook( __FILE__, array( $gmpRebuildPlugin, 'uninstall' ) );



