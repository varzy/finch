<?php

/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/11/17
 * Time: 10:21 PM
 */

namespace core;


use NoahBuscher\Macaw\Macaw;

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
     * @var array
     */
    private static $classesDirs = [
        __APP__,
        __FRAME__
    ];
    /**
     * @var array
     */
    private static $preLoadFiles = [
        _CONFIG_ . '/config.php',
        _FUNCTION_ . '/system.php',
        _ROUTE_ . '/web.php'
    ];

    /**
     * Run everything
     */
    public static function run()
    {
        self::checkENV();
        self::setConst();
        self::preLoad();
        self::readConfig();
        self::readFunction();
        self::setIni();
        self::startSession();
        self::autoLoader();
        self::route();
    }

    /**
     * Check current env whether suitable
     */
    private static function checkENV()
    {
        // ! TODO: fix env check's function
        if (PHP_VERSION < 7) {
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
        define('_ROUTE_', __FRAME__ . '/route');
    }

    /**
     *
     */
    private static function preLoad()
    {
        foreach (self::$preLoadFiles as $key => $preLoadFile) {
            if (!file_exists($preLoadFile))
                die($preLoadFile . ' must exist!');
        }

        $GLOBALS['conf'] = require_once(_CONFIG_ . '/config.php');
        require_once(_FUNCTION_ . '/system.php');
    }

    // for now, we can use any config or function customized by self.

    /**
     * Get global conf
     */
    private static function readConfig()
    {
        // judge extra config whether empty.
        // if it is empty, they will never be loaded
        if (!empty($GLOBALS['conf']['EXT_CONF'])) {
            foreach ($GLOBALS['conf']['EXT_CONF'] as $key => $extConf) {
                // !!! TODO: set upper and lower
                $extConfPath = _CONFIG_ . '/' . trim($extConf) . '.php';
                if (file_exists($extConfPath)) {
                    $GLOBALS[$extConf] = require_once($extConfPath);
                }
            }
        }
    }

    /**
     * Include functions
     */
    private static function readFunction()
    {
        if (!empty($GLOBALS['conf']['EXT_FUNC'])) {
            foreach ($GLOBALS['conf']['EXT_FUNC'] as $key => $extFunc) {
                $extFuncPath = _FUNCTION_ . '/' . trim($extFunc) . '.php';
                if (file_exists($extFuncPath))
                    require_once($extFuncPath);
            }
        }
    }

    /**
     * set php ini
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
     * Autoload class
     */
    private static function autoLoader()
    {
        // load composer's autoload
        require_once(__ROOT__ . '/vendor/autoload.php');

        // register frame's autoloader
        spl_autoload_register(function ($className) {
            if (isset(self::$classMap[$className])) return;

            foreach (self::$classesDirs as $key => $classesDir) {
                $classPath = get_correct_path($classesDir . '/' . $className . '.php');
                if (file_exists($classPath))
                    require_once($classPath);
                self::$classMap[$className] = $className;
            }
        });
    }

    /**
     * include route file
     */
    private static function route()
    {
        require_once(_ROUTE_ . '/web.php');

        if (!empty($GLOBALS['conf']['EXT_ROUTE'])) {
            foreach ($GLOBALS['conf']['EXT_ROUTE'] as $key => $extRoute) {
                $extRoutePath = _ROUTE_ . '/' . trim(strtolower($extRoute)) . '.php';
                if (file_exists($extRoutePath))
                    require_once($extRoutePath);
            }
        }

        Macaw::dispatch();
    }

}
