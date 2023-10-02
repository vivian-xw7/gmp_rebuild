<?php


namespace Includes;

final class Init {
    public static function get_services() 
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class
        ];
    }

    public static function register_services() 
    {
        foreach( self::get_services() as $class ) {
            $service = self::instantiate($class);

            if (method_exists( $service, 'initialize' )) {
                $service->initialize();
            }
        }
    }

    private static function instantiate($class) 
    {
        $service = new $class();
        
        return $service;
    }
}

