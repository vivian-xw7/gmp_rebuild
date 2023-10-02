<?php 


namespace Includes\Pages;

class Admin {
    public function initialize() {
        add_action( 'admin_menu', array($this, 'add_admin_pages') );

        add_action('init', array($this, 'register_custom_investments_cpt'));
            
        add_action('init', array($this, 'register_custom_operating_experience_cpt'));
        
        add_action('init', array($this, 'register_custom_taxonomy'));
    }

    public function add_admin_pages ()
    {
        add_menu_page( 'GMP Plugin', 'GMP Options', 'manage_options', 'gmp_plugin', array( $this, 'admin_index' ), 'dashicons-archive', 110 );
    }

    public function admin_index()
    {
        // require template
        require_once( PLUGIN_PATH . 'templates/archive-gmp.php' );
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