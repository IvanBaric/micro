<?php
namespace Micro;

class Config{

    public static $pluginMainFile;
    public static $pluginName;
    public static $pluginDirectory;
    public static $pluginDirPath;
    public static $pluginVersion;
    public static $pluginDomainPath;
    public static $domain;
    public static $pluginActivationFile;
    public static $pluginUninstallFile;
    public static $incFolder;
    public static $assetsFolder;
    public static $languagesFolder;


    public static function set($pluginMainFile, $pluginDirPath){
        self::$pluginDirectory = dirname(plugin_basename($pluginMainFile));

        self::$languagesFolder = self::$pluginDirectory . "/languages";


        // ABSOLUTE PATH - FULL PATH
        self::$pluginMainFile = $pluginMainFile;

        self::$pluginDirPath = $pluginDirPath;
        self::$incFolder = $pluginDirPath . "/includes";
        self::$assetsFolder = $pluginDirPath . "/assets";
        self::$pluginActivationFile = $pluginDirPath . "/activation.php";
        self::$pluginUninstallFile = $pluginDirPath . "/uninstall.php";



        $pluginHeaderData = self::getPluginHeaderData();

        self::$pluginName = $pluginHeaderData['Plugin Name'];
        self::$domain = $pluginHeaderData['Text Domain'];
        self::$pluginVersion = $pluginHeaderData['Version'];
        self::$pluginDomainPath = $pluginHeaderData['Domain Path'];

    }

    protected static function getPluginHeaderData(){
        $plugin_data = get_file_data( self::$pluginMainFile, array(
            'Plugin Name' => 'Plugin Name',
            'Text Domain' => 'Text Domain',
            'Plugin URI' => 'Plugin URI',
            'Description' => 'Description',
            'Version' => 'Version',
            'Author' => 'Author',
            'Author URI' => 'Author URI',
            'Domain Path' => 'Domain Path',
        ) );

        return $plugin_data;
    }



}