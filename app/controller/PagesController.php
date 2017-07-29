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

class PagesController extends Controller
{
    public function demo()
    {
        $model = ModelMaker::makeModel('Auth/User');
        $userInfo = $model->getUserInfo();

        $title = 'Demo';

        ViewMaker::makeView(
            'pages/demo.php',
            compact('userInfo', 'title')
        );
    }

}
