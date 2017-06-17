<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/12/17
 * Time: 8:47 AM
 */

namespace core;


use PDO;
use PDOException;

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
    private static $isInit = null;

    /**
     * DBLink constructor.
     */
    private function __construct()
    {
        $this->linkDB();
    }

    /**
     * @return DBLink|null
     */
    public static function getLink()
    {
        if (self::$isInit == null) {
            self::$isInit = new self;
        }
        return self::$isInit;
    }

    /**
     *
     */
    private function __clone()
    {
    }

    /**
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        }
        return null;
    }

    /**
     * Connect to database
     */
    private function linkDB()
    {
        $dsn = $GLOBALS['conf']['DB_TYPE'] . ':' .
            'host = ' . $GLOBALS['conf']['DB_HOST'] . ';' .
            'port = ' . $GLOBALS['conf']['DB_PORT'] . ';' .
            'dbname = ' . $GLOBALS['conf']['DB_NAME'] . ';' .
            'charset = ' . $GLOBALS['conf']['DB_CHARSET'];
        $user = $GLOBALS['conf']['DB_USER'];
        $pwd = $GLOBALS['conf']['DB_PWD'];

        try {
            $this->link = new PDO($dsn, $user, $pwd, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}
