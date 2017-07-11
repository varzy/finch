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
        if (PHP_VERSION < 7) {
            trigger_error('You php version is too low.', E_USER_WARNING);
        }
    }

    /**
     * Set some constants
     */
    private static function setConst()
    {
        define('__CORE__', __DIR__);
        define('__ROOT__', dirname(__CORE__));
    }

    /**
     * Include composer's autoload
     */
    private static function getAutoload()
    {
        require(__ROOT__ . '/vendor/autoload.php');
    }

    /**
     * Set configs
     */
    private static function setConfig()
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

    /**
     * Use Macaw as route component
     */
    private static function route()
    {
        require(__ROOT__ . '/config/route.php');
        Macaw::dispatch();
    }

}
