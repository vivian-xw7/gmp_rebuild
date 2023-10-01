<?php 


class GmpPluginDeactivate {
    public static function deactivate () {
        flush_rewrite_rules();
    }
}




