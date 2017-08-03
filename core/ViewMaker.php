<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 7/29/2017
 * Time: 8:17 PM
 */

namespace core;


/**
 * Class ViewMaker
 * @package core
 */
class ViewMaker
{
    /**
     * @param $view
     * @param array $data
     */
    public static function makeView($view, $data = [])
    {
        if (!empty($data))
            extract($data);

        $realView = to_slash(__VIEW__ . '/' . $view);
        if (file_exists($realView))
            require($realView);
    }

}
