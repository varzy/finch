<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 7/29/2017
 * Time: 8:17 PM
 */

namespace core;


class ViewMaker
{
    public static function makeView($view, $data = [])
    {
        if (!empty($data))
            extract($data);

        $realView = get_slash(__VIEW__ . '/' . $view);
        if (file_exists($realView))
            require($realView);
    }
}
