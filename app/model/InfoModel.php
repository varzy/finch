<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 8/2/2017
 * Time: 10:19 PM
 */

namespace app\model;


use core\Model;

class InfoModel extends Model
{
    public function giveFakeInfo()
    {
        return [
            'title' => 'Welcome to use FINCH!',
            'sentence' => 'Perhaps the easiest, the lightest, and the most readable php framework.'
        ];
    }
}