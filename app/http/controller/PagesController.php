<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 06/24/17
 * Time: 7:16 PM
 */

namespace http\controller;


use core\Controller;

class PagesController extends Controller
{
    public function index()
    {
        echo 'index';
    }

    public function help()
    {
        echo 'help';
    }
}