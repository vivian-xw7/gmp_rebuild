<?php 


namespace Includes\Pages;

class Admin {
    public function initialize() {
        add_action( 'admin_menu', array($this, 'add_admin_pages') );
    }

    public function add_admin_pages ()
    {
        add_menu_page( 'GMP Plugin', 'GMP Options', 'manage_options', 'gmp_plugin', array( $this, 'admin_index' ), 'dashicons-archive', 110 );
    }

    public function admin_index()
    {
        // require template
        // require_once( plugin_dir_path( __FILE__ ) . 'templates/admin.php' );
        require_once( PLUGIN_PATH . 'templates/archive-gmp.php' );
    }
}


