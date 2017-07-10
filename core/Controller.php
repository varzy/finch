<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/12/17
 * Time: 8:45 AM
 */

namespace core;


class Controller
{
    protected function returnJSON($data)
    {
        echo json_encode($data);
    }

    protected function test()
    {
        echo 'test';
    }
}
