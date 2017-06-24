<?php

/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/11/17
 * Time: 10:21 PM
 */

namespace frame\core;

//use NoahBuscher\Macaw\Macaw;

/**
 * Class Entry
 * @package frame\core
 */
class Entry
{
    /**
     * ! TODO
     * - route
     * - custom function
     */

    private static $classMap = [];

    /**
     * Run everything
     */
    public static function run()
    {
        self::checkENV();
        self::setConst();
        self::readConfig();
        self::setIni();
        self::startSession();
        self::getFunctions();
        self::autoLoader();
        self::route();
    }

    /**
     * Check current env whether suitable
     */
    private static function checkENV()
    {
        if (PHP_VERSION < 7) {
            // give a warning
            trigger_error('You php version is too low.', E_USER_WARNING);
        }
    }

    /**
     * Set some const
     */
    private static function setConst()
    {
        // define root path
        define('__ROOT__', str_replace(
            '\\',
            '/',
            dirname($_SERVER['DOCUMENT_ROOT'])
        ));

        // define first level path
        define('__APP__', __ROOT__ . '/app');
        define('__FRAME__', __ROOT__ . '/frame');
        define('__PUBLIC__', __ROOT__ . '/public');

        // define second level path
        define('_CORE_', __FRAME__ . '/core');
        define('_CONFIG_', __FRAME__ . '/config');
        define('_FUNCTION_', __FRAME__ . '/function');
    }

    /**
     * Get global conf
     */
    private static function readConfig()
    {
        if (!file_exists(_CONFIG_ . '/config.php')) {
            // ! TODO: fix tips
            echo 'Please set config.php';
            // very important, so use "die" whether "return"
            die;
        }

        $GLOBALS['conf'] = require_once(_CONFIG_ . '/config.php');
    }

    /**
     * Judge debug mode whether open, if open, system will show errors
     */
    private static function setIni()
    {
        foreach ($GLOBALS['conf']['INI_SET'] as $key => $iniSet) {
            ini_set($key, $iniSet);
        }
    }

    /**
     * Start session
     */
    private static function startSession()
    {
        // for memcache ini set, session must open after setIni()
        session_start();
    }

    /**
     * Include functions
     */
    private static function getFunctions()
    {
        require_once(_FUNCTION_ . '/preset.php');

        $functions = explode(',', $GLOBALS['conf']['FUNCTIONS']);
        foreach ($functions as $key => $function) {
            $funcPath = _FUNCTION_ . '/' . trim($function) . '.php';
            if (file_exists($funcPath)) require_once($funcPath);
        }
    }

    /**
     * Autoload class
     */
    private static function autoLoader()
    {
        spl_autoload_register(function ($className) {
            // judge the class whether loaded
            if (isset(self::$classMap[$className])) return;

            $class = __ROOT__ . '/' . $className . '.php';
            $class = str_replace('\\', '/', $class);
            if (file_exists($class)) require_once($class);
            self::$classMap[$className] = $className;
        });
    }

    /**
     * include route file
     */
    private static function route()
    {

    }

}
