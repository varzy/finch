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
        'NAME' => '',
        'USER' => '',
        'PASSWORD' => ''
    ],

    /**
     * Include self libs
     */
    'FUNCTIONS' => ''

];
