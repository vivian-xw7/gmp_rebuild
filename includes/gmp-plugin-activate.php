<?php 


class GmpPluginActivate {
    public static function activate () {
        flush_rewrite_rules();
    }
}




