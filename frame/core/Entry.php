<?php

/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/11/17
 * Time: 10:21 PM
 */

namespace frame\core;

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
        self::startSession();
        self::setConst();
        self::readConfig();
        self::isDebug();
        self::getFunctions();
        self::autoLoader();
        self::route();
    }

    /**
     * Start session
     */
    private static function startSession()
    {
        session_start();
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
        $config = file_exists(_CONFIG_ . '/config.php') ?
            _CONFIG_ . '/config.php' :
            _CONFIG_ . '/config.example.php';

        $GLOBALS['conf'] = require_once($config);
    }

    /**
     * Judge debug mode whether open, if open, system will show errors
     */
    private static function isDebug()
    {
        ini_set('display_errors', $GLOBALS['conf']['IS_DEBUG']);
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
     *
     */
    private static function route()
    {
        say_hi();
    }

}
