<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/24/17
 * Time: 7:52 PM
 */

namespace core;


/**
 * Class ModelMaker
 * @package core
 */
class ModelMaker
{
    /**
     * @var array
     */
    static $objArr = [];

    /**
     * @param $className
     * @return mixed
     */
    public static function makeModel($className)
    {
        $realClass = to_backslash('app\\model\\' . $className . 'Model');

        if (!isset(self::$objArr[$className]))
            self::$objArr[$className] = new $realClass;

        return self::$objArr[$className];
    }

}
