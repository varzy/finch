<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 7/10/2017
 * Time: 9:32 AM
 */

namespace app\model;


use core\Model;

class StaticPagesModel extends Model
{
    public function modelTest()
    {
        echo 'I\'m a model!', '<br>';

        $res = $this->from('temp')
            ->where('id = 1')
            ->select();

echo '<pre>';
var_dump($res);
echo '</pre>';
die;
    }
}
