<?php

namespace Micro\Autoload;

use Micro\Config;

class Inc  {
    public static function load() {
        $incFolder = Config::$incFolder;

        $list = \Micro\Autoload\Helper\DirToArray::get($incFolder);

        if(is_array($list)){
            foreach ($list as $folder => $files) {
                foreach($files as $file){
                    $filePath = $incFolder ."/".$folder. "/".$file;

                    if($folder == "admin" && is_admin()){
                        require_once $filePath;
                    }

                    if($folder == "public" && !is_admin()){
                        require_once $filePath;
                    }
                }
            }
        }
    }
}