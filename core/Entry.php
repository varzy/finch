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


    /**
     * Run everything
     */
    public static function run()
    {
        self::checkENV();
        self::setConst();
        self::getAutoload();
        self::setConfig();
        self::startSession();
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

    private function setConst()
    {
        define('__CORE__', __DIR__);
        define('__ROOT__', dirname(__CORE__));
    }


    private static function getAutoload()
    {
        require(__ROOT__ . '/vendor/autoload.php');
    }

    private function setConfig()
    {
        define('_DB_', require(__ROOT__ . '/config/database.php'));

        $iniSets = require(__ROOT__ . '/config/iniset.php');
        foreach ($iniSets as $key => $iniSet) {
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

    private function route()
    {
        require(__ROOT__ . '/config/route.php');
        Macaw::dispatch();
    }

}
