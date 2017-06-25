<?php

return [

    /**
     * PHP ini set. You can add your custom php ini here, they will be autoload
     * when system start run
     */
    'INI_SET' => [
        // is show error, please set false when you are in production env
        'display_errors' => true
    ],

    /**
     * Database
     */
    'DATABASE' => [
        'TYPE' => 'mysql',
        'HOST' => 'localhost',
        'PORT' => '3306',
        'CHARSET' => 'utf8',
        'NAME' => '_test',
        'USER' => 'root',
        'PASSWORD' => 'aidenm'
    ],

    /**
     * Set extra config
     */
    'EXT_CONF' => [],

    /**
     * Functions
     * You can write your customized function file'name here, and put your
     * function files in `/frame/function/`. Your function file must with `.php`
     */
    'EXT_FUNC' => [],

    /**
     * Routes
     * You can write your customized route file's name here, and put your
     * route files in `/frame/route/`. Your route file must with `.php`
     */
    'EXT_ROUTE' => [],


];
