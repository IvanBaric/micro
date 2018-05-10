<?php

namespace Micro;

class MainController{

    public static function load(){
        // Load Include Folder
        Autoload\Inc::load();

        // Load Styles and Scripts
        Autoload\Resources::load(); //staro # StylesAndScripts::load();

        // Load MicroTranslation
        Autoload\Translation::load();


        //Create activation.php file inside main plugin folder
        register_activation_hook( Config::$pluginMainFile , array(__CLASS__, 'pluginActivation'));

        //Create uninstall.php file inside main plugin folder
        register_uninstall_hook( Config::$pluginMainFile , array(__CLASS__, 'pluginUninstall'));
    }




    public static function pluginActivation(){
        \Micro\Activation\Structure::create();

        if(is_file(Config::$pluginActivationFile)){
            require_once Config::$pluginActivationFile;
        }
    }


    public static function pluginUninstall(){
        if(is_file(Config::$pluginUninstallFile)){
            require_once Config::$pluginUninstallFile;
        }
    }



}