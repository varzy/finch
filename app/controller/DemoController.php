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
use core\ViewMaker;

class DemoController extends Controller
{
    public function demo()
    {
        $data = ModelMaker::makeModel('Faker')->giveFakeData();
        ViewMaker::makeView('demo.php', compact('data'));
    }

}
