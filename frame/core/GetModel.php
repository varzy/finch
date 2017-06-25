<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/24/17
 * Time: 7:52 PM
 */

namespace core;


class GetModel
{
    public static function getObj($className)
    {
        // 返回一个模型类的唯一对象
        static $objArr = [];
        $class = str_replace(
            '/',
            '\\',
            $GLOBALS['MODEL'] . '\\' . $className . 'Model'
        );

        if (!isset($objArr[$class])) {
            $objArr[$class] = new $class;
        }
        return $objArr[$class];
    }
}