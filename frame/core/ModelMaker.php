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
    public static function makeModel($className)
    {
        // 返回一个模型类的唯一对象
        static $objArr = [];

        $className = $className . 'Model';

        // !!! TODO: temp
        $realClass = 'http\\model\\' . $className;

        if (!isset($objArr[$className])) {
            $objArr[$className] = new $realClass;
        }
        return $objArr[$className];
    }
}
