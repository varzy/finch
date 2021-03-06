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
            trigger_error('Your php version is too low!', E_USER_WARNING);
        }

    }

    /**
     * Set some constants
     */
    private static function setConst()
    {
        define('__CORE__', __DIR__);
        define('__ROOT__', dirname(__CORE__));
        define('__VIEW__', __ROOT__ . '/view');
    }

    /**
     * Include composer's autoload
     */
    private static function getAutoload()
    {
        require __ROOT__ . '/vendor/autoload.php';
    }

    /**
     * Set configs
     */
    private static function setConfig()
    {
        $envFile = file_exists(__ROOT__ . '/config/env.php') ?
            __ROOT__ . '/config/env.php' :
            __ROOT__ . '/config/env.example.php';

        define('_ENV_', require($envFile));

        $iniSets = require __ROOT__ . '/config/iniset.php';
        foreach ($iniSets as $key => $iniSet) {
            ini_set($key, $iniSet);
        }
    }

    /**
     * Start session. For memcache ini set, session must open after setIni()
     */
    private static function startSession()
    {
        session_start();
    }

    /**
     * Use Macaw as route component
     */
    private static function route()
    {
        require __ROOT__ . '/config/route.php';
        Macaw::dispatch();
    }

}
