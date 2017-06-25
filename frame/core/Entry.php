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
     * Run everything
     */
    public static function run()
    {
        self::checkENV();
        self::preLoad();
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
        // ! TODO: fix env check's function
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
        define('_ROUTE_', __FRAME__ . '/route');
    }

    private static function preLoad()
    {

    }

    /**
     * Get global conf
     */
    private static function readConfig()
    {
        if (!file_exists(_CONFIG_ . '/_config.php')) {
            // ! TODO: fix tips
            echo 'Please set config.php';
            // very important, so use "die" whether "return"
            die;
        }
        // load basic config file
        $GLOBALS['conf'] = require_once(_CONFIG_ . '/_config.php');

        // judge extra config whether empty. if is empty, then don't load
        // extra config files
        if (!empty($GLOBALS['conf']['EXT_CONF'])) {
            foreach ($GLOBALS['conf']['EXT_CONF'] as $key => $extConf) {
                $extConfPath = _CONFIG_ . '/' . trim($extConf) . '.php';
                if (file_exists($extConfPath))
                    $GLOBALS[$extConf] = require_once($extConfPath);
            }
        }
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
        if (!file_exists(_FUNCTION_ . '/_system.php')) {
            echo '_system.php must exist!';
            die;
        }

        require_once(_FUNCTION_ . '/_system.php');

        if (!empty($GLOBALS['conf']['EXT_FUNC'])) {
            foreach ($GLOBALS['conf']['EXT_FUNC'] as $key => $extFunc) {
                $extFuncPath = _FUNCTION_ . '/' . trim($extFunc) . '.php';
                if (file_exists($extFuncPath)) require_once($extFuncPath);
            }
        }
    }

    /**
     * Autoload class
     */
    private static function autoLoader()
    {
        // !!! TODO: find a better method
        spl_autoload_register(function ($className) {
            // judge the class whether loaded
            if (isset(self::$classMap[$className])) return;

            $classesPaths = [__APP__, __FRAME__];

            foreach ($classesPaths as $key => $classesPath) {

                if ($classesPath === __APP__) {
                    $module = substr($className, 0, strpos($className, '\\'));
                    if ($module !== 'core') {
                        $GLOBALS['CONTROLLER'] = $module . '/Controller';
                        $GLOBALS['MODEL'] = $module . '/Model';
                        $GLOBALS['VIEW'] = $module . '/View';
                    }
                }

                $class = $classesPath . '/' . $className . 'Controller.php';
                $class = str_replace('\\', '/', $class);
                if (file_exists($class)) require_once($class);
                self::$classMap[$className] = $className;
            }
        });
    }

    /**
     * include route file
     */
    private static function route()
    {
        if (!file_exists(_ROUTE_ . '/web.php')) {
            echo 'web.php must exist.';
            die;
        }

        require_once(__ROOT__ . '/vendor/autoload.php');
        require_once(_ROUTE_ . '/web.php');

        if (!empty($GLOBALS['conf']['EXT_ROUTE'])) {
            foreach ($GLOBALS['conf']['EXT_ROUTE'] as $key => $extRoute) {
                $extRoutePath = _ROUTE_ . '/' . trim($extRoute) . '.php';
                if (file_exists($extRoutePath)) require_once($extRoutePath);
            }
        }

        Macaw::dispatch();
    }

}
