<?php
namespace Micro\Activation;

use Micro\Config;

class Structure {


    public static function create(){
        $incFolder =  Config::$incFolder;
        $pluginDirPath = Config::$pluginDirPath;
        $assetsFolder = Config::$assetsFolder;


        $directories = array(
            $incFolder,
            $incFolder. "/admin",
            $incFolder. "/public",
            $pluginDirPath. "/languages",

            //assets admin folders
            $assetsFolder,
            $assetsFolder. "/admin",
            $assetsFolder. "/admin/css",
            $assetsFolder. "/admin/js",
            $assetsFolder. "/admin/img",

            //assets public folders
            $assetsFolder. "/public",
            $assetsFolder. "/public/css",
            $assetsFolder. "/public/js",
            $assetsFolder. "/public/img",
        );

        self::createDirectory($directories);


        $files = array(
            Config::$pluginActivationFile,
            Config::$pluginUninstallFile,

            //assets
            $assetsFolder. "/admin/css/style.css",
            $assetsFolder. "/admin/js/script.js",

            $assetsFolder. "/public/css/style.css",
            $assetsFolder. "/public/js/script.js"
        );

        self::createFile($files);
    }


    protected static function createDirectory($dir=false){
        if(is_array($dir) && count($dir) > 1){
            foreach ($dir as $d){
                !is_dir($d) ? mkdir($d) : "";
            }
        }
    }


    protected static function createFile($file){
        if(is_array($file)){
            foreach($file as $item){
                if(!is_file($item)){
                    self::createItem($item);
                }
            }
        }
    }

    protected static function createItem($file){
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $data = ($extension == "php") ? "<?php " : "";

        $data = mb_convert_encoding($data, 'UTF-8');
        file_put_contents($file, $data);
    }






}