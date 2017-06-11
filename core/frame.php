<?php

/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/11/17
 * Time: 10:21 PM
 */

namespace core;


class frame
{

    /**
     * frame constructor.
     */
    public static function run()
    {
        self::startSession();
        self::setConst();
        self::readConfig();
        self::isDebug();
        self::autoLoader();
    }

    private static function startSession()
    {
        session_start();
    }

    private static function setConst()
    {
        define('__APP__', __ROOT__ . '/app');
        define('__CORE__', __ROOT__ . '/core');
    }

    private static function readConfig()
    {
        $GLOBALS['conf'] = require __CORE__ . '/config.php';
    }

    private static function isDebug()
    {
        ini_set('display_errors', $GLOBALS['conf']['IS_DEBUG']);
    }

    private static function autoLoader()
    {
        
    }

}