<?php 


namespace Includes\Base;

class Enqueue {
    public function initialize() {
        add_action( 'admin_enqueue_scripts', array($this, 'enqueue') );
    }

    function enqueue ()
    {
        wp_enqueue_style( 'mypluginstyle', PLUGIN_URL . 'assets/styles.css' );
        wp_enqueue_script( 'mypluginscript', PLUGIN_URL . 'assets/script.js' );
    }
}