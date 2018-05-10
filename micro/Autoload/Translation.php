<?php

namespace Micro\Autoload;

use Micro\Config;

class Translation {

    public static function load(){
        add_action( 'plugins_loaded', array(__CLASS__, 'load_textdomain') );
    }

    public static function load_textdomain() {
        load_plugin_textdomain(Config::$domain, false, Config::$languagesFolder);
    }
}