<?php

namespace Micro\Autoload;

use Micro\Config;

class Resources {

    public static function load(){
        //scripts
        add_action('admin_init', array(__CLASS__, 'resource') );
        add_action('wp_enqueue_scripts', array(__CLASS__, 'resource'));

        //styles
        add_action('admin_init', array(__CLASS__, 'resource') );
    }

    public static function resource(){

        $assets = plugins_url() ."/".Config::$pluginDirectory ."/assets";

        $assetsFolder = Config::$assetsFolder;
        $list = \Micro\Autoload\Helper\DirToArray::get($assetsFolder);



        if(is_array($list)){

            foreach($list as $folder => $subFolder){



                if($folder == "admin" && is_admin()){

                    foreach($subFolder as $subFolder => $files){

                        if($subFolder == "css"){
                            foreach($files as $file){
                                $path = $assets."/$folder/$subFolder/$file";
                                wp_enqueue_style($file. "-admin", $path, '', null, false);
                            }

                        }

                        if($subFolder == "js"){
                            foreach($files as $file){
                                $path = $assets."/$folder/$subFolder/$file";

                                wp_enqueue_script($file. "-admin", $path, array(), null, 'all');
                            }
                        }

                        if($subFolder == "img"){ continue;}
                    }

                }



                if($folder == "public" && !is_admin()){
                    foreach($subFolder as $subFolder => $files){
                        if($subFolder == "css"){
                            foreach($files as $file){
                                $path = $assets."/$folder/$subFolder/$file";
                                wp_enqueue_style($file. "-public", $path, '', null, false);
                            }
                        }

                        if($subFolder == "js"){
                            foreach($files as $file){
                                $path = $assets."/$folder/$subFolder/$file";

                                wp_enqueue_script($file. "-public", $path, array(), null, 'all');
                            }
                        }

                        if($subFolder == "img"){
                            continue;
                        }


                    }

                }



            }

        }





    }


}