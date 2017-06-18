<?php

return [

    /**
     * Basic
     */

    // judge is debug env. set "true" will show error info, "false" will close
    // error info
    'IS_DEBUG' => true,

    /**
     * Database
     */

    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
    'DB_PORT' => '3306',
    'DB_CHARSET' => 'utf8',
    'DB_NAME' => '',
    'DB_USER' => '',
    'DB_PWD' => '',

    /**
     * Pages
     */

    'DEFAULT_MODULE' => 'http',
    'DEFAULT_CONTROLLER' => 'Index',
    'DEFAULT_ACTION' => 'index',

    /**
     * Include self libs
     */

    // insert your custom function lib here, and use `,` to split them
    // then, put your custom functions in `/frame/function`
    'FUNCTIONS' => '',

];
