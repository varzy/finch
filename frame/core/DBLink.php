<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/12/17
 * Time: 8:47 AM
 */

namespace frame\core;


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
        $dsn = $GLOBALS['conf']['DATABASE']['TYPE'] . ':' .
            'host = ' . $GLOBALS['conf']['DATABASE']['HOST'] . ';' .
            'port = ' . $GLOBALS['conf']['DATABASE']['PORT'] . ';' .
            'dbname = ' . $GLOBALS['conf']['DATABASE']['NAME'] . ';' .
            'charset = ' . $GLOBALS['conf']['DATABASE']['CHARSET'];
        $user = $GLOBALS['conf']['DATABASE']['USER'];
        $pwd = $GLOBALS['conf']['DATABASE']['PASSWORD'];

        try {
            $this->link = new PDO($dsn, $user, $pwd, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}
