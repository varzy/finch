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
    public function welcome()
    {
        $model = ModelMaker::makeModel('Info');
        $info = $model->giveFakeInfo();

        ViewMaker::makeView('welcome.php', compact('info'));
    }

}
