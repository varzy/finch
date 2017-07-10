<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 7/10/2017
 * Time: 8:32 AM
 */

namespace app\controller;


use core\Controller;
use core\ModelMaker;

class StaticPagesController extends Controller
{
    public function index()
    {
        echo 'hello, world! here is index', '<br>';
        $model = ModelMaker::makeModel('StaticPages');
        $model->modelTest();
    }

    // ! TODO: fix rewrite function of nginx
    public function test()
    {
        echo 'test';
    }
}
