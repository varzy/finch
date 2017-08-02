<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 8/2/2017
 * Time: 9:20 PM
 */

namespace core;


use PDO;

/**
 * Class DBLink
 * @package core
 */
class DBLink
{
    /**
     * @var
     */
    private $link;
    /**
     * @var null
     */
    private static $dbObj = null;

    /**
     * DBLink constructor.
     */
    private function __construct()
    {
        $this->getNewLink();
    }

    /**
     *
     */
    private function __clone()
    {
    }

    /**
     * @return DBLink|null
     */
    public static function getDbObj()
    {
        if (self::$dbObj == null) {
            self::$dbObj = new self();
        }

        return self::$dbObj;
    }

    /**
     *
     */
    private function getNewLink()
    {
        $dsn = _ENV_['DB_DRIVER'] . ':' .
            'host = ' . _ENV_['DB_HOST'] . ';' .
            'port = ' . _ENV_['DB_PORT'] . ';' .
            'dbname = ' . _ENV_['DB_NAME'] . ';' .
            'charset = ' . _ENV_['DB_CHARSET'];
        $user = _ENV_['DB_USER'];
        $pwd = _ENV_['DB_PASSWORD'];

        $this->link = new PDO($dsn, $user, $pwd);
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

}
