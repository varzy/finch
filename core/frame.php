<?php

/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/11/17
 * Time: 10:21 PM
 */
class frame
{

    /**
     * frame constructor.
     */
    public function __construct()
    {
        self::startSession();
        self::readConfig();
    }

    private static function startSession()
    {
        session_start();
    }

    private function readConfig()
    {

    }
}