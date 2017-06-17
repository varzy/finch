<?php

/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/11/17
 * Time: 10:21 PM
 */

namespace core;


/**
 * Class Frame
 * @package core
 */
class Frame
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
        self::getFunction();
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
        define('__ROOT__', str_replace('\\', '/', dirname(__DIR__)));
        define('__APP__', __ROOT__ . '/app');
        define('__CORE__', __ROOT__ . '/core');
        define('__CONFIG__', __ROOT__ . '/config');
    }

    /**
     * Get global conf
     */
    private static function readConfig()
    {
        $GLOBALS['conf'] = require_once(__CONFIG__ . '/config.php');
    }

    /**
     * Judge debug mode whether open, if open, system will show errors
     */
    private static function isDebug()
    {
        ini_set('display_errors', $GLOBALS['conf']['IS_DEBUG']);
    }

    private static function getFunction()
    {
        $functions = explode(',', $GLOBALS['conf']['FUNCTION_LIB']);
        foreach ($functions as $key => $val) {
            require_once(__APP__ . '/_common/functions/' . trim($val) .
                '.php');
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
            $file = __ROOT__ . '/' . $className . '.php';
            $file = str_replace('\\', '/', $file);

            if (is_file($file)) require_once($file);
            self::$classMap[$className] = $className;
        });
    }

    /**
     *
     */
    private static function route()
    {

    }

}
