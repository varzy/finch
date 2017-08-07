<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 8/3/2017
 * Time: 12:45 PM
 */

namespace app\model;


use core\Model;

class FakerModel extends Model
{
    public function giveFakeData()
    {
        return [
            'title' => '123'
        ];
    }
}