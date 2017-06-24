<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/24/17
 * Time: 7:16 PM
 */

namespace Http\Controller;


use core\Controller;
use core\GetModel;

class Pages extends Controller
{
    public function index()
    {
        $model = GetModel::getObj('Pages');
        $model->saySuccess();
        echo '<pre>';
        var_dump($model);
        echo '</pre>';
        die;
    }

    public function help()
    {
        echo 'help';
    }
}