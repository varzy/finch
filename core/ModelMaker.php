<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/24/17
 * Time: 7:52 PM
 */

namespace core;


class ModelMaker
{
    static $objArr = [];

    public static function makeModel($className)
    {

        $realClass = get_backslash('app\\model\\' . $className . 'Model');

        if (!isset(self::$objArr[$className])) {
            self::$objArr[$className] = new $realClass;
        }

        return self::$objArr[$className];
    }
}
