<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/24/17
 * Time: 7:16 PM
 */

namespace http\controller;


use core\Controller;
use core\ModelMaker;

class PagesController extends Controller
{
    public function index()
    {
        $model = ModelMaker::makeModel('Pages');
        $model->saySuccess();
    }

    public function help()
    {
        echo 'help';
    }
}