<?php

namespace Micro;

class StylesAndScripts extends MainController {

    public static function load(){

 #       add_action('admin_init', array('Micro\StylesAndScripts', 'adminStyle') );
 #       add_action('admin_init', array('Micro\StylesAndScripts', 'adminScripts') );

 #       add_action('wp_enqueue_scripts', array('Micro\StylesAndScripts', 'addStyle'));
 #       add_action('wp_enqueue_scripts', array('Micro\StylesAndScripts', 'addScripts'));
    }

//    public static function adminStyle(){
//        wp_enqueue_style(Config::$domain.'-admin-style', plugins_url() .'/'.Config::$pluginDirectory .'/assets/css/style-admin.css', '', null, false);
//    }
//
//    public static function adminScripts(){
//        wp_enqueue_script(Config::$domain.'-admin-script', plugins_url() .'/'.Config::$pluginDirectory .'/assets/js/main-admin.js', array(), null, 'all');
//    }
//
//    public static function addStyle(){
//        wp_enqueue_style(Config::$domain.'-main-style', plugins_url() .'/'.Config::$pluginDirectory .'/assets/css/style.css', '', null, false);
//    }
//
//
//    public static function addScripts(){
//        wp_enqueue_script(Config::$domain.'-main-script', plugins_url() .'/'.Config::$pluginDirectory .'/assets/js/main.js', array(), null, 'all');
//    }




}